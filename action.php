<?php
include "db.php";
function check_autorize($log)
{
    global $users;
    return array_key_exists($log, $users);
}

function check_admin($log, $pass)
{
    global $users;
    return array_key_exists($log, $users) && $pass == $users['admin'];
}

function check_log($log)
{
    return $log == "admin";
}

function name($a, $b)
{
    if ($a['name'] < $b['name']) {
        return -1;
    } elseif ($a['name'] == $b['name']) {
        return 0;
    } else {
        return 1;
    }
}

function area($a, $b)
{
    if ($a['area'] < $b['area']) {
        return -1;
    } elseif ($a['area'] == $b['area']) {
        return 0;
    } else {
        return 1;
    }
}

function population($a, $b)
{ // функция, определяющая способ сортировки (по сумме населения за 2000 и за 2010 годы)
    if (array_sum($a["population"]) < array_sum($b["population"])) {
        return -1;
    } elseif ($a["population"]["2000"] + $a["population"]["2010"] == $b["population"]["2000"] + $b["population"]["2010"]) {
        return 0;
    } else {
        return 1;
    }
//array_sum($a["population"]) <=>  array_sum($b["population"])
}

function sorting($how_to_sort)
{
    global $countries;
    uasort($countries, $how_to_sort);
}

function out_sort()
{
    global $countries;
    $arr_out = [];
    // делаем переменную $countries глобальной
    $arr_out = array();
    $arr_out[] = "<table class='out' border='1'>";
    $arr_out[] = "<tr><td>№</td><td>Страна</td><td>Столица</td><td>Площадь</td><td>Население за 2000 год</td><td>Население за 2010 год</td><td>Среднее население</td></tr>";
    foreach ($countries as $country) {
        $i = 1;
        //статическая глобальная переменная-счетчик
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($country as $value) {
            if (!is_array($value)) {
                $str .= "<td>$value</td>";
            } else {
                foreach ($value as $p) {
                    $str .= "<td>$p</td>";
                }

            }

        }
        $str .= "<td>" . (array_sum($country['population']) / count($country['population'])) . "</td>";
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table>";

    return $arr_out;
}