<?php

App::uses('AppController', 'Controller');

class QuotesController extends AppController {
    const SAVE_SUCCESS_MSG = 'Saved The Quote 🚀';

    public $uses = array('Quote', 'LikeQuote');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('m');
    }

    public function index()
    {
    }

    /**
     * セルフリストを見せる
     */
    public function m($id = null)
    {
        $mdbid = h($id);
        $requestUrl = $this->omdbapiUrl . '&i=' . $mdbid;
        $result = $this->execApi($requestUrl);
        $this->set(compact('result'));
        // セリフテーブルからfindする
        $quotes = $this->Quote->find('all', array(
            'conditions' => array('Quote.movie_id' => $mdbid),
            'fields'     => array('Quote.id', 'Quote.content', 'Quote.speaker'),
            'order'      => array('created' => 'desc')
        ));
        $this->set(compact('quotes'));
    }

    public function add($id = null) {
        $mdbid = h($id);
        $this->set(compact('mdbid'));
        // API実行
        $requestUrl = $this->omdbapiUrl . '&i=' . $mdbid;
        $result = $this->execApi($requestUrl);
        $this->set(compact('result'));
        // postか確認
        if (!$this->request->is('post')) {
            return false;
        }
        $this->set(compact('mdbid'));
        // パラメータセット
        $this->request->data['Quote']['movie_id'] = $mdbid;
        $this->request->data['Quote']['user_id'] = $this->Auth->user('User.id');
        // DBに保存
        $this->Quote->create();
        if ($this->Quote->save($this->request->data)) {
            $this->Flash->success(self::SAVE_SUCCESS_MSG,
                array('key' => 'db_result')
            );
        }
    }

    /**
     * Like Quote
     */
    public function like($id = null) {
        if (empty($_GET['title']) || empty($_GET['movie_id'])) {
            return false;
        }

        // パラメータセット
        $saveData = array();
        $saveData['LikeQuote']['quote_id'] = h($id);
        $saveData['LikeQuote']['user_id']  = $this->Auth->user('User.id');
        $saveData['LikeQuote']['movie_id'] = h($_GET['movie_id']);
        $saveData['LikeQuote']['title']    = h($_GET['title']);

        // DBに保存
        $this->LikeQuote->create();
        $this->LikeQuote->save($saveData);

        // 元のページにリダイレクト
        $this->redirect(array(
            'controller' => 'quotes',
            'action' => 'm',
            $saveData['LikeQuote']['movie_id']
        ));
    }

    public function likeList($id = null) {
        $quoteIds = $this->LikeQuote->find('all', array(
            'conditions' => array('LikeQuote.user_id' => $this->Auth->user('User.id')),
            'fields' => array('LikeQuote.quote_id'),
            'order'  => array('created' => 'desc')
        ));

        $result = array();
        foreach ($quoteIds as $quoteId) {
            $likeQuotes[] = $this->Quote->find('first', array(
                'conditions' => array('Quote.id' => $quoteId['LikeQuote']['quote_id']),
            ));
        }

        $this->set(compact('likeQuotes'));
    }
}
