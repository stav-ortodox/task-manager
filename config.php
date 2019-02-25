<?php 
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DB", "catalog");

$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");
mysqli_set_charset($connection, "utf8") or die("Не установлена кодировка соединения");

// функция для utf-8, более лаконичный вариант предыдущей функции
function ucfirst_utf8($str)
{
    return mb_substr(mb_strtoupper($str, 'utf-8'), 0, 1, 'utf-8') . mb_substr($str, 1, mb_strlen($str)-1, 'utf-8');
}