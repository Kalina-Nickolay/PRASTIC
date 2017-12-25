<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$id_vac = $data->id_vac;
	$id_stud = $data->id_stud;
	$sender = $data->sender;

	$stm = $db->prepare("INSERT INTO request (id_vac, id_stud, stud_agree, pter_agree, admin_agree, sender) VALUES (:vac, :stud, :stud_agree, :pter_agree, :admin_agree, :sender)");

	switch ($sender) {
    case "student":
		$stm -> execute(array(':vac'=>$id_vac, ':stud'=>$id_stud, ':stud_agree'=>0, ':pter_agree'=>0, ':admin_agree'=>0, ':sender'=>$sender));
        break;
    case "pterodactyl":
        //
        break;
    /*case "admin":
        //
        break;
    */
	}
?>

