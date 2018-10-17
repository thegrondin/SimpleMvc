<?php

namespace SimpleMvc\Core\Controller;

use \SimpleMvc\Core\Session\Session;
use \SimpleMvc\Core\View\View;
use \SimpleMvc\Core\MvcPath;

class Controller {

    protected $view;

    function __construct() {

        Session::open();

        $this->view = new View();
    }

    public function repository($repo) {
        require_once MvcPath::repositories . $repo . ".php";

        $repository = "\\SimpleMvc\\Application\\Repositories\\$repo";

        return new $repository();
    }

    public function redirect(string $action) {
        header('Location: /'. $action); 
    }

}