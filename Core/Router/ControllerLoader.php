<?php

namespace SimpleMvc\Core\Router;

class ControllerLoader {
    public function load($controller) {

        require_once(MvcPath::controllers . $controller . '.php');

    }
}