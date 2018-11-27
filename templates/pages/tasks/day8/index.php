<?php
$myDistance = $_POST['distance'] ?? null;
$myFuelConsumed = $_POST['fuelConsumed'] ?? null;
$fuelPrice = 1.19;

function priceOfDistance($distance, $fuelCon) {
    if ($distance == null || $fuelCon == null) {
        return false;
    } else {
        $_1kmFuelCon = $fuelCon / 100;
        $allDistanceFuelCon = $distance * $_1kmFuelCon;
        return $allDistanceFuelCon * 1.19;
    }
}

$output = round(priceOfDistance($myDistance, $myFuelConsumed), 2);
//------------------------------------------------------------------------------
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
function cookie_read($cookie_name) {
    if (isset($_COOKIE[$cookie_name])) {
        return json_decode($_COOKIE[$cookie_name], true); // with "true" json_decode will return normal array. else way he will return objectg.
    }
    return [];
}
function cookie_write($cookie_name, $data ) {
    setcookie($cookie_name, json_encode($data), time() + 36000);
}
$answer_task2 = null;
$question = $_POST['question'] ?? false;
if ($question) {
    $data_cookie = cookie_read('data_track');
    if (isset($data_cookie[$question])) {
        $answer_task2 = $question . ' <br>' . $data_cookie[$question];
    } else {
        $temp_answer = magic_ball($ansers_array);
        $answer_task2 = $question . ' <br>' . $temp_answer;
        $data_cookie[$question] = $temp_answer;
        cookie_write('data_track', $data_cookie);
    }
}



//------------------------------------------------------------------------------

$tusinam = [
    'kiek' => $_POST['kiek'] ?? null,
    'prom' => $_POST['prom'] ?? null,
    'svoris' => $_POST['svoris'] ?? null,
    'gender' => $_POST['gender'] ?? null
];

function checkArray($array) {
    foreach ($array as $value) {
        if ($value == null) {
            return false;
        }
    }
    return true;
}

function bac($myArray) {

    $myArray['prom'] = $myArray['prom'] / 100;
    $myArray['prom'] = round($myArray['prom'], 4);
    $alcInGramp = (($myArray['kiek'] * $myArray['prom']) / 1000) * 0.7851;
    $alcInGramp = round($alcInGramp, 4);

    if ($myArray['gender'] == 'male') {
        $gen = 0.68;
        $genHour = 0.15;
    } elseif ($myArray['gender'] == 'female') {
        $gen = 0.55;
        $genHour = 0.10;
    }

    $bodyWeightInGrams = $myArray['svoris'] * 2.205;
    $bodyWeightInGrams = round($bodyWeightInGrams, 4);
    $promiles = ($alcInGramp / ($bodyWeightInGrams * $gen)) * 100;
    $promiles = round($promiles, 4) * 10;
    $hoursCount = 0;

    $data = [
        'promiles' => $promiles,
        'hours' => [
            'galiu_vairuot' => null,
            'blaivas' => null,
        ]
    ];

    while ($promiles > 0) {

        if ($promiles < 0.4 && $data['hours']['galiu_vairuot'] === null) {
            $data['hours']['galiu_vairuot'] = $hoursCount;
        }

        $hoursCount++;
        $promiles -= $genHour;
    }

    $data['hours']['blaivas'] = $hoursCount;

    return $data;
}

function form_bac_text($bac) {
    return strtr(
            "Tu turesi @promiles promiliu <br> Reikia @hours_4 valandu iki 0,4 ir @hours_0 iki 0", [
        '@promiles' => $bac['promiles'],
        '@hours_4' => $bac['hours']['galiu_vairuot'],
        '@hours_0' => $bac['hours']['blaivas']
            ]
    );
}

$answer_task3 = (checkArray($tusinam) ? form_bac_text(bac($tusinam)) : null);


// 61200
?>

        <link rel="stylesheet" href="/templates/pages/tasks/day8/style.css">


        <!--------------------------------------------------------------------->
        <div class="main task1">
            <h2 class="task  myH">task 1</h2>
            <p class="task myP">form and post</p>
            <div class="taskInside">
                <form method="post">
                    <div>Distance:<input name="distance"></div>
                    <div>Your car fuel consumtion:<input name="fuelConsumed"></div>
                    <button class="task1-button" type="submit">Submit</button>
                </form>
                <p> you will spend <?php print $output ?><i class="fas fa-euro-sign"></i> </p>
            </div>
        </div>
        <!--------------------------------------------------------------------->
        <div class="main task2">
            <h2 class="task  myH">task 2</h2>
            <p class="task myP">magic ball</p>
            <div class="taskInside">
                <form method="post">
                    <div>your question: <input name="question"></div>
                    <button class="task1-button" type="submit">Submit</button>
                </form>
                <div class="magic-ball"><p><?php print $answer_task2; ?></p></div>
            </div>
        </div>
        <!--------------------------------------------------------------------->
        <div class="main task3">
            <h2 class="task  myH">task 3</h2>
            <p class="task myP">alcotester</p>
            <div class="taskInside">
                <form method="post">
                    <div>Kiek isgerei in ml: <input type="number" name="kiek"></div>
                    <div>ant kiek stiptus alkogolis: <input type="number" name="prom"></div>
                    <div>Kiek tu svieri in kg: <input type="number" name="svoris"></div>
                    <div> male: <input type="radio" value="male" name="gender"> female: <input type="radio" value="female" name="gender"></div>
                    <button class="task1-button" type="submit">Submit</button>
                </form>
<?php if ($answer_task3): ?>
                    <div class=""><p><?php print $answer_task3; ?></p></div>
<?php endif; ?>
            </div>
        </div>
