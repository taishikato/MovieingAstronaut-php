<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
    public $name = 'User';

    /**
     * emailでユーザーの存在確認
     */
    public function checkUserExistence($email)
    {
        return $this->findByEmail($email);
    }

    /**
     * バリデーション後、データを保存する前に呼ばれるコールバック関数
     * @see http://book.cakephp.org/2.0/ja/models/callback-methods.html#beforesave
     */
    public function beforeSave($options = array())
    {
        if (isset($this->data[$this->alias]["password"])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]["password"] = $passwordHasher->hash(
                $this->data[$this->alias]["password"]
            );
        }
        return true;
    }
}
