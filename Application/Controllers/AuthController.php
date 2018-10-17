<?php

namespace SimpleMvc\Application\Controllers;

use SimpleMvc\Core\Session\Session;
use SimpleMvc\Core\Controller\Controller;

class AuthController extends Controller {
    
    private $_userRepository = null;

    function __construct() {

        parent::__construct();

        $this->_userRepository = $this->repository('UserRepository');

        if (!Session::variableExist('tries')){
            Session::setVariable('tries', 0);
        }
        
    }

    public function login() {

        $this->view->render('auth/login', array('tries' =>  Session::getVariable('tries') ));

    }

    public function logout() {
        
        if (Session::isStarted()) {

            Session::close();
        
        }

        $this->redirect('auth/login');

    }

    public function authenticate($req) 
    {

        $user = $this->_userRepository->getSingleByUsername($req['username']);

        if ( $user != null && $user->password === $req['password']) {
            

            Session::setVariable('username', $user->username);
            Session::setVariable('password', $user->password);

            $this->redirect('home/index');
        }
        else {
            Session::setVariable('tries', Session::getVariable('tries') + 1);
            $this->redirect('auth/login');
        }
    
        

    }

}