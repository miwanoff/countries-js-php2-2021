<?php
include "action.php";
if (isset($_GET['login']) && $_GET['login'] != "") {
    $admin = $_GET['login'];
    if (check_log($admin)) {
        include "header.php";
        echo "Hello, $admin";
        echo "<h2>Secret info</h2>";

        include "footer.php";
    }
} else {
    header("Location: index.php");
}