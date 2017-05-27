<?php

App::uses('AppController', 'Controller');

class QuotesController extends AppController {
    public $uses = array('SeenList', 'User');

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
        // セリフテーブルからfindする
    }
}
