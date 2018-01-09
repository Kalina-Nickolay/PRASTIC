	
<?php
	include ('db.php'); 
		$data = json_decode($_POST['jsonData']); 

		$id = $data->id;

		$check = $db->prepare("DELETE FROM request WHERE id_stud = :id"); 
		$check -> execute(array(':id'=>$id)); 
		
		?>