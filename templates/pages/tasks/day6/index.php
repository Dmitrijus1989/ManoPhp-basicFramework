<?php
$pavadinimas = '';
$kaina = null;
$aprasimas = '';
$nuolaida = null;
$catalog = [
    'Alus' => [
        'pavadinimas' => 'alus',
        'kaina' => 2.50,
        'aprasimas' => 'geras alus',
        
    ],
    'Vodka' => [
        'pavadinimas' => 'vodka',
        'kaina' => 9.50,
        'aprasimas' => 'gera vodka',
        'nuolaida' => null
        
    ],
    'Zuvis' => [
        'pavadinimas' => 'zuvis',
        'kaina' => 3.90,
        'aprasimas' => 'eatable',
        'nuolaida' => 3.50
    ],
];
//--------------------------------Task 2----------------------------------------
$moters_rankinukas = [];
$daliku_sk = rand(1, 20);
$name = ['kriemas', 'riesutai', 'veidrodelis', 'dildo', 'serveteles', 'zeptuvele', 'cigaretees', 'bananas']; // is viso 8 
$temp_size = null;
$size = null;
$temp_bright = null;
$bright = null;
$chance_to_find = null;
$total_chance_to_find = null;

for ($i = 0; $i <= $daliku_sk; $i++) {
    $x = rand(0, 7);
    $temp_size = rand(1, 10);
    $size += $temp_size;
    $temp_bright = rand(0, 1);
    if ($temp_bright === 1) {
        $bright = 'svesus';
    } else {
        $bright = 'tamsus';
    };

    $moters_rankinukas[] = ['name' => $name[$x], 'size' => $temp_size, 'bright' => $bright];
};
foreach($moters_rankinukas as $key => $value) {
    $chance_to_find = $value['size'] / $size;
        
    if ($value['bright'] == 'tamsus') {
        $chance_to_find /= 2;
    }
    $total_chance_to_find += $chance_to_find;
}
foreach($moters_rankinukas as $key => &$element) {
    $this_elem_chance = $element['size'] / $size;
    if ($element['bright'] == 'tamsus') {
        $this_elem_chance /= 2;
    }
    $element['chance'] = ($this_elem_chance*100)/$total_chance_to_find;
}

?>


       <link rel="stylesheet" href="/templates/pages/tasks/day6/style.css"> 

    <body>
        <!----------------------------------------------------------------------------->    
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">print array in array in to html</p>
            <div class="taskInside2">
                <?php foreach ($catalog as $key => $value) :?>
                <div class="produktas">
                    <?php foreach ($value as $key2 => $value2) :?>
                    <span class="<?php print $key2 ?>"> <?php  print $key2.": ".$value[$key2]?></span>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task2">
            <h2 class="task  myH">task 1.1 (5.3)</h2>
            <p class="task myP"></p>
            <div class="taskInside">
               <div class="taskInside2">
                <?php foreach ($catalog as $key => $value) :?>
                <div class="produktas">

                    <span class="pavadinimas">Pavadinimas: <?php  print $value['pavadinimas']?></span>
                    <span class="kaina">Kaina: <?php  print $value['kaina']?></span>
                    <span class="aprasimas">Aprasimas: <?php  print $value['aprasimas']?></span>
                    <?php if (isset($value['nuolaida'])) :?>
                    <span class="nuolaida">Nuolaida: <?php  print $value['nuolaida']?></span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div> 
            </div>
        </div>
        <!----------------------------------------------------------------------------->    
        <div class="main task3">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">$moters rankinukas turi:</p>
            <div class="taskInside">
               <?php foreach($moters_rankinukas as $key => $value) :?>
                <p>
                    <?php print $key+1 .': '.$value['name'].' uzima '.$value['size'].'cm<sup>3</sup>. Daiktas '.$value['bright'].'.'.
                           'Tikimybė rasti: '. round($value['chance'], 2).'%';
                    ?>
                    
                </p>
                    
                <?php endforeach;?>
            </div>
        </div>


