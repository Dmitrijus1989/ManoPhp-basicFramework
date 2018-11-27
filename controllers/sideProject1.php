<?php
$player = [
    'str' => 10,
    'agi' => 10,
    'con' => 10,
    'int' => 10,
    'wis' => 10
];
$enemy = [
    'str' => 10,
    'agi' => 10,
    'con' => 10,
    'int' => 10,
    'wis' => 10
];

$page['title'] = 'Colosseum!';
$page['stylesheet'] = 'sideProject1.css';
$page['content']['rendered'] = render_page($page, 'sideProject1');
