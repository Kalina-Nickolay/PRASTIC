<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$sender = $data->sender;
	$value = $data->value;

	switch ($sender) {
	case "group" :
		$stm = $db->prepare("SELECT course, speciality, studygroup FROM groups WHERE studygroup=?");
		$stm -> execute(array($value));
	    $res = $stm->fetch();
		break;
	case "course":
		$stm = $db->prepare("SELECT course, speciality, studygroup FROM groups WHERE course=?");
		$stm -> execute(array($value));
	    $res = $stm->fetch();
		break;
	case "speciality":
		$stm = $db->prepare("SELECT course, speciality, studygroup FROM groups WHERE speciality=?");
		$stm -> execute(array($value));
	    $res = $stm->fetch();
		break;
	}

	$jsonn=array( 
		'group'=> $res['group'], 
        'course'=> $res['course'],
        'speciality'=> $res['speciality'],               
    );
    echo json_encode($jsonn);
?>

