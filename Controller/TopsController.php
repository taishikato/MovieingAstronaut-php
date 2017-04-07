<?php

App::uses('Controller', 'Controller');

class TopsController extends AppController {
    public $uses = array();

    public $layout = 'custom';

    public function index()
    {
        $baseUrl = 'http://www.omdbapi.com';
        if (!empty($_GET['title'])) {
            $requestUrl = $baseUrl . '/?t=' . urlencode($_GET['title']);
            $response = file_get_contents($requestUrl);
            $result = json_decode($response, true);
            $this->set(compact('result'));
        }
    }
}
