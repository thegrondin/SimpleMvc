<?php

namespace SimpleMvc\Core\Router;

class Route 
{
    
    private $_controller = "";
    private $_action = "";

    function __construct(string $controller, string $action) {
        $this->setController($controller);
        $this->setAction($action);
    }

    public function setController(string $controller) {
        $this->_controller = $controller;
    }

    public function setAction(string $action) {
        $this->_action = $action;
    }

    public function getController() {
        return $this->_controller;
    }

    public function getAction() {
        return $this->_action;
    }

    public function get() {
        return array($this->_controller, $this->_action);
    }

}