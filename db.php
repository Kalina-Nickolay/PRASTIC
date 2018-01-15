<?php
//Подключение к базе данных
	$host = 'localhost';
    $db   = 'practice_DATABASE';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
	
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_FOUND_ROWS => true,
    ];
    $db = new PDO($dsn, $user, $pass, $opt);
?>

