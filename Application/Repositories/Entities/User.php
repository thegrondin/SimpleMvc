<?php

namespace SimpleMvc\Application\Repositories\Entities;

class User {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $isAdmin;

    function __construct(int $id = null, string $firstname = "", string $lastname = "", string $email = "", string $username = "", string $password = "", int $isAdmin = 0) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->password= $password;
        $this->isAdmin = $isAdmin;
    }
}