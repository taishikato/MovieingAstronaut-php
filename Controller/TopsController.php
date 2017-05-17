<?php

App::uses('AppController', 'Controller');

class TopsController extends AppController {
    public $uses = array();

    public $layout = 'custom';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index()
    {
        $baseUrl = 'http://www.omdbapi.com';
        if (!empty($_GET['title'])) {
            $requestUrl = $baseUrl . '/?t=' . urlencode(h($_GET['title']));
            $response = file_get_contents($requestUrl);
            $result = json_decode($response, true);
            $this->set(compact('result'));
        }
    }
}
