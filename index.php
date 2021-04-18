<?php
include "header.php";
include "db.php";
include "action.php";
if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    if (check_autorize($login)) {
        echo "Hello  " . $login;
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Show secret info</a>";
        }
    } else {
        echo "Autorize error";
    }

}
$user_form = '<form action="index.php" method="post" name="autoForm">
Логин: <input type="text" name="login">
Пароль: <input type="password" name="pass">
<input type="submit" value="Подтвердить" name="go">
</form>';
echo $user_form;

$str_form_s = '<h3>Сортировать по:</h3>
<form action="index.php" method="post" name="sort_form">
<select name="sort" id="sort" size="1">
    <option value="name">названию</option>
    <option value="area">площади</option>
    <option value="population">среднему населению</option>
</select>
<input type="submit" name="submit" value="OK">
</form>';
echo $str_form_s;
include "footer.php";

if (isset($_POST['sort'])) {
    $how_to_sort = $_POST['sort'];
    sorting($how_to_sort);
}

$out = out_sort();

if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
}