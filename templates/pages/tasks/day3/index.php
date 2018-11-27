<?php
//------------------------------task 1------------------------------------------
$string = "cia yra mano stringas";
$integer = 666;
$float = 666.666;
$bool = true;
$niekas = null;
//------------------------------task 2------------------------------------------
$task2Src1 = 'http://i190.photobucket.com/albums/z166/finaendor/Imagens%20aleatorias/Anarquiablood-1.jpg';
$task2Src2 = 'http://i1131.photobucket.com/albums/m547/romaan4/11134100r9Y8A1y.gif';
$task2Src3 = 'http://i453.photobucket.com/albums/qq254/MahrudNosaj/mixx-3.png';
$task2Src4 = 'http://i986.photobucket.com/albums/ae346/cameronwoolnough/MDSqLogoMultiColoured_zpsbf8vsrgm.jpg';
$task2href = 'http://photobucket.com/images/60x60';
//------------------------------task 3------------------------------------------
$manoPinigai = 1000;
$spentPerMonth = 600;
$earnedPerMonth = 800;
$unknownPerMonth = rand(100, 300);
$months = 24;
//------------------------------task 4------------------------------------------
$sunny = rand(0, 1);
$rain = rand(0, 1);
$oroimg = '';
$oras = '';
if ($sunny && !$rain) {
    $oroimg = "/templates/pages/tasks/day3/sun.png";
    $oras = "it is sunny today";
} elseif (!$sunny && $rain){
    $oroimg = "/templates/pages/tasks/day3/rain.png";
    $oras = "its raining today";
} elseif (!$sunny && !$rain) {
    $oroimg = "/templates/pages/tasks/day3/nosun.png";
    $oras = "it's not sunny, but atleast it's not raining!";
} elseif ($sunny && $rain) {
    $oroimg = "/templates/pages/tasks/day3/sunnyrain.png";
    $oras = "its sunny rain!";
}
//------------------------------task 5------------------------------------------
$seconds = intval(date('s'));
$zenklas = '';
if ($seconds % 2) {
    $zenklas = 'kvadratas';
} else  {
    $zenklas = 'apskritimas';
}

?>


        <link rel="stylesheet" href="/templates/pages/tasks/day3/day2Style.css">

    <body>
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">Varriable types in PHP</p>
            <p>string: <?php print $string; ?></p>
            <p>integer: <?php print $integer; ?></p>
            <p>float: <?php print $float; ?></p>
            <p>bool: <?php print $bool; ?></p>
            <p>niekas: <?php print $niekas; ?></p>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">src and href printed with PHP</p>
            <div class="taskInside">
                <a href="<?php print $task2href ?>"><img src="<?php print $task2Src1 ?>"></a>
                <a href="<?php print $task2href ?>"><img src="<?php print $task2Src2 ?>"></a>
                <a href="<?php print $task2href ?>"><img src="<?php print $task2Src3 ?>"></a>
                <a href="<?php print $task2href ?>"><img src="<?php print $task2Src4 ?>"></a>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task myP">avarage earning poer 24 month's</p>
            <ul> my varriables:
                <li>Start money: <?php print $manoPinigai ?></li>
                <li>Spent per month: <?php print $spentPerMonth ?></li>
                <li>Earn per month: <?php print $earnedPerMonth ?></li>
                <li>Unknown spent per month: <?php print $unknownPerMonth ?></li>
                <li>months: <?php print $months ?></li>
            </ul>
            <div class="taskInside">
                result:<?php
                print $manoPinigai + (($earnedPerMonth - $spentPerMonth) * $months) - ($unknownPerMonth * $months)
                ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3.1</h2>
            <p class="task myP">avarage earning poer 24 month's<br>same, but with for loop</p>
            <ul> my varriables:
                <li>Start money: <?php print $manoPinigai ?></li>
                <li>Spent per month: <?php print $spentPerMonth ?></li>
                <li>Earn per month: <?php print $earnedPerMonth ?></li>
                <li>Unknown spent per month: php rand(100,300)</li>
                <li>months: <?php print $months ?></li>
            </ul>
            <div class="taskInside">
                <?php
                $result = 0;
                for ($x = 1; $x <= $months; $x++) {
                    $result = $earnedPerMonth - $spentPerMonth - rand(100, 300);
                }
                $result += $manoPinigai;
                print "result: $result <br>";
                ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task4">
            <h2 class="task  myH">task 4</h2>
            <p class="task myP">basic if function</p>
            <div class="taskInside">
                <img class="task4img" src="<?php print $oroimg?>">
                <p>
                    <?php print $oras ?>
                </p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div id="refresh" class="main task5">
            <h2 class="task  myH">task 5</h2>
            <p class="task myP">extra lygine/nelygine sec</p>
            <div class="taskInside taskInside5">
                <span><?php print $seconds ?></span> 
                <div class="zenklas-<?php print $zenklas ?>"></div>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task6">
            <h2 class="task  myH">task 6</h2>
            <p class="task myP">Null</p>
            <div class="taskInside">
                
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task6">
            <h2 class="task  myH">task 7</h2>
            <p class="task myP">Null</p>
            <div class="taskInside">
                
            </div>
        </div>






