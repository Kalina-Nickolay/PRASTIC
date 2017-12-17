<?php
	session_start();
	include('../db.php');
	
	$stm = $db->prepare('INSERT INTO vacancy (id_pter, about, practic, start, finish, invalid, places, privet) VALUES (:id, :about, :practic, :start, :finish, :invalid, :places, :privet)');
	$stm -> execute(array('id' => $_SESSION['id'], ':about'=>$_POST['about'], ':practic' =>$_POST['practic'], ':start' => $_POST['start'], ':finish' => $_POST['finish'], ':invalid' => $_POST['invalid'], ':places' => $_POST['places'], ':privet' => $_POST['privet']));

	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancyPtero.php'></head></html>");
?>


