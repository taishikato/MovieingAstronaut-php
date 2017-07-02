<?php

App::uses('AppController', 'Controller');

class TopsController extends AppController {
    public $uses = array('Quote');

    public $layout = 'custom';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index()
    {
        if (!empty($_GET['title'])) {
            $requestUrl = $this->omdbapiUrl . '&t=' . urlencode(h($_GET['title']));
            $response = file_get_contents($requestUrl);
            $result = json_decode($response, true);
            $this->set(compact('result'));
        }

        // Quoteテーブルから最新情報取得
        $quotes = $this->Quote->find('all', array(
            'order'  => array('Quote.created' => 'DESC'),
            'limit'  => 10
        ));

        $quoteMovieData = array();
        foreach ($quotes as $quote) {
            $requestUrl = $this->omdbapiUrl . '&i=' . $quote['Quote']['movie_id'];
            $result = $this->execApi($requestUrl);

            $quoteMovieData[] = array(
                'id' => $quote['Quote']['id'],
                'content' => $quote['Quote']['content'],
                'poster'  => $result['Poster'],
                'title'   => $quote['Quote']['title'],
                'movie_id' => $quote['Quote']['movie_id'],
                'speaker' => $quote['Quote']['speaker']
            );
        }

        $this->set(compact('quoteMovieData'));
    }
}
