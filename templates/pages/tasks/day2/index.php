<?php date_default_timezone_set('Europe/Vilnius'); ?> <!--Lietuvos time line-->
        <link rel="stylesheet" href="/templates/pages/tasks/day2/style.css">
    <body>
        <!--        ------------------------task 1--------------------------------------->
        <!--pirmas mano PHP pratimas-->
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">basic print, date()</p>
            <h3>
                <b>Dmitrijus</b> - HTML <?php print 'ir PHP' ?> asas jau nuo 
                <?php print date('Y, m, d'); ?>
            </h3>
            <p>
                Viskas prasidejo <?php print date('F') . ' menesio,' . date('d') . ' diena!' ?>
            </p>
        </div>
        <!--        ------------------------task 2--------------------------------------->
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task  myP">date() su strtotime() keitimais</p>
            <h3>PHP lydes ir <?php print date('Y, m, d', strtotime('+ 1 day')) ?></h3>
            <h3>
                Dmitrijus - PHP su manim buvo ir <?php print date('H:i', strtotime('- 1 hour')) ?>
            </h3>
            <p><?php print date('Y, m, d', strtotime('+ 1 year')) ?> ne uz kalnu!</p>
        </div>
        <!--        ------------------------task 3--------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task  myP">date() su strtotime ir rand()</p>
            <h3>
                PHP lydes ir <?php print date('Y, m, d', strtotime('+' . rand(1, 10) . ' years')) ?>
            </h3>
            <h3>
                Dmitrijus - Galbut turesiu <?php print rand(1, 5) ?> vaikus
            </h3>
            <p>
                D. Trump'as nebebus prezidentu <?php print date('Y, m, d', strtotime('2021-' . date('m-d') . ' +' . rand(1, 10) . ' years')) ?>, 
            </p>
        </div>
        <!--        ------------------------task 4--------------------------------------->
        <div class="main task4" style="background-color:rgba(<?php print rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255); ?>, 0.7)">
            <h2 class="task myH">task 4</h2>
            <p class="task  myP"> hardcoded rand() style</p>
            <h3 style="font-size:<?php print rand(6, 36); ?>px">
                As keiciu savo dydi!
            </h3>
            <p style="color:rgb(<?php print rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255); ?>)">
                As keiciu savo spalva!
            </p>
        </div>
        <!--        ------------------------task 5--------------------------------------->
        <div id="refresh" class="main task5">
            <h2 class="task myH">task 5</h2>
            <p class="task  myP"> sokantis kvadratas</p>
            <div class='mySquare' style="top:<?php print rand(0, 227) ?>px; right:<?php print rand(0, 377) ?>px;"></div>
        </div>
        <!--        ------------------------task 6--------------------------------------->
        <div class="main task6">
            <h2 class="task myH">task 6</h2>
            <p class="task  myP">Changing classes with PHP</p>
            <p class="myClass<?php print rand(1,3) ?>">Class-1</p>
            <p class="myClass<?php print rand(1,3) ?>">Class-2</p>
            <p class="myClass<?php print rand(1,3) ?>">Class-3</p>
        </div>
        <!--        ------------------------task 7--------------------------------------->
        <div class="main task7">
            <h2 class="task myH">task 7</h2>
            <p class="task  myP">Changing bg image PHP</p>
            <div class="inside-wrapper myDice<?php print rand(1,6) ?>"> 
            </div>    
        </div>
        <!--        ------------------------task 8--------------------------------------->
        <div class="main task8">
            <h2 class="task myH">task 8</h2>
            <p class="task  myP">strpos() with rand()</p>
            <p class="musuSkDef musuSk<?php print strpos(rand(1,6), '1') ?>">Laimingas skaicius</p>
        </div>
        <!--        ------------------------task 9--------------------------------------->
        <div id="refresh2" class="main task9">
            <h2 class="task myH">task 9</h2>
            <p class="task  myP">bomb!</p>
            <div class="myBomb myBombBlow<?php print date('s') ?>" data-blow="Terrorist win!" style="transform: scale(1.<?php print date("s")?>);"></div>
            <div class="myBombSec"><?php print date('s') ?></div>
        </div> 



