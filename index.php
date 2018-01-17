<?include('search.php');?>

<body>
	<!--Поисковая строка+название+кнопка входа-->
	
	<!--Меню-->
	<?php include('menu.php');?>
	

<?php

if(isset($_POST['reg']))
	{
		$role=$_POST['role'];
		$last_name =$_POST['last_name'];
		$first_name = $_POST['first_name'];
		$father_name = $_POST['father_name'];
		$number_telephone = $_POST['number_telephone'];
		$Email = $_POST['Email'];
		$login = $_POST['login'];
		$new_password = $_POST['new_password']; ;
		$double_new_password =$_POST['double_new_password'];
		
		$last_password=md5($new_password);
	
		$sql="INSERT INTO person (lastname, name, fathername, username, password, email, telephone) 
		VALUES ('$last_name', '$first_name', '$father_name', '$login', '$last_password', '$Email','$number_telephone')";
		$stmt = $db->query($sql);
		
		if($role=='pterodactyl')
		{
			$name_company =$_POST['name_company'];
			$address =$_POST['address'];
			$sphere =$_POST['sphere'];
			$about =$_POST['about'];
			$contract =$_FILES['contract_url']['name'];
			if ($contract)
			{
				$iscontract = 1;
			}
			else
			{
				$iscontract = 0;
			}
			
			$sql = "INSERT INTO pterodactyl (id,name,address,sphere,about, iscontract,contract) VALUES ('$id', '$name_company','$address','$sphere','$about','$iscontract','$contract')";
				
			$stmt = $db->prepare($sql);
			$stmt->execute();
			
			$upload_path = './files/contract/'; // Директория на сервере, в которую жахнем картинку
		
			move_uploaded_file($_FILES['contract_url']['tmp_name'], $upload_path . basename($_FILES['contract_url']['name'])); // Перемещаем файл в желаемую директорию
			echo
	'
		<div class="row">
				<div class="large-12 medium-12 cell content-error">Регистрация завершена. Логин и пароль высланы на почту</div>
				</div>
	';
		}
		else
		if($role=='student')
		{
			
			$birthdate =$_POST['birthdate'];
			$studygroup =$_POST['studygroup'];
			$invalid =$_POST['invalid'];
			
			$sql="SELECT id_group FROM groups WHERE studygroup = '$studygroup'";
			$stmt = $db->query($sql);
			$stmt->execute();
			
			$row = $stmt->fetch();
			$id_group=$row['id_group'];
			
			$sql="SELECT id_person FROM person WHERE username = '$login'";
			$stmt = $db->query($sql);
			$stmt->execute();
			
			$row = $stmt->fetch();
			$id=$row['id_person'];
			
			
			$sql = "INSERT INTO student (id,studygroup,birthdate,invalid) VALUES ('$id', '$id_group', '$birthdate', '$invalid')";
				
			$stmt = $db->prepare($sql );
			$stmt->execute();
				
			//$message = "Вы зарегистрировались на сайте поиска практик ДВФУ \r\n Ваш логин: " . $login . "\r\n Ваш пароль: " . $new_password ."\r\n Войдите по ссылке index.php";
			//mail(''.$Email.'', 'RE: Регистрация на сайте поиска практик ДВФУ', $message);
			
			echo
	'
				<div class="row">
						<div class="large-12 medium-12 cell content-error">Регистрация завершена. Логин и пароль высланы на почту</div>
						</div>
			';
		}
	}
	
?>	
</body>	





	