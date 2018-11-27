<?php
class Database {

    private $txtDataBaseName;
    private $loaded;
    private $db_data;

    public function __construct($txtDataBaseName) {
        $this->txtDataBaseName = $txtDataBaseName;
        $this->loaded = false;
        $this->init();
    }

    public function init() {
        if (!file_exists($this->txtDataBaseName)) {
            file_put_contents($this->txtDataBaseName, '');
        }
            
    }

    public function load() {
        if (!$this->loaded) {
            $this->db_data = unserialize(file_get_contents($this->txtDataBaseName));
            $this->loaded = true;
        }

        return $this->db_data;
    }
    
    public function commit($data) {
        $this->db_data = $data;
    }

    public function save() {
        file_put_contents($this->txtDataBaseName, serialize($this->db_data));
    }

    public function delete() {
        unlink($this->txtDataBaseName);
    }

}


