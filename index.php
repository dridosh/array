<?php

/**
 * init array
 */
$city = [
    'Нью-Йорк'     => ['state' => null, 'population' => 8175133],
    'Лос-Анджелес' => ['state' => 'шт. Калифорния', 'population' => 3792621],
    'Чикаго'       => ['state' => 'шт. Иллинойс', 'population' => 2695598],
    'Хьюстон'      => ['state' => 'шт. Техас', 'population' => 2100263],
    'Филадельфия'  => ['state' => 'шт. Пенсильвания', 'population' => 1526006],
    'Феникс'       => ['state' => 'шт. Аризона', 'population' => 1445632],
    'Сан-Антонио'  => ['state' => 'шт. Техас', 'population' => 1327407],
    'Сан-Диего'    => ['state' => 'шт. Калифорния', 'population' => 1307402],
    'Даллас'       => ['state' => 'шт. Техас', 'population' => 1197816],
    'Сан-Хосе'     => ['state' => 'шт. Калифорния', 'population' => 945942],
];


/**
 * @param $arr array sity / state/ population
 * @param $title
 * @param $headCol1
 * @param $headCol2
 * @param $headCol3
 */
function drawArrayAsTable4Col($arr, $title, $headCol1, $headCol2, $headCol3){
    $table = "<table border=2>";
    $table .= "<caption> $title </caption>";
    $table .= "<th>  № п/п </th><th> $headCol1 </th><th> $headCol2 </th><th> $headCol3</th>";
    $total = 0;
    $i = 0;
    foreach ($arr as $key => $value) {
        $i++;
        $table .= "<tr>";
        $table .= "<td> $i </td><td> $key </td><td> {$value['state']} </td><td> {$value['population']} </td>";
        $table .= "</tr>";
        $total += $value['population'];
    };

    $table .= "<td colspan=3 style=text-align:right> ИТОГО: </td><td> $total </td>";
    $table .= '</table>';

    echo $table;

};


$title='Данные Бюро переписи населения США в 2010 году';
$headCol1='Город';
$headCol2='Штат';
$headCol3='Численность населения';

drawArrayAsTable4Col($city, $title, $headCol1, $headCol2, $headCol3);







/**
 * output - method 1
 */
//foreach ($city as $key => $value) {
//    echo $key . '=>' . implode(', ', $value) . '<br>';
//    echo $value['state'] . '<br>';
//    echo $value['population'] . '<br>';
//    echo '<br>';
//};
//
//echo '<hr>';
//
//
///**
// * output - method 2
// */
//foreach ($city as $key => $value) {
//
//    echo $key . '<br>';
//    echo array_values($value)[0] . '<br>';
//    echo array_values($value)[1] . '<br>';
//    echo '<br>';
//};
//echo '<hr>';
//
///**
// * output - method 3
// */









