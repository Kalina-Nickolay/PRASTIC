<?php
	session_start();
	
	include('../db.php'); //подключение к БД
	
	if (isset($_GET['search-button'])) {
		$query = trim($_GET['search']); // удаляем пробелы из начала и конца строки
		$query = preg_replace('/\s+/', ' ', $query); //заменяем двойные (и более) пробелы на одинарные
		$query = htmlspecialchars($query); 
		$query = substr($query, 0, 128);
		$query = mb_strtolower($query);

		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancy.php?search=".$query."'></head></html>");
	}
?>


