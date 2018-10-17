<?php

namespace SimpleMvc\Application\Controllers;

use \SimpleMvc\Core\Session\Session;
use \SimpleMvc\Core\Authentification\Auth;
use \SimpleMvc\Core\Controller\Controller;

class HomeController extends Controller {
    
    private $_userRepo;

    public function __construct() {
        
        parent::__construct();

        $this->_userRepo = $this->repository('UserRepository');

        Auth::checkWith($this->_userRepo);
    }

    public function index() {

        $user = $this->_userRepo->getSingleByUsername(Session::getVariable('username'));

        $this->view->renderWithLayout('shared/header', 'shared/footer', 'panel/home/index', array(

            "firstname" => $user->firstname, 
            "lastname" => $user->lastname, 
            "email" => $user->email

        ));

    }

}