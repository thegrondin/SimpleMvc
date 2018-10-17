<?php

namespace SimpleMvc\Core\Session;

class Session {

    public static function open() {
        if (!Self::isStarted()) {
            \session_start();
        }
    }

    public static function close() {
        if (Self::isStarted()) {
            \session_destroy();
        }
    }

    public static function isStarted() {
        return \session_status() != PHP_SESSION_NONE;
    }

    public static function setVariable(string $name, string $value) {
        if (Self::isStarted()) {
            $_SESSION[$name] = $value;
        }
    }

    public static function variableExist(string $name) {
        return isset($_SESSION[$name]);
    }

    public static function getVariable(string $name) {
        return $_SESSION[$name];
    }

}