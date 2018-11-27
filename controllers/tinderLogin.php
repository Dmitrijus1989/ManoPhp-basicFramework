<?php

require_once 'system/classes/classes.php';
$page['show_aside'] = false;

$database = new Database('database/newTinderDB.txt');
$user_repository = new UserRepository($database);
$session = new Session($user_repository);

if ($session->isLoggedIn()) {
    header("Location: http://manophp.lt:88/tinder");
    exit;
}


$action = $_POST ?? false;
if (isset($action['login'])) {
    $return_to_user = $session->login($action['email'], $action['password']);
    if ($return_to_user === true) {
        header("Location: http://manophp.lt:88/tinder");
        exit;
    }
}

if (isset($action['registration'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . time() . '-' . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // not in use for now
// Check if image file is a actual image or fake image
    if ($_FILES["fileToUpload"]['error'] > 0) {
        $return_to_user = 'File upload error, maybe your file is too big ?';
    } else {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $temp_age = explode('-', $action['dateOfBirth']);
            $age = date('Y') - $temp_age[0];
            $data = [
                'firstName' => $action['firstName'],
                'lastName' => $action['lastName'],
                'dateOfBirth' => $action['dateOfBirth'],
                'gender' => $action['gender'],
                'age' => $age,
                'image' => $target_file,
                'liked' => [],
                'viewed' => [],
            ];
            $user = new User($action['email'], md5($action['password']), $data);
            $user_repository->add($user);
            $session->login($action['email'], $action['password']);
            header("Location: http://manophp.lt:88/tinder");
            exit;
        } else {
            $return_to_user = "File is not an image.";
        }
    }
}



$page['content']['return'] = $return_to_user ?? false;
$page['stylesheet'] = 'tinder.css';
$page['title'] = 'Tinder';
$page['content']['rendered'] = render_page($page, 'tinderLogin');

