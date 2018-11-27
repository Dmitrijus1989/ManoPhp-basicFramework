<?php

$page['title'] = 'Classes !!!';

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

class Girl {

    private $name;
    private $age;
    private $email;
    private $image;

    public function __construct($name, $age, $email, $image) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->image = $image;
    }

    public function set_age($age) {
        $this->age = $age;
    }

    public function set_email($email) {
        $this->email = $email;
    }

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_image($image) {
        $this->image = $image;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_age() {
        return $this->age;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_all() {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email,
            'image' => $this->image
        ];
    }

    public function match() {
        $match_return = rand(0, 10);
        if ($match_return >= 5) {
            return true;
        } else {
            return false;
        }
    }

}

class SexyGirl extends Girl {

    public function match() {
        $match_return = rand(0, 10);
        if ($match_return >= 8) {
            return true;
        } else {
            return false;
        }
    }

}

class UglyGirl extends Girl {

    public function match() {
        $match_return = rand(0, 10);
        if ($match_return >= 3) {
            return true;
        } else {
            return false;
        }
    }

}

class Tinder {

    const COOKIE_NAME = 'tinder';

    private $database;
    private $model;

    /**
     * Array of Girl
     * @var Girl
     */
    private $girls;       

    /**
     * Array of Girl
     * @var Girl
     */
    private $viewed;
    private $liked;
    private $match;

    public function __construct() {
        $this->viewed = [];
        $this->database = new Database('database\tinderDb.txt');
        $this->model = new Model($this->database, 'tinderDb');
    }

    public function girl_add($girl) {
        $this->girls[] = $girl;
    }

    public function girl_like() {
        if (end($this->viewed)->match()) {
            $this->match[] = end($this->viewed);
        }
    }

    public function girl_view_next() {
        foreach ($this->girls as $any_girl) {
            if (!in_array($any_girl, $this->viewed)) {
                $this->viewed[] = $any_girl;
                $this->dbSaveAll();
                return $any_girl;
            }
        }
    }

    public function girl_view_last() {
        if (!empty($this->viewed)) {
            return end($this->viewed);
        } else {
            return $this->girl_view_next();
        }
    }

    public function girls_count() {
        return count($this->girls);
    }

    public function getMatch() {
        return $this->match;
    }

    public function dbSaveAll() {
        $this->model->insertOrUpdate('match', $this->match);
        $this->model->insertOrUpdate('girls', $this->girls);
        $this->model->insertOrUpdate('viewed', $this->viewed);
        $this->database->save();
    }

    public function dbLoadAll() {
        $db_data = $this->model->loadAll();
        $this->girls = $db_data['girls'] ?? [];
        $this->viewed = $db_data['viewed'] ?? [];
        $this->match = $db_data['match'] ?? [];
        
    }

    
    /* Old save/load sistem (the very basic fake database, that uses cookies insted)
     */
//    public function cookie_save() {
//        $data = [
//            'match' => $this->match,
//            'girls' => $this->girls,
//            'viewed' => $this->viewed,
//        ];
//        setcookie(self::COOKIE_NAME, serialize($data), time() + 36000);
//    }
//    public function cookie_load() {
//        $cookie_data = $_COOKIE[self::COOKIE_NAME] ?? false;
//        if ($cookie_data) {
//            $cookie_data = unserialize($cookie_data);
//            $this->girls = $cookie_data['girls'] ?? [];
//            $this->viewed = $cookie_data['viewed'] ?? [];
//            $this->match = $cookie_data['match'] ?? [];
//        }
//    }
//    public function cookie_clean() {
//        $this->girls = [];
//        $this->viewed = [];
//        setcookie(self::COOKIE_NAME, '', time() - 3600);
//    }

}

class TinderDev extends Tinder {

    public function girl_add($girl = false) {
        if ($girl) {
            parent::girl_add($girl);
        } else {
            parent::girl_add($this->girlRandomiseAdvanced());
        }
    }

    public function girl_add_multiple($count) {
        for ($i = 0; $i < $count; $i++) {
            $this->girl_add();
        }
    }

    public function girlRandomiseAdvanced() {

        $girls_names_array = ['Kate', 'Anne', 'July', 'Agne', 'Jane', 'Egle', 'Lena', 'Nataly', 'Margo', 'Olga', 'Oksana', 'Dasha', "Greta", 'Elizabet', 'Garnet', 'Ruby', 'Nicole',
            'Emily', 'Ashley', 'Olivia', 'Emma', 'Alyssa', 'Beatrix', 'Sophia', 'Brianna', 'Victoria', 'Mia', 'Jasmine', 'Jennifer', 'Alexandra', 'Nicole', "Evelyn", 'Sara', 'Gabriella',
            'Lillian', "Janna", 'Tifany' ];

        $url_rand = 'https://loremflickr.com/200/300/girl?random=' . rand(1, 500);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_rand);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers

        $url_rand = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        $rand_name = $girls_names_array[array_rand($girls_names_array)];
        $temp_age = rand(18, 30);
        $temp_email = $rand_name . rand(1, 99999) . '-' . $temp_age . '@gmail.com';

        $randNumberHere = rand(0, 2);
        if ($randNumberHere === 0) {
            $xFactor = 'Girl';
        } elseif ($randNumberHere === 1) {
            $xFactor = 'UglyGirl';
        } elseif ($randNumberHere === 2) {
            $xFactor = 'SexyGirl';
        }

        return new $xFactor($rand_name, $temp_age, $temp_email, $url_rand);
    }

    public function girlRandomise() {
        $girls_names_array = ['Kate', 'Anne', 'July', 'Agne', 'Jane', 'Egle', 'Lena', 'Nataly', 'Margo', 'Olga', 'Oksana', 'Dasha', "Greta", 'Elizabet', 'Garnet', 'Ruby', 'Nicole',];

        $url_rand = "https://picsum.photos/200/300/?random";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_rand);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers

        $url_rand = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        $rand_name = $girls_names_array[array_rand($girls_names_array)];
        $temp_age = rand(18, 30);
        $temp_email = $rand_name . rand(1, 99999) . rand(1, 99999) . '-' . $temp_age . '@gmail.com';

        return new Girl($rand_name, $temp_age, $temp_email, $url_rand);
    }

}

$action = $_POST['action'] ?? false;
if ($action) {
    $debug = [];

    $tinder = new TinderDev();
    $tinder->dbLoadAll();
    if (!$tinder->girls_count()) {
        $tinder->girl_add_multiple(10);
        $tinder->dbSaveAll();
        $debug[] = "GENERATED NEW SET";
    }

    switch ($action) {
        case 'next':
            $girl_in_page = $tinder->girl_view_next();
            $debug[] = "View next girl + save cookies";
            break;
        case 'like':
            $tinder->girl_like();
            $girl_in_page = $tinder->girl_view_next();
            break;

        default:
            $girl_in_page = $tinder->girl_view_last();
            $debug[] = "View last girl";
    }

//    if (!$girl_in_page) {
//        $debug[] = "Clean cookies";
//        $tinder->cookie_clean();
//        $no_more_girls = true;
//    }
}



/* debug system
 * we store all debug messages in an array, and print them in template */
ob_start();
var_dump($debug);
$result = ob_get_clean();

//$page['content']['debug'] = $result; // debug
$page['js'][] = 'day11.js';
if (isset($tinder)) {
    $page['content']['noMore'] = $no_more_girls ?? false;
    $page['content']['match'] = $tinder->getMatch();
    $page['content']['boba'] = $girl_in_page ?? false;
}
$page['content']['rendered'] = render_page($page, 'day11');



