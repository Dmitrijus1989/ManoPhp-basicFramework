<?php

class User extends AbstractUser {

    private $model;

    public function __construct(Database $db) {
        parent::__construct($db);
        $this->model = new Model($this->db, 'users');
    }

    public function delete($email) {
        $this->model->delete($email);
        $this->model->push();
    }
    
    public function isLoggedIn() {
        if (isset($_SESSION['user'])) {
            $this->is_logged_in = true;
        }
        return parent::isLoggedIn();
    }
    
    public function login($email, $password) {
        $user = $this->model->load($email);
        if ($user && $user['password'] == md5($password)) {
            $_SESSION['user'] = $email;
            $this->is_logged_in = true;
            return 'You have logged in';
        } else {
            return 'Incorrect ID or password';
        }
    }

    public function logout() {
        $this->is_logged_in = false;
        $_SESSION = [];
        setcookie(session_name(), '', - 3600);
        session_destroy();
        return 'Bye Bye mzfk';
    }

    public function register($email, $password, $name, $surname) {
        $user = $this->model->load($email);
        if (!$user) {
            $temp_array = [
                'email' => $email,
                'password' => md5($password),
                'name' => $name,
                'surname' => $surname
            ];
            $this->model->insertOrUpdate($email, $temp_array);
            $this->model->push();
            return 'Your registration successful';
        } else {
            return 'Email already exist';
        }
    }

}
