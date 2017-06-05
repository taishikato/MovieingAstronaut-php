<?php

App::uses('AppController', 'Controller');

class QuotesController extends AppController {
    const SAVE_SUCCESS_MSG = 'Saved The Quote 🚀';

    public $uses = array('Quote');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
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
            'fields'     => array('Quote.id', 'Quote.content', 'Quote.speaker')
        ));
        $this->set(compact('quotes'));
    }

    public function add($id = null) {
        $mdbid = h($id);
        $this->set(compact('mdbid'));
        // postか確認
        if (!$this->request->is('post')) {
            return false;
        }

        $this->set(compact('mdbid'));
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
}
