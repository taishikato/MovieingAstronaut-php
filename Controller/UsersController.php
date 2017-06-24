<?php

App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
    const LOGIN_ERROR_MSG = 'Failed for some reasons😣';
    const EDIT_ERROR_MSG = 'This username is already taken.. Please try again.';

    public $uses = array('User');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('startWithFacebook', 'signupWithFacebook', 'loginWithFacebook', 'login', 'logout', 'index');
    }

    public function startWithFacebook()
    {
        // postか確認
        if (!$this->request->is('post')) {
            return $this->redirect($this->topRedirectOption);
        }

        // Facebook認証か確認
        if ($this->request->data('User.facebook_id') === null) {
            $this->Flash->error(self::LOGIN_ERROR_MSG,
                array('key' => 'login_result')
            );

            return $this->redirect($this->topRedirectOption);
        }

        /**
         * 以下Sign Up / Sign In処理
         */
        $userData = $this->User->findByFacebookId($this->request->data('User.facebook_id'));
        if (empty($userData)) {
            // Sign Up
            $this->_signupWithFacebook($this->request);
        } else {
            // Sign In
            $this->_signinWithFacebook($this->request, $userData);
        }

        return $this->redirect($this->Auth->redirectUrl());
    }

    public function _signupWithFacebook($postData)
    {
        $this->User->create();
        if ($postData->data('User.facebook_id') != null) {
            $postData->data['User']['facebook_valid'] = 1;
        }

        // make default user name
        $defaultUserName = $this->_makeDefaultUserName($postData->data['User']['email']);
        $postData->data['User']['username'] = $defaultUserName;

        // Save to Database
        if ($this->User->save($postData->data)) {
            // Get User Data
            $userData = $this->User->checkUserExistence($postData->data['User']['email']);
            $this->Auth->login($userData);
        }
    }

    public function _makeDefaultUserName($email)
    {
        return 'user_' . substr(hash('sha256', $email . time()), 0, 10);
    }

    public function _signinWithFacebook($postData, $userData)
    {
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
                    'facebook_token' => $postData->data('User.facebook_token'),
                    'facebook_id'    => $postData->data('User.facebook_id')
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
        if (!empty($this->User->checkUserExistenceByUsername($this->request->data('User.username')))) {
            $this->Flash->error(self::EDIT_ERROR_MSG,
                array('key' => 'edit_result')
            );
            return false;
        }

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
