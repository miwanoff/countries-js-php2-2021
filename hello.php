<?php
ob_start(); // Начало буфферизации
include "header.php";
include "action.php";
if (check_autirize()) && check_admin($_GET['login'])) {
    $admin = $_GET['login'];
    //if (check_log($admin) == true) {
    echo "<h3>Привет,  $admin!</h3>";
    echo "<p>Сводка погоды для всех стран на сегодня:<br/> холодно, снег</p>";
    // }
} else {
    header("Location: index.php");
    ob_end_flush(); // Конец буфферизации
}
include "footer.php";