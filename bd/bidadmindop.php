	
<?php
	include ('db.php'); 
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$admin_agree = $data->admin_agree;
	$id_vac = $data->id_vac;
	$id_stud = $data->id_stud;

	$stm = $db->prepare("UPDATE request SET admin_agree=? WHERE id_vac=? AND id_stud=?");
	$stm -> execute(array($admin_agree, $id_vac, $id_stud)); 
	
?>