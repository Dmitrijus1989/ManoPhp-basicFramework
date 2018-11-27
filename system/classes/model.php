<?php
class Model {

    private $db;
    private $id;

    public function __construct(Database $db, $table_name) {
        $this->db = $db;
        $this->table_name = $table_name;
        $this->loaded = false;
    }

    public function insertOrUpdate($id, $record) {
        $myData = $this->db->load();
        $myData[$this->table_name][$id] = $record;
        $this->db->commit($myData);
        
    }
    public function push() {
        $this->db->save();
    }

    public function load($id) {
        $myData = $this->db->load();
        return $myData[$this->table_name][$id] ?? [];
    }

    public function loadAll() {
        $myData = $this->db->load();
        return $myData[$this->table_name] ?? [];
    }

    public function delete($id) {
        $myData = $this->db->load();
        unset($myData[$this->table_name][$id]);
        $this->db->commit($myData);
    }

    public function deleteAll() {
        $myData = $this->db->load();
        $myData[$this->table_name] = null;
        $this->db->commit($myData);
    }

}