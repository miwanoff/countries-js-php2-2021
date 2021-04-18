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
            echo "<a href='hello.php'>Show secret info</a>";
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
include "footer.php";