<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$pter_agree = $data->pter_agree;
	$id_vac = $data->id_vac;
	$id_stud = $data->id_stud;

	$stm = $db->prepare("UPDATE request SET pter_agree=? WHERE id_vac=? AND id_stud=?");
	$stm -> execute(array($pter_agree, $id_vac, $id_stud));

