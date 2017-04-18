<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
    public $name = "User";

    /**
     * emailでユーザーの存在確認
     */
    public function checkUserExistence($email)
    {
        return $this->findByEmail($email);
    }
}
