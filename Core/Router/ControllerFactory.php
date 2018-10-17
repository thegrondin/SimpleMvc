<?php

namespace SimpleMvc\Core\Router;

class ControllerFactory {

    public static function create(Route $route) {

        $controllerClass = new \ReflectionClass("\\SimpleMvc\\Application\\Controllers\\" . $route->getController());
        $controllerInstance = $controllerClass->newInstanceArgs(array('substr'));

        $methodName = $route->getAction();
        if (\strpos($route->getAction(), '?') !== false) {
            $methodName = \substr($route->getAction(), 0, \strpos($route->getAction(), "?"));
        }

        $actionMethod = new \ReflectionMethod("\\SimpleMvc\\Application\\Controllers\\" . $route->getController(), $methodName);

        if (sizeof($_REQUEST) == 0) {
            $actionMethod->invoke($controllerInstance, null);
        }
        else {
            $actionMethod->invoke($controllerInstance, $_REQUEST);
        }

    }


}