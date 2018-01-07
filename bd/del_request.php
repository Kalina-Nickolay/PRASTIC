<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$arr = $data->arr;

	$stm = $db->prepare("DELETE FROM request WHERE id_vac=? AND id_stud=?");

	foreach ($arr as $value) {
		$id_req = explode("!", $value); // vac=0 // stud=1
		$stm -> execute(array($id_req[0], $id_req[1]));
	}


?>

