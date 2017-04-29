<?php

App::uses('AppController', 'Controller');

class SearchesController extends AppController {
    public $uses = array('SeenList');

    public $baseUrl = 'http://www.omdbapi.com';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'showList', 'show');
    }

    public function index()
    {
        if (!empty($_GET['title'])) {
            $requestUrl = $this->baseUrl . '/?t=' . urlencode($_GET['title']);
            $result = $this->execApi($requestUrl);
            $this->set(compact('result'));
        }
    }

    function showList()
    {
        $baseUrl = 'http://www.omdbapi.com';
        if (!empty($_GET['title'])) {
            $requestUrl = $baseUrl . '/?t=' . urlencode($_GET['title']);
            $response = file_get_contents($requestUrl);
            $result = json_decode($response, true);
            $this->set(compact('result'));
        }
    }

    public function show($id = null)
    {
        $requestUrl = $this->baseUrl . '/?i=' . $id;
        $result = $this->execApi($requestUrl);
        $this->set(compact('result'));

        // 表示している映画が既にリストに登録してあるか確認
        $resitered = $this->SeenList->findByImdbId($result['imdbID']);
        $this->set(compact('resitered'));
    }
}
