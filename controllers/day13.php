<?php

$debug = [];

class Database {

    private $txtDataBaseName;
    private $loaded;
    private $db_data;

    public function __construct($txtDataBaseName) {
        $this->txtDataBaseName = $txtDataBaseName;
        $this->loaded = false;
    }

    public function init() {
        file_exists($this->txtDataBaseName);
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

class Model {

    private $db;
    private $id;

    public function __construct(Database $db, $table_name) {
        $this->db = $db;
        $this->id = $table_name;
        $this->loaded = false;
    }

    public function insertOrUpdate($id, $record) {
        $myData = $this->db->load();
        $myData[$this->id][$id] = $record;
        $this->db->commit($myData);
    }

    public function load($id) {
        $myData = $this->db->load();
        return $myData[$this->id][$id];
    }

    public function loadAll() {
        $myData = $this->db->load();
        return $myData[$this->id];
    }

    public function delete($id) {
        $myData = $this->db->load();
        $myData[$this->id][$id] = null;
        $this->db->commit($myData);
    }

    public function deleteAll() {
        $myData = $this->db->load();
        $myData[$this->id] = null;
        $this->db->commit($myData);
    }

}

$testDatabase = new Database('templates\pages\tasks\day13\database.txt');
$user = new Model($testDatabase, 'users');
$girl = new Model($testDatabase, 'girl');
$user->insertOrUpdate('fucki it', ['id1' => 'some shit here', 'id2' => 'some shit here', 'id3' => 'some shit here',]);
$girl->insertOrUpdate('fucki it', ['id1' => 'your bunny wrode', 'id2' => 'your bunny wrode', 'id3' => 'your bunny wrode',]);
$girl->insertOrUpdate('26485277536', ['id1' => 'your bunny wrode2', 'id2' => 'your bunny wrode2', 'id3' => 'your bunny wrode2',]);
$testDatabase->save(); // must be initialised each team before reload the page;
//---------------------------------------------
// my data base structure
// not in use, just a sample
$dataBaseArray = [
    'users' => ['id1' => 'some shit here', 'id2' => 'some shit here', 'id3' => 'some shit here',],
    'girls' => ['id1' => 'some shit here', 'id2' => 'some shit here', 'id3' => 'some shit here',],
];

$debug[] = $testDatabase->load();
//----------------------------------------------




$myText = $_POST ?? false;
if ($myText) {
    $user->insertOrUpdate('textInput1', $myText['testText1']);
    $user->insertOrUpdate('textInput2', $myText['testText2']);
    $testDatabase->save();
    $page['content']['textReturn'] = $user->load('textInput1') .'<br>'. $user->load('textInput2');
}




// Cheack root directory for this file
//var_dump(__DIR__);

ob_start();
var_dump($debug);
$debuRresult = ob_get_clean();

//$page['content']['debug'] = $debuRresult;

$page['content']['rendered'] = render_task($page, 'tasks/day13');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

