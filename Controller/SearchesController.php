<?php

App::uses('AppController', 'Controller');

class SearchesController extends AppController {
    public $uses = array('SeenList');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'showList', 'show');
    }

    public function index()
    {
        if (!empty($_GET['title'])) {
            $requestUrl = $this->omdbapiUrl . '&t=' . urlencode(h($_GET['title']));
            $result = $this->execApi($requestUrl);
            $this->set(compact('result'));
        }
    }

    function showList()
    {
        $result['Response'] = 'False';
        if (!empty($_GET['title'])) {
            $result = array();
            $requestUrl = $this->omdbapiUrl . '&t=' . urlencode($_GET['title']);
            $response = file_get_contents($requestUrl);
            $result = json_decode($response, true);
        }

        $this->set(compact('result'));
    }

    public function show($id = null)
    {
        $requestUrl = $this->omdbapiUrl . '&i=' . $id;
        $result = $this->execApi($requestUrl);
        $this->set(compact('result'));

        // 表示している映画が既にリストに登録してあるか確認
        $resitered = $this->SeenList->find('first', array(
            'conditions' => array('SeenList.imdb_id' => $result['imdbID'], 'SeenList.user_id' =>  $this->loginUser['User']['id']),
            'fields'     => array('SeenList.imdb_id')
        ));
        $this->set(compact('resitered'));
    }
}
