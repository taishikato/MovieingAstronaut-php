<?php

App::uses('AppController', 'Controller');

class SearchesController extends AppController {
    public $uses = array();

    public $baseUrl = 'http://www.omdbapi.com';

    public function index()
    {
        if (!empty($_GET['title'])) {
            $requestUrl = $this->baseUrl . '/?t=' . urlencode($_GET['title']);
            $result = $this->execApi($requestUrl);
            $this->set(compact('result'));
        }
    }

    public function show($id = null)
    {
        $requestUrl = $this->baseUrl . '/?i=' . $id;
        $result = $this->execApi($requestUrl);
        $this->set(compact('result'));
    }
}
