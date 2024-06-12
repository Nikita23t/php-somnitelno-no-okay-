<?php
session_start();
if (!isset($_SESSION["login_time"])) {
    $_SESSION["login_time"] = time();
}

$current_time = time();
$time_difference = $current_time - $_SESSION["login_time"];
echo "Вы зашли на сайт $time_difference секунд назад.";
?>
