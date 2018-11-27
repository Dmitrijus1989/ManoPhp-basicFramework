<?php
session_start();
include ('templates\pages\tasks\day14\classes\abstract\abstractUser.php');
include ('templates\pages\tasks\day14\classes\database.php');
include ('templates\pages\tasks\day14\classes\model.php');
include ('templates\pages\tasks\day14\classes\user.php');

$database = new Database('templates\pages\tasks\day14\db.txt');
$user = new User($database);

$action = $_POST ?? false;

if ($action) {
    echo "<meta http-equiv=refresh";
}

if (isset($action['email']) && $action['email']) {
    if ($action['password'] === $action['passwordConfirm']) {
        $return_to_user = $user->register($action['email'], $action['password'], $action['name'], $action['surname']);
    } elseif ($action['password'] !== $action['passwordConfirm']) {
        $return_to_user = 'Your passwords do not match!';
    }
} elseif (isset($action['loginEmail']) && $action['loginEmail']) {
    $return_to_user = $user->login($action['loginEmail'], $action['loginPassword']);
} elseif (isset($action['logout']) && $action['logout']) {
    $return_to_user = $user->logout();
}


$page['content']['isLoggedIn'] = $user->isLoggedIn();
$page['content']['registration'] = $return_to_user ?? false;
$page['content']['rendered'] = render_task($page, 'tasks/day14');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

