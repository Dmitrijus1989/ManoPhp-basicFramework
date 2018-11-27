<?php
$fridge = [
    'Jogurtas', 'Kebabas', 'Alus', 'Sugedę vaisiai', 'Supuvęs avokadas',
];
$fridge2 = [
    'Jogurtas', 'Kebabas', 'Alus', 'Sugedę vaisiai', 'Supuvęs avokadas',
];
$my_fridge = '';
 $my_fridge1 = '';
foreach ($fridge as $key => $value) {
    $my_fridge1 .= $key+1 . ": $value<br>";
}
$task1_print = '';
for ($i = 0; $i < count($fridge); $i++) {
    $task1_print .= $i + 1 . ". " . $fridge[$i] . " <br>";
}
//--------------------------------- task 2 -------------------------------------
$task2_print = '';
foreach ($fridge as $nr => $value) {
    $task2_print .= $nr + 1 . ". " . $value . " <br>";
}
//--------------------------------- task 3 -------------------------------------
$task3_array = [
    'kebabas' => 2.50,
    'alus' => 1.89,
    'burokai' => 1.50,
];
$product_keys = array_keys($task3_array);
$rand_prod_key_idx = rand(0, count($product_keys) - 1);
$rand_prod_key = $product_keys[$rand_prod_key_idx];
$rand_prod_price = $task3_array[$rand_prod_key];
$task3_print = $rand_prod_key . ': ' . $rand_prod_price;
//--------------------------------- task 4 -------------------------------------
$noriu = ['Kebabas', 'Alus', 'Pica'];
$task4_print = '';
$task5_removed = '';
foreach ($noriu as $value) {
    if (in_array($value, $fridge)) {
        $task4_print .= "$value: turiu<br>";
        remove_from_fridge($value, $fridge, $task5_removed);
    } else {
        $task4_print .= "$value: neturiu<br>";
        $task5_removed .= "<br>$value not finded;";
    }
}

//--------------------------------- task 5 -------------------------------------
function remove_from_fridge($rastas_produktas, &$saldituvas, &$atsakimas) {
    foreach ($saldituvas as $key => $productas) {
        if ($rastas_produktas == $productas) {
            $atsakimas .= "$productas removed; ";
            unset($saldituvas[$key]);
        }
    }
}
foreach ($fridge as $key => $value) {
    $my_fridge .= $key+1 . ": $value<br>";
}
//--------------------------------- task 5.1 -----------------------------------
$task51_print = '';
foreach ($fridge2 as $key => $value) {
    if (in_array($value, $noriu)) {
        unset($fridge2[$key]);
        $task51_print .= "$value removed; ";
    }
}
$my_fridge2 = '';
foreach ($fridge2 as $key => $value) {
    $my_fridge2 .= $key+1 . ": $value<br>";
}
//--------------------------------- task 6 -------------------------------------
$special_produktai = [
    [
        'kaina' => 3.50,
        'pavadinimas' => 'Kebabas',
        'pardotuvese' => ['Kaunas', 'Vilnius', 'Klaipeda']
        ],
    [
        'kaina' => 2.10,
        'pavadinimas' => 'Alus',
        'pardotuvese' => ['Vilnius', 'Klaipeda', 'Palanga']
    ]
];
// $special_produktai[1]['pavadinimas'] = 'Alus'
?>

        <link rel="stylesheet" href="/templates/pages/tasks/day5/style.css"> 

    <body>
        <!----------------------------------------------------------------------------->    
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">array[] for print</p>
            <div class="taskInside">
                <p> <?php print $task1_print ?></p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">array[] foreach() print</p>
            <div class="taskInside">
                <p> <?php print $task2_print ?></p>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task myP">print $key //array inder and $value // array value</p>
            <div class="taskInside">
                <?php print $task3_print ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task4">
            <h2 class="task  myH">task 4</h2>
            <p class="task myP">in_array() with foreach()</p>
            <div class="taskInside">
                <?php print $my_fridge1 ?>
                <br>
                <?php print $task4_print ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task5">
            <h2 class="task  myH">task 5</h2>
            <p class="task myP">remove from the fridge founded products</p>
            <div class="taskInside">
                <?php print $task5_removed ?><br>
                <br>
                <?php print $my_fridge ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task5">
            <h2 class="task  myH">task 5.1</h2>
            <p class="task myP">remove from the fridge2 founded products</p>
            <div class="taskInside">
               <?php print $task51_print ?><br>
                <br>
                <?php print $my_fridge2 ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task5">
            <h2 class="task  myH">task 6</h2>
            <p class="task myP">var_dump defined array</p>
            <div class="taskInside">
               <?php var_dump ($special_produktai) ?>
            </div>
        </div>
