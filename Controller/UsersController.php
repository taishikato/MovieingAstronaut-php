<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $uses = array('User');

    public function signupWithFacebook()
    {
        if (!empty($this->User->checkUserExistence($this->request->data['User']['email']))) {
            // メールアドレスでユーザー存在チェック
            return false;
        }
        $this->User->create();
        if ($this->request->data('User.facebook_id') != null) {
            $this->request->data['User']['facebook_valid'] = 1;
        }

        // Save to Database
        if ($this->User->save($this->request->data)) {
            $this->redirect('../searches');
        }
    }
}
