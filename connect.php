<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_pariwisata';

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) die('Database tidak terjangkau: ' . mysqli_connect_error());