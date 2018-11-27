<?php

$page['title'] = 'alcotester!';

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
$page['content']['alcotester'] = $answer_task3;
$page['content']['rendered'] = render_page($page, 'page-alcotester');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

