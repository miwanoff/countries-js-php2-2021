<?php
include "db.php";
function check_autorize($log)
{
    global $users;
    return array_key_exists($log, $users);
}