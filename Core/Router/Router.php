<?php

namespace SimpleMvc\Core\Router;

class Router {

    private $_routeCollection = [];

    function __construct(RouteCollection $collection) {
        
        if ($collection->isEmpty()) {
            throw new \Exception("The Route collection is Empty");
        }

        $this->_routeCollection = $collection->getCollection();

        foreach ($this->_routeCollection as $route) {
            new ControllerLoader($route->getController());
        }
       

    }

    public function dispatch(RouteDispatcher $dispatcher) {

    
        if($dispatcher->requestValid()) {

            if (!$dispatcher->actionExist()) {
                return ControllerFactory::create($this->_routeCollection[$dispatcher->getControllerName()]);
            }
            
            return ControllerFactory::create(
                new Route(
                   $dispatcher->getControllerName() . "Controller", 
                    $dispatcher->getActionName()
                )
             );

        }
        else {
            echo "not found";
        }

    }



}