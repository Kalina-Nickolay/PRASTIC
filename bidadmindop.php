	
<?php
	include ('db.php'); 
		$data = json_decode($_POST['jsonData']); 

		$id = $data->id;
		$ch = $data->ch;

		$check = $db->prepare("UPDATE request set admin_agree = :ch where id_stud=:id"); 
		$check -> execute(array(':ch'=>$ch,':id'=>$id)); 
		
		?>