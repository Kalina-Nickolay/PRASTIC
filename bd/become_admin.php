<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$id_group = $data->id_group;
	$id_admin = $data->id_admin;

	$stm = $db->prepare("UPDATE groups SET admin=? WHERE id_group=?");
	$stm -> execute(array($id_admin, $id_group));


?>

