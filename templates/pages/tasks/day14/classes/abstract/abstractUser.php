<?php

abstract class AbstractUser {

    protected $is_logged_in;
    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
        $this->is_logged_in = false;
    }

    public function isLoggedIn() {
        return $this->is_logged_in;
    }

    abstract public function register($email, $password, $name, $surname);

    abstract public function login($user, $password);

    abstract public function logout();

    abstract public function delete($email);
}


