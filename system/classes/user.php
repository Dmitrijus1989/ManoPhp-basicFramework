<?php

class User {

    private $email;
    private $password;
    private $data;

    public function __construct($email, $password, $data) {
        $this->email = $email;
        $this->password = $password;
        $this->data = $data;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getData() {
        return $this->data;
    }
    public function getAll() {
        $user = [
            'email' => $this->email,
            'password' => $this->password,
            'data' => $this->data
        ];
        return $user;
    }
    public function updateData($id, $param) {
        $this->data[$id][] = $param;
    }
    public function updateAllDataByID($id, $param) {
        $this->data[$id] = $param;
    }
    public function cleanAllWiewedAndLiked() {
        $this->data['viewed'] = [];
        $this->data['liked'] = [];
    }
}
