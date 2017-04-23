<?php

App::uses('AppController', 'Controller');

class ListsController extends AppController {
    public $uses = array('SeenList');

    public function add()
    {
        if (!$this->request->is('post')) {
            echo 'Not Post';

            return false;
        }
        var_dump($this->request->data);
    }

    public function delete()
    {
    }
}
