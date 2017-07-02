<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
    public $name = 'Comment';

    public $validate = array(
        'content' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Empty Is Not Allowed'
            )
        )
    );
}
