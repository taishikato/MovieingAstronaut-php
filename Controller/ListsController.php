<?php

App::uses('AppController', 'Controller');

class ListsController extends AppController {
    public $uses = array('SeenList', 'User');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'showSeenList');
    }

    public function index()
    {
    }

    public function showSeenList($username = null)
    {
        // ユーザーID取得
        $userId = $this->User->find('first', array(
            'conditions' => array('User.username' => $username),
            'fields'     => array('User.id')
        ));
        if (empty($userId)) {
            // そのusernameのアカウントが存在しない場合
            return false;
        }

        // DBからデータ取得
        $seenMovieImdbs = $this->SeenList->find('all', array(
            'conditions' => array('SeenList.user_id' => $userId['User']['id']),
            'fields'     => array('SeenList.imdb_id', 'created')
        ));

        $movieData = array();
        foreach ($seenMovieImdbs as $seenMovieImdb) {
            $requestUrl = $this->omdbapiUrl . '&i=' . $seenMovieImdb['SeenList']['imdb_id'];
            $movieData[] = $this->execApi($requestUrl);
        }
        $this->set(compact('movieData'));
    }

    public function add()
    {
        if (!$this->request->is('post')) {
            echo 'Not Post';

            return false;
        }

        $doneUrl = $this->request->data['SeenList']['done'];
        // ユーザーID取得
        $this->request->data['SeenList']['user_id'] = $this->Auth->user('User.id');
        unset($this->request->data['SeenList']['done']);
        // リストデータ保存
        $this->SeenList->create();
        $this->SeenList->save($this->request->data);

        // 元のページへリダイレクト
        $this->redirect($doneUrl);
    }

    public function delete()
    {
    }
}
