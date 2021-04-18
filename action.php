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