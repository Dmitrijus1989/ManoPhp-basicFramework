<?php

function add($x, $y) {
    $sum = $x + $y;
    return $sum;
}

;
$x = 10;
$z = 16;
$h = add($x, $z);

//--------------------------------Task 2----------------------------------------

function create_matrix() {
    $matrix = '';
    for ($i = 0; $i < 250; $i++) {
        for ($j = 0; $j < 250; $j++) {
            if (($j % 2) == 0) {
                $matrix .= '1';
            } else {
                $matrix .= '0';
            }
        }
        $matrix .= '<br>';
    }

    return $matrix;
}

$object = [
    'button_class' => '',
    'matrix' => false
];

$start = $_GET['matrix'] ?? 0;
if ($start === 'yes') {
    $object['matrix'] = create_matrix();
    $object['button_class'] = 'myStyle-leave-btn';
}
//--------------------------------Task 3----------------------------------------
$ansers_array = [
    'Visiskai taip',
    'taip',
    'galbut',
    'net',
    'ne negalvok!',
    'tiesiog beg',
    'fuck this shit!'
];

function magic_ball($array) {

    return $array[array_rand($array)];
}

//------------------------------Task 4 EKSTRA!----------------------------------
$test_array = [
    'Visiskai taip',
    'taip',
    [
        'name1' =>'test1',
        'name2' => 'test2',
        [
            'your bunny wrote',
            'oh no' => 'yes of course',
            [
                'your bunny wrote',
                'your bunny wrote',
                'fuck it',
                [
                    'enough already?',
                    'maybe no?',
                    [
                         'stop that already !!!!' => 'maybe now?',
                        
                        'stop it!',
                        [
                            'STOP!',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'galbut',
    'net',
    'ne negalvok!',
    'tiesiog beg',
    [
        'haha',
        123,
        true,
        [
            'yeeep',
            'yeaaa man!'
        ]
    ],
    'fuck this shit!'
];



function print_array($myArray) {
    $myReturn = '';
    foreach ($myArray as $key => $value) {
        if (!empty($myReturn)) {
            $myReturn .= ', <br>';
        }
        if (is_array($value)) {
            $myReturn .= $key. ': ';
            $myReturn .= print_array($value);

        } else {
            $myReturn .= "$key: $value";
        }
    }
    return $myReturn;
}
//---------------------------------Task 5 --------------------------------------
$def_array = [
    ['modelis' => 'Fiat Multipla', 'kaina' => 3000],
    ['modelis' => 'Ford Ka', 'kaina' => 2500],
    ['modelis' => 'BMW 320', 'kaina' => 4500],
    ['modelis' => 'Audi A4', 'kaina' => 3500],
];

function sell_cars($car_arr) {
    foreach ($car_arr as $key => $value) {
        
        $apsimokejo = null;
        $car_price30 = (30 / 100) * $car_arr[$key]['kaina'];    
        $car_arr[$key]['pardavimo kaina'] = $car_arr[$key]['kaina'] + rand(-$car_price30, $car_price30);
        if ($car_arr[$key]['pardavimo kaina'] > $car_arr[$key]['kaina']) {
            $apsimokejo = 'taip';
        } else {
            $apsimokejo = 'ne';
        }
        $car_arr[$key]['apsimokejo'] = $apsimokejo;
    }
    return $car_arr;
};

$tesssst = sell_cars($def_array)
?>



        <link rel="stylesheet" href="/templates/pages/tasks/day7/style.css">
 
    <body>
<!----------------------------------------------------------------------------->
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">function() sum</p>
            <div class="taskInside">
                <p>$x = 10 ; $z = 16</p>
                <p>sum = <?php print $h ?></p>
            </div>
        </div>
<!----------------------------------------------------------------------------->
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">Matrix</p>
            <div class="taskInside">
                <form action="#">
                    <input id="myInput" type="hidden" name="matrix" value="0">
                    <button onclick="valueChange()">enter</button>
                    <button id="leaveButton" class="leave-button <?php print $object['button_class'] ?>" onclick="valueChange2()">leave</button>
                </form>
                <?php if ($object['matrix']): ?>
                    <div style="background-color:black; color:green; position: absolute; z-index: 500;">
                        <?php print $object['matrix']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
<!----------------------------------------------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task myP"></p>
            <div class="taskInside">
                <?php print magic_ball($ansers_array) ?>
            </div>
        </div>
<!----------------------------------------------------------------------------->
        <div class="main task4">
            <h2 class="task  myH">task 4</h2>
            <p class="task myP"></p>
            <div class="taskInside">
                <?php  print print_array($test_array) ?>
            </div>
        </div>
<!----------------------------------------------------------------------------->
        <div class="main task5">
            <h2 class="task  myH">task 5</h2>
            <p class="task myP"></p>
            <div class="taskInside">
                <?php var_dump($tesssst); ?>
            </div>
        </div>
    </body>

