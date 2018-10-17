<?php

namespace SimpleMvc\Core\Database;

class DatabaseManager {

    private $_databaseInstance;

    function __construct() {
        
    }

    public function openConnection($databaseInstance) {

        $this->_databaseInstance = $databaseInstance;

        if ($this->_databaseInstance->connect_error) {
            die("La connexion a echoue ...");
        }

    }

    public function closeConnection() {
        $this->_databaseInstance->close();
    }

    public function requestSecure(string $query, $variables) {
        $stmt = $this->_databaseInstance->prepare($query);

        \call_user_func_array(array($stmt, 'bind_param'), $variables);

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        return $result;
    }

    public function request(string $query) {
        
        $stmt = $this->_databaseInstance->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result(); 

        $stmt->close();

        return $result;
        
    }



}