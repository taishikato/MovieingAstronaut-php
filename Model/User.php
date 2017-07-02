<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
    public $name = 'User';

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'User Name Is Required'
            )
        )
    );

    /**
     * emailでユーザーの存在確認
     */
    public function checkUserExistence($email)
    {
        return $this->findByEmail($email);
    }
    /**
     * usernameでユーザーの存在確認
     */
    public function checkUserExistenceByUsername($username)
    {
        return $this->findByUsername($username);
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
