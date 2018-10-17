<?php

namespace SimpleMvc\Core\View;

use \SimpleMvc\Core\MvcPath;

class View {

    public function render($view, $viewBag = null) {
        $file = MvcPath::views . str_replace("/", DIRECTORY_SEPARATOR, $view) . '.php';
        if (\file_exists($file)) {
            require_once($file);
        }

    }

    public function renderWithLayout($prependLayoud, $appendLayout, $view, $viewBag = null) {
        $file = MvcPath::views . str_replace("/", DIRECTORY_SEPARATOR, $view) . '.php';
        if (\file_exists($file)) {
            require_once(MvcPath::views . str_replace("/", DIRECTORY_SEPARATOR, $prependLayoud) . '.php' );
            require_once($file);
            require_once(MvcPath::views . str_replace("/", DIRECTORY_SEPARATOR, $appendLayout) . '.php');
        }
    }
    
}