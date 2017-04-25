<?php

App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    public $uses = array('User');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('signupWithFacebook', 'login', 'logout', 'index');
    }

    public function signupWithFacebook()
    {
        if (!empty($this->User->checkUserExistence($this->request->data['User']['email']))) {
            // メールアドレスでユーザー存在チェック
            echo 'メアドあり';
            return false;
        }

        $this->User->create();
        if ($this->request->data('User.facebook_id') != null) {
            $this->request->data['User']['facebook_valid'] = 1;
        }

        // Save to Database
        if ($this->User->save($this->request->data)) {
            $this->Auth->login($this->request->data);
            $this->redirect($this->Auth->redirect());
        }

    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                echo 'logcin';
                $this->redirect($this->Auth->redirect());
            } else {
                echo 'false';
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}
