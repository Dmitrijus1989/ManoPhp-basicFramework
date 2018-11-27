<?php
$kiek_isgerei = rand(1, 5);
$barnio_riba = rand(1, 4);
if ($kiek_isgerei > $barnio_riba) {
    $per_daug = $kiek_isgerei - $barnio_riba;
} elseif ($kiek_isgerei < $barnio_riba) {
    $per_daug = $barnio_riba - $kiek_isgerei - 1;
} else {
    $per_daug = 0;
}

if ($barnio_riba <= $kiek_isgerei) {
    $ar_bar = "Zmona barsis, nes isgerei $per_daug bokalais per daug.";
    $bg = "neg";
} else {
    $ar_bar = "Zmona nesibars. Siandien galejai isgert dar $per_daug bakalus.";
    $bg = "pos";
}

if ($per_daug == 0 && $kiek_isgerei < $barnio_riba) {
    $ar_bar = "Zmona nesibars, bet tu buvai ant ribos ;)";
    $bg = "posrib";
} elseif ($per_daug == 0 && $kiek_isgerei >= $barnio_riba) {
    $ar_bar = "Zmona barsis, bet ne daug, todel kad esi ant barnio ribos ;)";
    $bg = "negrib";
}
//----------------------------------- Task 2 -----------------------------------
$task2_x = 10;
$task2_y = 2;
$task2_result = '';
//for ($j=0; $j<20; $j++) {
//    $task2_x += $task2_y;
//    $task2_result .= "dabartine \$task2_x verte: $task2_x <br>";
//    if ($task2_x > 20) {
//        break;
//    };
//}
for ($task2_x = 10; $task2_x < 20; $task2_x += $task2_y) {
    $task2_result .= "dabartine \$task2_x verte: $task2_x <br>";
}
$task2_result .= "ciklas sustojo";
//----------------------------------- Task 3 -----------------------------------
$months = 12;
$starting_money = 1000;
$alga = 700;
$total_money = $starting_money;
$visos_islaidos = 0;

for ($k = 1; $k <= $months; $k++) {
    $islaidos = rand(60000, 90000) / 100;
    $visos_islaidos += $islaidos;
    $total_money += $alga - $islaidos;
    $vid_islaidos = round($visos_islaidos / $k, 2);

    if ($total_money < 0) {
        $result = "Tau zopa, tu propisai visus pinigus! Tai atitiko $k menuo.Kodel?<br>"
                . "Nes duchas isleidai vidutiniskai $vid_islaidos per men.<br>";
        break;
    }

    $result = 'Liekana: $ ' . round($total_money, 2) . "<br> Vidutines islaidos: $vid_islaidos";
}
//----------------------------------- Task 4 -----------------------------------
$task4_result = date('F') . '<br>';
for ($l = 1; $l < 12; $l++) {
    $task4_result .= date('F', strtotime("+ $l month")) . '<br>';
}
//----------------------------------- Task 4 -----------------------------------
$beer_glass_divs = null;
for ($b = 1; $b <= 7; $b++) {
    $beer_glass_divs .= '<span>Cia yra ' . $b . ' bokalas</span> <img class="css-class-' . $b . '" src="https://mbtskoudsalg.com/images/transparent-beer-glass-png-4.png">';
}
?>


        <link rel="stylesheet" href="/templates/pages/tasks/day4/style.css">

    <body>
        <!----------------------------------------------------------------------------->
        <div class="main task1  bg-<?php print $bg ?>">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">Ar barsis tavo zmona?</p>
            <div class="taskInside">
                <p>
                    <?php
                    print "Kiek esi isgeres: $kiek_isgerei <br>"
                            . "Kokie sianden yra barnio riba: $barnio_riba<br><br>"
                            . $ar_bar
                    ?>
                </p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">For loop</p>
            <div class="taskInside">
                <p><?php print $task2_result ?></p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task myP">for per 12 month</p>
            <div class="taskInside">
                <p><?php print $result ?></p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task4">
            <h2 class="task  myH">task 4</h2>
            <p class="task myP">print months with for</p>
            <div class="taskInside">
                <p><?php print $task4_result ?></p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task5">
            <h2 class="task  myH">task 5</h2>
            <p class="task myP">Beer glass</p>
            <div class="taskInside">
                <form name="" action="" >
                    <input type="number" name="beer" id="" value=""><button>submit</button>
                </form>
                <?php

                if (isset($_GET['beer'])) {
                    $beer_glass_amount = $_GET['beer'];
                } else {
                    $beer_glass_amount = 0;
                }
                //$beer_glass_amount = $_GET['beer'] ?? 0; -- php 7.* way to do the same
                ?>
                <?php for ($bg = 1; $bg <= $beer_glass_amount; $bg++): ?>
                    <span>Cia yra <?php print $bg; ?> bokalas</span>
                    <div style="background-color: rgba(0, 0, 0, 0.<?php print $bg ?>); ">
                        <img style="filter: blur(<?php print $bg ?>px);" src="https://cdn.pixabay.com/photo/2016/09/14/11/36/beer-1669275__340.png" >
                    </div>
    <?php if (($bg % 10) == 0) : ?>
                        <img src="https://static.thenounproject.com/png/662544-200.png">
                        <?php break ?>
                    <?php elseif (($bg % 9) == 0) : ?>
                        <img src="https://static.thenounproject.com/png/637608-200.png">
                    <?php elseif (($bg % 2) == 0) : ?>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFN14Sf7X7ZmIs6SABGi6lGFe9yTcXySH3Nlb99_v3mZyFK0NkUg">
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->
        <div class="main task5">
            <h2 class="task  myH">task 5</h2>
            <p class="task myP">Beer glass</p>
            <div class="taskInside">
                <div class="css-class-1"></div>
            </div>
        </div>
