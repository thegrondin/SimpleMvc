<?php
namespace SimpleMvc\Application\Controllers;

use \SimpleMvc\Core\Session\Session;
use \SimpleMvc\Core\Authentification\Auth;
use \SimpleMvc\Core\Controller\Controller;
use \SimpleMvc\Application\Repositories\Entities\User;

class GestionController extends Controller {

    private $_userRepo = null;

    private $_currentUser;

    function __construct() {

        parent::__construct();

        $this->_userRepo = $this->repository('UserRepository');

        Auth::checkWith($this->_userRepo);

        $this->_currentUser = $this->_userRepo->getSingleByUsername(Session::getVariable('username'));
    }

    public function index() {

        $users = $this->_userRepo->getAll();

        if ($this->_currentUser->isAdmin == 0) {
            for ($i = 0; $i < sizeof($users); $i++) {
                if ($users[$i]->isAdmin == 1) {
                    unset($users[$i]);
                }
            }
        }

        $this->view->renderWithLayout('shared/header', 'shared/footer', 'panel/gestion/index', 
            array(  "users" => $users, 
                    "firstname" => $this->_currentUser->firstname, 
                    "lastname" => $this->_currentUser->lastname,
                    "connectedUserUsername" => $this->_currentUser->username
        ));
    }

    public function add() {

        $this->redirect('gestion/edit');
    }

    public function remove($req) {

        
        $this->_userRepo->delete($req['id']);

       
        $this->redirect('gestion/index');
        

    }

    public function edit($req) {

        $user;
        if (isset($req['id'])) {
            $user = $this->_userRepo->getSingleById($req['id']);

        }
        else {
            $user = new User();
        }

        
        $this->view->renderWithLayout('shared/header', 'shared/footer', 'panel/gestion/edit', array(

            "firstname" => $this->_currentUser->firstname, 
            "lastname" => $this->_currentUser->lastname, 
            "user" => $user

        ));
 
    }

    public function applyChanges($req) {
        if ($req['username'] != null && $req['firstname'] != null && $req['lastname'] != null && $req['email'] != null && $req['password'] != null) {
            
            $user = new User(null, $req['firstname'], $req['lastname'], $req['email'], $req['username'], $req['password']);

            $matchUser = $this->_userRepo->getSingleByUsername($req['username']);
            
            if ($matchUser == null) {
                $this->_userRepo->add($user);
            }
            else {
                $this->_userRepo->update($matchUser->id, $user);
            }
        }

        $this->redirect('gestion/index');
    }   
}