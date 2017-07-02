<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $layout = 'custom';
    public $isLoggedIn = false;
    public $loginUser;
    public $title_for_layout = 'MOVIEING ASTRONAUT';
    public $topRedirectOption = array(
        'controller' => 'tops',
        'action'     => 'index'
    );
    public $omdbapiUrl = 'http://www.omdbapi.com/?apikey=1b46575f';

    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'tops',
                'action'     => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'tops',
                'action'     => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'fields' => array('username' => 'email')
                )
            )
        )
    );

    public function beforeFilter()
    {
        if ($this->Auth->loggedIn() === true) {
            $this->isLoggedIn = true;
        }

        $this->set('isLoggedIn', $this->isLoggedIn);

        // ログインユーザー情報送信
        $this->loginUser = $this->Auth->user();
        $this->set('loginUser', $this->loginUser);

        // title設定
        $this->set('title_for_layout', $this->title_for_layout);
    }

    public function execApi($requestUrl)
    {
        $response = file_get_contents($requestUrl);
        $result = json_decode($response, true);
        return $result;
    }
}
