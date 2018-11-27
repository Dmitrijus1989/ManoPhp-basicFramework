<?php

require_once 'system/classes/classes.php';
$page['show_aside'] = false;
$database = new Database('database/newTinderDB.txt');
$user_repository = new UserRepository($database);
$session = new Session($user_repository);
$tinder = new Tinder($user_repository, $session);
if (!$session->isLoggedIn()) {
    header("Location: http://manophp.lt:88/tinder/login");
    exit;
}


$action = $_POST['action'] ?? false;
if ($action) {
    $debug = [];


    switch ($action) {
        case 'next':
            $viewing_user = $tinder->user_view_next();
            $tinder->updateCurrentUser();
            break;
        case 'like':
            $tinder->like();
            $viewing_user = $tinder->user_view_next();
            $tinder->updateCurrentUser();
            break;
        case 'cleaning':
            $tinder->cleanAllWiewedLikedInCurrentUser();
            $viewing_user = $tinder->user_view_current();
            $tinder->updateCurrentUser();
            break;
        case 'logOut':
            $session->logout();
            header("Location: http://manophp.lt:88/tinder/login");
            exit;
            break;
        default:
            $viewing_user = $tinder->user_view_current();
            break;
    }
} else {
    $viewing_user = $tinder->user_view_current();

}


$action = false;


$page['stylesheet'] = 'tinder.css';
$page['title'] = 'Tinder';
$page['content']['welcome'] = $session->getCurrentUser()->getData();
$page['content']['matches'] = $tinder->findMatches() ?? false;
$page['content']['isLoggedIn'] = $session->isLoggedIn();
$page['content']['viewing_user'] = $viewing_user ?? false;
$page['content']['rendered'] = render_page($page, 'tinder');
