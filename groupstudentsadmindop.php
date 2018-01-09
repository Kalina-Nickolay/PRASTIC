	
<?php
	include ('db.php'); 
		$data = json_decode($_POST['jsonData']); 

		$id = $data->id;

		$check = $db->prepare("UPDATE groups set admin = NULL where id_group=:id"); 
		$check -> execute(array(':id'=>$id)); 
		
		?>