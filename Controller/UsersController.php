<?php

App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    const LOGIN_ERROR_MSG = 'Failed to login😣';

    public $uses = array('User');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('signupWithFacebook', 'loginWithFacebook', 'login', 'logout', 'index');
    }

    public function signupWithFacebook()
    {
        if (!empty($this->User->checkUserExistence($this->request->data['User']['email']))) {
            // メールアドレスでユーザー存在チェック
            return $this->redirect($this->topRedirectOption);
        }

        $this->User->create();
        if ($this->request->data('User.facebook_id') != null) {
            $this->request->data['User']['facebook_valid'] = 1;
        }

        // Save to Database
        if ($this->User->save($this->request->data)) {
            // Get User Data
            $userData = $this->User->checkUserExistence($this->request->data['User']['email']);
            $this->Auth->login($userData);

        }

        return $this->redirect($this->Auth->redirectUrl());
    }

    public function loginWithFacebook()
    {
        if (!$this->request->is('post')) {
            return $this->redirect($this->topRedirectOption);
        }

        // Facebookログインじゃない場合
        if ($this->request->data('User.facebook_id') === null) {
            $this->Flash->error(self::LOGIN_ERROR_MSG,
                array('key' => 'login_result')
            );

            return $this->redirect($this->topRedirectOption);
        }

        // ユーザーが存在しない場合
        $userData = $this->User->findByFacebookId($this->request->data('User.facebook_id'));
        if (empty($userData)) {
            $this->Flash->error(self::LOGIN_ERROR_MSG,
                array('key' => 'login_result')
            );

            return $this->redirect($this->topRedirectOption);
        }

        // ログイン
        if ($this->Auth->login($userData)) {
            /**
             *  ユーザーのFacebook関連情報更新
             */
            $this->User->id = $this->Auth->user('User.id');
            // 更新するカラム
            $fieldList = array(
                'facebook_token',
                'facebook_id'
            );
            $data = array(
                'User' => array(
                    'facebook_token' => $this->request->data('User.facebook_token'),
                    'facebook_id'    => $this->request->data('User.facebook_id')
                )
            );

            // 情報をデータベースに保存
            $this->User->save($data, array(
                'fieldList' => $fieldList
            ));
        } else {
            $this->Flash->error(self::LOGIN_ERROR_MSG,
                array('key' => 'login_result')
            );
        }

        return $this->redirect($this->Auth->redirectUrl());
    }

    public function edit()
    {
        if (!$this->request->is('post')) {
            // フォームの値をDBから取得
            $userData = $this->User->findById($this->Auth->user('User.id'), array(
                 'fieldList'  => 'username'
            ));
            $this->request->data = h($userData);

            return true;
        }

        if (empty($this->request->data)) {
            return $this->redirect($this->topRedirectOption);
        }

        /*
         * 情報更新
         */
        $this->User->id = $this->Auth->user('User.id');
        $fieldList = array('username');
        $this->User->save($this->request->data,
            array('fieldList' => $fieldList)
        );
        // フォームの値をDBから取得
        $userData = $this->User->findById($this->Auth->user('User.id'), array('id', 'username'));
        $this->request->data = h($userData);

        // ログインし直し
        $this->Auth->login($userData);

        return $this->redirect(array(
            'controller' => 'users',
            'action'    => 'edit'
        ));
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
