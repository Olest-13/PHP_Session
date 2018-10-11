<?php
$user="olest";
$pass="olest";
$host="localhost";
$db="laba1_db";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//else echo "connect is OK";
