<?php

namespace SimpleMvc\Application\Controllers;

use \SimpleMvc\Core\Authentification\Auth;
use \SimpleMvc\Core\Session\Session;
use \SimpleMvc\Core\Controller\Controller;

class ConfigurationController extends Controller {
    
    private $_currentUser;

    function __construct() {

        parent::__construct();

        $userRepo = $this->repository('UserRepository');

        Auth::checkWith($userRepo);

        $this->_currentUser = $userRepo->getSingleByUsername(Session::getVariable('username'));
    
    }

    public function index() {
        $colors = array(
            'red' => 'rgb(255, 132, 132)', 
            'blue' => 'rgb(196, 218, 255)', 
            'orange' => 'rgb(250, 205, 120)', 
            'yellow' => 'rgb(255, 255, 118)'
        );

        $this->view->renderWithLayout('shared/header', 'shared/footer', 'panel/config/index', 
            array(  "firstname" => $this->_currentUser->firstname, 
                    "lastname" => $this->_currentUser->lastname,
                    "colors" => $colors
            ));


    }

    public function setGlobalColor($req) {
        Session::SetVariable('globalColor', $req['color']);

        $this->redirect('configuration/index');
    }

}