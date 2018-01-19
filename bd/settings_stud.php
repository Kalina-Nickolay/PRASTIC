<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$sender = $data->sender;
	$value = $data->value;

	if ($sender=="group") {
		$stm = $db->prepare("SELECT course, speciality FROM groups WHERE studygroup=?");
		$stm -> execute(array($group));
	    $res = $stm->fetch();
	}




	

	$jsonn=array( 
		'group'=>  
        'course'=>$res['course'],
        'speciality'=>$res['speciality'],               
    );
    echo json_encode($jsonn);
?>

