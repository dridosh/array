<?php
//Упражнения
//
//1.1 Определите один массив (или ряд массивов), хранящий местоположение и население перечисленных
//выше городов.

$cities = [
    ['city' => 'Нью-Йорк', 'state' => null, 'population' => 8175133],
    ['city' => 'Лос-Анджелес', 'state' => 'шт. Калифорния', 'population' => 3792621],
    ['city' => 'Чикаго', 'state' => 'шт. Иллинойс', 'population' => 2695598],
    ['city' => 'Хьюстон', 'state' => 'шт. Техас', 'population' => 2100263],
    ['city' => 'Филадельфия', 'state' => 'шт. Пенсильвания', 'population' => 1526006],
    ['city' => 'Феникс', 'state' => 'шт. Аризона', 'population' => 1445632],
    ['city' => 'Сан-Антонио', 'state' => 'шт. Техас', 'population' => 1327407],
    ['city' => 'Сан-Диего', 'state' => 'шт. Калифорния', 'population' => 1307402],
    ['city' => 'Даллас', 'state' => 'шт. Техас', 'population' => 1197816],
    ['city' => 'Сан-Хосе', 'state' => 'шт. Калифорния', 'population' => 945942],
];


//1.2 Выведите на экран таблицу со сведениями о местоположении и населении, а также общее
//население всех десяти городов.

/**
 * @param $arr 'array city / state/ population
 * @param $title 'table title
 * @param $headCol1 'header column1
 * @param $headCol2 'header column1
 * @param $headCol3 'header column1
 */
function drawArrayAsTable4Col ($arr, $title, $headCol1, $headCol2, $headCol3) {
    $table = "<table border=2>";
    $table .= "<caption> $title </caption>";
    $table .= "<th>  № п/п </th><th> $headCol1 </th><th> $headCol2 </th><th> $headCol3</th>";
    $total = 0;
    $i = 0;

    foreach ($arr as $value) {
        $i++;
        $table .= "<tr>";
        $table .= "<td> $i </td><td> {$value['city']}</td><td> {$value['state']} </td><td> {$value['population']} </td>";
        $table .= "</tr>";
        $total += $value['population'];
    }

    $table .= "<td colspan=3 style=text-align:right> ИТОГО: </td><td> $total </td>";
    $table .= '</table>';

    echo $table;
}


$title = 'Данные Бюро переписи населения США в 2010 году';
$headCol1 = 'Город';
$headCol2 = 'Штат';
$headCol3 = 'Численность населения';
drawArrayAsTable4Col($cities, $title, $headCol1, $headCol2, $headCol3);
echo "<br><br><br><br>";


//2. Видоизмените выполнение задания в предыдущем упражнении таким образом, чтобы строки в
//результирующей таблице были упорядочены сначала по населению, а затем по названиям городов.

$title = 'Данные Бюро переписи населения США в 2010 году отсортированые по численности';

usort($cities, function ($a, $b) {
    return $a ['population'] <=> $b ['population'];
});

drawArrayAsTable4Col($cities, $title, $headCol1, $headCol2, $headCol3);
echo "<br><br><br><br>";


$title = 'Данные Бюро переписи населения США в 2010 году отсортированые по городу';

usort($cities, function ($a, $b) {
    return $a['city'] <=> $b['city'];
});

drawArrayAsTable4Col($cities, $title, $headCol1, $headCol2, $headCol3);
echo "<br><br><br><br>";


$title = 'Данные переписи населения США  отсортированые по численности, а затем по городу';

//fake data for check algorithm
$cities[5]['population'] = 1000000;
$cities[7]['population'] = 1000000;
$cities[9]['population'] = 1000000;

usort($cities, function ($a, $b) {
    if ($a ['population'] === $b ['population']) {
        if ($a ['city'] === $b ['city']) {
            return 0;
        } else {
            return ($a ['city'] < $b ['city']) ? -1 : 1;
        }
    }
    return ($a ['population'] < $b ['population']) ? -1 : 1;
});


drawArrayAsTable4Col($cities, $title, $headCol1, $headCol2, $headCol3);
echo "<br><br><br><br>";


//3. Видоизмените выполнение задания в первом упражнении таким образом, чтобы таблица содержала
//также строки с общим населением каждого штата, упомянутого в перечне самых крупных городов США.

// restore array
$cities = [
    ['city' => 'Нью-Йорк', 'state' => null, 'population' => 8175133],
    ['city' => 'Лос-Анджелес', 'state' => 'шт. Калифорния', 'population' => 3792621],
    ['city' => 'Чикаго', 'state' => 'шт. Иллинойс', 'population' => 2695598],
    ['city' => 'Хьюстон', 'state' => 'шт. Техас', 'population' => 2100263],
    ['city' => 'Филадельфия', 'state' => 'шт. Пенсильвания', 'population' => 1526006],
    ['city' => 'Феникс', 'state' => 'шт. Аризона', 'population' => 1445632],
    ['city' => 'Сан-Антонио', 'state' => 'шт. Техас', 'population' => 1327407],
    ['city' => 'Сан-Диего', 'state' => 'шт. Калифорния', 'population' => 1307402],
    ['city' => 'Даллас', 'state' => 'шт. Техас', 'population' => 1197816],
    ['city' => 'Сан-Хосе', 'state' => 'шт. Калифорния', 'population' => 945942],
];

$title = 'Данные Бюро переписи населения США в 2010 году с общим населением каждого штата';
//Вывод с суммой по каждому штату

$table = "<table border=2>";
$table .= "<caption> $title </caption>";
$table .= "<th>  № п/п </th><th> $headCol1 </th><th> $headCol2 </th><th> $headCol3</th>";
$totalForState = 0;
$i = 0;

foreach ($cities as $key => $value) {
    $i++;
    $table .= "<tr>";
    $table .= "<td> $i </td><td> {$value['city']}</td><td> {$value['state']} </td><td> {$value['population']} </td>";
    $table .= "</tr>";
}

$stateName = '';

for ($i = 0; $i < count($cities); ++$i) {
    $stateName = $cities[$i]['state'];
    $next = false;
    for ($j = $i + 1; $j < count($cities); ++$j) {
        if ($cities[$j]['state'] === $stateName) {
            $next = true;
            break;
        }
    }
    if ($next) {
        continue;
    }

    $populationState = 0;
    foreach ($cities as $key => $value) {
        if ($value['state'] === $stateName) {
            $populationState += $value['population'];
        }
    }
    $table .= "<tr>";
    $table .= "<td colspan=3 style=text-align:right> $stateName</td><td> $populationState</td>";
    $table .= "</tr>";
}

$table .= '</table>';

echo $table;







// usort($cities, 'city_cmp');


//drawArrayAsTable4Col($city, $title, $headCol1, $headCol2, $headCol3);


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

///**
// * output - method 3
// */
//
//echo "<pre>";
//foreach ($cities as $cityName => $cityProperty) {
//    echo "$cityName: &nbsp(";
//    foreach ($cityProperty as $key => $value) {
//        echo "$key:&nbsp $value:&nbsp";
//    }
//    echo ")<br>";
//}





