<?php
//DBの接続 
function getDb(): PDO
{
    $db = new PDO('mysql:dbname=youtube_promo;host=127.0.0.1;charset=utf8', 'root', '');
    return $db;
}
//htmlspecialcharsの省略
function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES);
}
