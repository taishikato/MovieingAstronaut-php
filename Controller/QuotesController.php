<?php

App::uses('AppController', 'Controller');

class QuotesController extends AppController {
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
    }

    public function add($id = null) {
        $mdbid = h($id);
        $this->set(compact('mdbid'));
        $this->request->data['Quote']['movie_id'] = $mdbid;
        $this->request->data['Quote']['user_id'] = $this->Auth->user('User.id');
        var_dump($this->request->data);
    }
}
