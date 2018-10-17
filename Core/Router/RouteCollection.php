<?php 

namespace SimpleMvc\Core\Router;

class RouteCollection 
{

    public $_routes = array();

    public function add(string $routeName, Route $route) {
        $this->_routes[$routeName] = $route;
    }

    public function count() {
        return \sizeof($this->_routes);
    }

    public function isEmpty() {
        return $this->count() == 0;
    }

    public function setCollection(self $collection) {
        $this->_routes = $collection;
    }

    public function getCollection() {
        return $this->_routes;
    }
}