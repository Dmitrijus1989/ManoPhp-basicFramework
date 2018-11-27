<?php
$test_array = [
    'wtf',
    'your bunny wrote',
    'some shit here',
    [
        '123',
        1234,
        'bla bla'
    ]
];
$text = serialize($test_array);
var_dump($text);
$arrr = unserialize($text);
var_dump($arrr);

$text = json_encode($test_array);
var_dump($text);
$arrr = json_decode($text);
var_dump($arrr);
//------------------------------------------------------------------------------
$my_title = null;
$my_h1 = null;

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'home') {
        $my_title = 'Home Page';
        $my_h1 = 'Sveiki atvyke!';
    }elseif ($_GET['page'] == 'cv') {
        $my_title = 'Mano CV';
        $my_h1 = 'CV';
    }elseif ($_GET['page'] == 'showcase') {
        $my_title = 'Mano Paroda';
        $my_h1 = 'Paroda: Skaiciuokle';
    } else {
        $my_title = 'Fuck you';
        $my_h1 = 'Fuck you';
    }
}
?>



        <!--        ../ 1 step back     -->
        <!--        / from root folder  -->

        <link rel="stylesheet" href="/templates/pages/tasks/day9/style.css">

        <!--------------------------------------------------------------------->
        <div class="main task1">
            <h2 class="task  myH">task</h2>
            <p class="task myP">null</p>
            <div class="taskInside">
                <?php if (isset($_GET['page'])): ?>
                    <h1><?php print $my_h1 ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <!--------------------------------------------------------------------->
        <div class="main task1">
            <h2 class="task  myH">task</h2>
            <p class="task myP">null</p>
            <div class="taskInside">


            </div>
        </div>
        <!--------------------------------------------------------------------->
        <div class="main task1">
            <h2 class="task  myH">task</h2>
            <p class="task myP">null</p>
            <div class="taskInside">


            </div>
        </div>
