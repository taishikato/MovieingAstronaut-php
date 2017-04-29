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

        $doneUrl = $this->request->data['SeenList']['done'];
        // ユーザーID取得
        $this->request->data['SeenList']['user_id'] = $this->Auth->user('User.id');
        unset($this->request->data['SeenList']['done']);
        // リストデータ保存
        $this->SeenList->create();
        $this->SeenList->save($this->request->data);

        // 元のページへリダイレクト
        $this->redirect($doneUrl);
    }

    public function delete()
    {
    }
}
