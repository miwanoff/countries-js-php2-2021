<?php
include "header.php";
include "db.php";
include "action.php";
if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    if (check_user($login, $password)) {
        echo "Hello  " . $login;
        if (check_admin($login)) {
            echo "<a href='hello.php?login=$login'>Show secret info</a>";
        }
    } else {
        echo "Autorize error";
    }

}
$cont_start_12 = '<div class="container">
<div class="row">
    <div class="col-12">';
$cont_start_row = '<div class="container">
    <div class="row">';

$cont_start_8 = '<div class="col-8">';
$cont_start_4 = '<div class="col-4">';
$cont_end = ' </div>
    </div>
</div>';
echo $cont_start_12;
$user_form = '<form action="index.php" method="post" name="autoForm">
Логин: <input type="text" name="login">
Пароль: <input type="password" name="pass">
<input type="submit" value="Подтвердить" name="go">
</form>';
echo $user_form;

echo $cont_end;
echo $cont_start_row;
echo $cont_start_4;
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
echo "</div>";

if (isset($_POST['sort'])) {
    $how_to_sort = $_POST['sort'];
    sorting($how_to_sort);
}

$out = out_sort();

if (count($out) > 0) {
    echo $cont_start_8;
    foreach ($out as $row) {
        echo $row;
    }
    echo $cont_end;
}

$str_form_search = "<h3>Поиск:</h3>
			<form  name='searchForm' action='index.php' method='post' onSubmit='return overify_login(this);' >
 			 <input type='text' name='search'>
 			 <input type='submit' name='gosearch' value='Подтвердить'>
 			 <input type='submit' name='clear' value='Сбросить'>
 		     </form>";

echo $str_form_search;
if (isset($_POST['gosearch'])) {
    $data = test_input($_POST['search']);
    $out = out_search($data);
}
if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
}
include "footer.php";