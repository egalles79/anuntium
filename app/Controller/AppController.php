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
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
	    'Cookie',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            ),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'username', 'password' => 'password'
                    )
                ),
            )
        ),
        'Session',
        'Flash',
        'RequestHandler',
        'Paginator',
        'PhpExcel',
        'EmailText'
    );

    public $helpers = array('Html', 'Form', 'Session','PhpExcel');
    public $paginate = array(
        'limit' => 10,
    );
    public function setLanguage() {
    $language = Configure::read('Config.language');
	if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
        $language = $this->Cookie->read('lang');
	    $this->Session->write('Config.language', $language);
        }
	if ($this->Session->read('Config.language') == null) {
		$this->Session->write('Config.language',$language);
	} 
	$this->locale = $this->Session->read('Config.language');
    }
    public function beforeFilter() {
        $languages = Configure::read('Config.languages');
        $this->setLanguage();
	    $this->set('languages',$languages);
        
        if (!$this->isControllerAllowed($this->params->controller)) {
            $this->layout = 'default';
        }
        
        if ($this->params->controller == 'PromotionCodes' && $this->params->action == 'checkPromotionCode' && $this->params->action == 'display') {
            $this->Auth->allow();
        }
        if ($this->params->controller == 'Users' && $this->params->action == 'view') {
            $this->Auth->allow();
        }
        if ($this->params->controller == 'Users' && $this->params->action == 'reestablished') {
            $this->Auth->allow();
        }
        if ($this->params->controller == 'Users' && $this->params->action == 'viewuser') {
            $this->Auth->allow();
        }

        if ($this->params->controller == 'Users' && $this->params->action == 'forgotPassword') {
        	$this->layout = 'default';
        }
        if ($this->params->controller == 'Partners' && $this->params->action == 'indexpartner') {
            $this->Auth->allow();
        }
        
        $this->Auth->loginAction = array(
          'controller' => 'users',
          'action' => 'login'
        );
        
        /*$this->Auth->loginRedirect = array(
          'controller' => 'exercises',
          'action' => 'index'
        );*/
        $user = $this->Session->read('Auth.User');
        if ($user['group_id'] == 1) {
            $this->layout = 'logged';
            //$this->redirect('/Clients/index');
        } else if ($user['group_id'] == 2) {
            $this->layout = 'user';
            //$this->redirect('/Clients/index');            
        } else if ($user['group_id'] == 3) {
            $this->layout = 'partner';            
            //$this->redirect('/Clients/index');            
        }
        $this->set('user',$user);
        $this->Paginator->settings = $this->paginate;
        //$this->Auth->allow();
        //$this->Auth->allow('display','isAllowed','acl_manager','acl');
    }

    
    public function isControllerAllowed($controller) {
        $user = $this->Auth->user();
        $return = false;
        if ($user['group_id'] === 1) {
            $return = true;
        }
        return $return;        
    }

    public function isAllowed() {
        $user = $this->Auth->user();
        if ($user['group_id'] === 1) {
            $this->set('user',$user);
            return true;
        }
        return false;
    }
    
    public function isAuthorized($token) {
        App::uses('UsersController', 'Controller');
        $UsersController = new UsersController;
        $UsersController->constructClasses();
        $userData = $UsersController->authenticationToken($token);
        return $userData;
    }

    public function getParamsFromHeader($paramsToGetFromHeader = array()) {
        $headers = apache_request_headers();
        $paramsToReturnFromHeader  =array();

        foreach ($paramsToGetFromHeader as $paramHeader) {
            $paramsToReturnFromHeader[] = isset($headers[$paramHeader]) ? $headers[$paramHeader] : '';
        }        
        return $paramsToReturnFromHeader;
    }

    public function checkIfIsEmailValid($email) {
        $checkIfEmailVaild = (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; 
        return $checkIfEmailVaild;
    }

    

    

    public function getParamsFromGet($paramsToGetFromGet = array()) {
        $params = $this->request->query;
        $paramsToReturnFromGet  =array();
        foreach ($paramsToGetFromGet as $paramGet) {
            $paramsToReturnFromGet[] = isset($params[$paramGet]) ? $params[$paramGet] : '';
        }

        return $paramsToReturnFromGet;
    }

    
    public function getParamsFromPost($paramsToGetFromPost = array()) {
        $params = $this->request->data;
        
        $paramsToReturnFromPost  =array();
        foreach ($paramsToGetFromPost as $paramPost) {
            $paramsToReturnFromPost[] = isset($params[$paramPost]) ? $params[$paramPost] : '';
        }
        return $paramsToReturnFromPost;
    }

    public function getparamsFromDelete($paramsToGetFromDelete = array()) {
        $params = $this->request->data;
        $paramsToReturnFromDelete  =array();
        foreach ($paramsToGetFromDelete as $paramDelete) {
            $paramsToReturnFromPost[] = isset($params[$paramDelete]) ? $params[$paramDelete] : '';
        }
        return $paramsToReturnFromDelete;
    }
    public function cleanParamsFromArray($arrayPassed, $params) {
        if (is_array($arrayPassed)) {
            foreach ($params as $param) {
                unset($arrayPassed[$param]);
            }
        } else {
            $arrayPassed = false;
        }
        return $arrayPassed;
    }

    public function cleanInput($textString = '') {
        $textToReturn = addslashes($textString);
        return $textToReturn;
    }

    public function guardaLog($data) {
        $this->loadModel('Log');
        $requestData = array();
        $requestData['Log']['data'] = json_encode($data);
        $this->Log->create();
        $this->Log->save($requestData);
    }

}
