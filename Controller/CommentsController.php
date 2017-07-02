<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {
    const SAVE_SUCCESS_MSG = 'Saved Successfully 🎉';
    public $uses = array('Comment', 'Quote');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function add($id = null)
    {
        // postか確認
        if (!$this->request->is('post')) {
            return $this->redirect($this->topRedirectOption);
        }

        // Quote情報取得
        $quote = $this->Quote->find('first', array(
            'conditions' => array('Quote.id' => $id)
        ));
        $this->request->data['Comment']['user_id']  = $this->Auth->user('User.id');
        $this->request->data['Comment']['movie_id'] = $quote['Quote']['movie_id'];
        $this->Comment->create();
        if ($this->Comment->save($this->request->data)) {
            $this->Flash->success(self::SAVE_SUCCESS_MSG,
                array('key' => 'db_result')
            );
        }

        $this->redirect(array(
            'controller' => 'quotes',
            'action'     => 'd',
            $quote['Quote']['id']
        ));
    }
}
