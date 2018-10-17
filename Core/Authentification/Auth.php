<?php

namespace SimpleMvc\Core\Authentification;

use \SimpleMvc\Core\Session\Session;

class Auth {

    public static function checkWith($repo) {

        if (Session::variableExist('username') && Session::variableExist('password')) {
            $user = $repo->getSingleByUsername(Session::getVariable('username'));
            
            if ($user == null && $user->password !== Session::getVariable('password')) {
               header("Location: /auth/login");
               die();
            }
        }
        else {
            header("Location: /auth/login");
            die();
        }
    }
}
