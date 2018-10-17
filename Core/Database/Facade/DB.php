<?php

namespace SimpleMvc\Core\Database\Facade;

class DB {
    
    public static function __callStatic($method, $args) {

        $databaseManager = new \SimpleMvc\Core\Database\DatabaseManager();
        $databaseManager->openConnection(new \mysqli(SQL_HOST, SQL_USER, SQL_PASSWORD, SQL_DB));
        $query = \call_user_func_array([$databaseManager, $method], $args);
        $databaseManager->closeConnection();

        return $query;
    }

}