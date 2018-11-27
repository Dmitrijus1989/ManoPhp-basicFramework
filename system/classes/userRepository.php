<?php

class UserRepository {
    
    /**
     * Database class instance
     * @var Datbase
     */
    private $db;
    
    /**
     * Model instance of the user table(model)
     * @var Model
     */
    private $model;
    
    public function __construct(Database $db) {
        $this->db = $db;
        $this->model = new Model($db, 'users');
    }
    
    public function add(User $user) {
        $this->model->insertOrUpdate($user->getEmail(), $user);
        $this->model->push();
    }

    public function delete($email) {
        $this->model->delete($email);
    }

    public function deleteAll() {
        $this->model->deleteAll();
    }

    public function load($email) {
        $my_temp_return = $this->model->load($email) ?? false;
        return $my_temp_return;
    }

    public function loadAll() {
        return $this->model->loadAll();
    }

    public function update(User $user) {
        $this->model->insertOrUpdate($user->getEmail(), $user);
        $this->model->push();
    }

}
