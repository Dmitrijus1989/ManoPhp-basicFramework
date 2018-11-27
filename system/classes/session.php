<?php

class Session {

    /**
     *
     * @var UserRepository
     */
    private $user_repository;
    private $user;
    private $is_logged_in;

    public function __construct(UserRepository $ur) {
        $this->user_repository = $ur;
        $this->is_logged_in = false;
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function login($email, $password) {
        $user = $this->user_repository->load($email);
        if ($user && $user->getPassword() == md5($password)) {
            $_SESSION['user'] = $email;
            $this->is_logged_in = true;
            $this->user = $user;
            return true;
        } else {
            return 'Incorrect ID or password';
        }
    }

    public function register($email, $password, $data) {
        $user = $this->user_repository->load($email);
        if (!$user) {
            $newUser = new User($email, $password, $data);
            $this->user = $newUser;
            $this->user_repository->add($newUser);
            return 'Your registration successful';
        } else {
            return 'Email already exist';
        }
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user'])) {
            $this->is_logged_in = true;
        }
        return $this->is_logged_in;
    }

    public function getCurrentUser() {
        if ($this->isLoggedIn()) {
            if ($this->user) {
                return $this->user;
            } else {
                $this->user = $this->user_repository->load($_SESSION['user']);
                return $this->user;
            }
        }
    }

    public function logout() {
        $this->is_logged_in = false;
        $_SESSION = [];
        setcookie(session_name(), '', - 3600);
        session_destroy();
    }

}
