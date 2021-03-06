<?php
	session_start();
	include('../db.php');
	

	if (is_uploaded_file($_FILES['logo_url']['tmp_name'])) {

		$uploaddir = '../files/logo/'.$_SESSION['id'].'/';

		if (!file_exists($uploaddir)) {
			mkdir($uploaddir, 0700, true);
		} 

		$uploadfile = $uploaddir.basename($_FILES['logo_url']['name']);
		copy($_FILES['logo_url']['tmp_name'], $uploadfile);
		$stm = $db->prepare('UPDATE vacancy SET logo=:logo WHERE id_vac=:id_vac');
		$stm -> execute(array(':logo'=>$_FILES['logo_url']['name'], ':id_vac'=>$_POST['id_vac']));
	}
	

	$stm = $db->prepare('UPDATE vacancy SET about=:about, practic=:practic, start=:start, finish=:finish, invalid=:invalid, places=:places, privet=:privet WHERE id_vac=:id_vac');
	$stm -> execute(array(':about'=>$_POST['about'], ':practic' =>$_POST['practic'], ':start' => $_POST['start'], ':finish' => $_POST['finish'], ':invalid' => $_POST['invalid'], ':places' => $_POST['places'], ':privet' => $_POST['privet'], ':id_vac'=>$_POST['id_vac']));

	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancyPtero.php'></head></html>");
?>


