<?php

use SimpleMvc\Core\Router\RouteCollection;
use SimpleMvc\Core\Router\Route;
use SimpleMvc\Core\Router\Router;
use SimpleMvc\Core\Router\RouteDispatcher;

define("ROOT_PROJECT_DIR", __DIR__);
define("URL", $_SERVER['HTTP_HOST']);

define("SQL_HOST", "host");
define("SQL_USER", "utilisateur");
define("SQL_PASSWORD", "XXXXXXXXXXXXXXX");
define("SQL_DB", "nom_db");

require_once "vendor/autoloader.php";

$routes = new RouteCollection();

$routes->add('auth', new Route('AuthController', 'login'));
$routes->add('configuration', new Route('ConfigurationController', 'index'));
$routes->add('gestion', new Route('GestionController', 'index'));
$routes->add('home', new Route('HomeController', 'index'));

$router = new Router($routes);

$routedispatcher = new RouteDispatcher($_SERVER["REQUEST_URI"] );

if ($_SERVER["REQUEST_URI"] == '/') {
    $routedispatcher = new RouteDispatcher("/auth");
}

$router->dispatch($routedispatcher);