<?php

namespace SimpleMvc\Core\Router;

class RouteDispatcher 
{

    private $_uri = "";

    private $_controllerName = "";
    private $_actionName = "";

    function __construct(string $uri) {

        $this->_uri = $uri;

        $uriParams = \explode('/', $uri);

        $this->setControllerName($uriParams[1]);

        if (\array_key_exists(2, $uriParams)) {
            $this->setActionName($uriParams[2]);
        }

    }

    public function setControllerName(string $controllerName) {

        $this->_controllerName = $controllerName;

    }

    public function setActionName(string $actionName) {
        $this->_actionName = $actionName;
    }

    public function requestValid() {
        return \file_exists(\SimpleMvc\Core\MvcPath::controllers . \ucfirst($this->_controllerName) . 'Controller.php');
    }

    public function actionExist() {
        return $this->getActionName() !== "";
    }

    public function getControllerName() {
        return $this->_controllerName;
    }

    public function getActionName() {
        return $this->_actionName;
    }
    

}