<?include('search.php');?>
<head>
  <link rel="icon" href="http://www.templatemonster.com/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles_slider.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.glide.min.js"></script>
</head>
<body>
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
				$id = $db->lastInsertId();
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
				
				$sql = "INSERT INTO pterodactyl (id,name,address,sphere,about, iscontract,contract) VALUES (:id, :name_company,:address,:sphere,:about,:iscontract,:contract)";
					
				$stmt = $db->prepare($sql);
				$stmt->execute(array(':id'=>$id, ':name_company'=>$name_company, ':address'=>$address, ':sphere'=>$sphere, ':about'=>$about, ':iscontract'=>$iscontract, ':contract'=>$contract));
				
				$upload_path = './files/contract/'; // Директория на сервере, в которую жахнем файл
			
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
					
				
				
				echo
				'
					<div class="row">
							<div class="large-12 medium-12 cell content-error">Регистрация завершена. Логин и пароль высланы на почту</div>
							</div>
				';
			}
			$message = "Вы зарегистрировались на сайте поиска практик ДВФУ \r\n Ваш логин: " . $login . "\r\n Ваш пароль: " . $new_password ."\r\n";
				mail(''.$Email.'', 'RE: Регистрация на сайте поиска практик ДВФУ', $message);
		}
		
	?>	

  
	<div id="w">
	   
	<?php
		
		$stmt = $db->query("SELECT vacancy.id_vac as id_vac, vacancy.id_pter as id_pter, vacancy.about as ab, pterodactyl.name as name, pterodactyl.iscontract as contract, vacancy.practic as practic, vacancy.privet as privet, vacancy.start as start, vacancy.finish as finish, vacancy.logo as logo
		FROM vacancy 
		inner JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id ORDER BY vacancy.id_vac DESC");
		
		echo
		'
			<div class="slider">
			<ul class="slides">
		';
		while ($row = $stmt->fetch())
		{		
			echo
			'
				<li class="slide" style="background:grey">
					<figure>
			';
						$first_date=$row['start'];
						$last_date=$row['finish'];
						$id_vac=$row['id_vac'];
						$name_vacancy=$row['ab'];//Название вакансии:
						$name_company=$row['name'];//Название компании:
						$student_dities=$row['practic'];//хм
						$student_welcome=$row['privet'];//Описание вакансии
						$practic=$row['practic'];//Описание вакансии

							echo
							'
							<div class="column small-2 medium-2 large-2">
								
									
							</div>
								
							<div class="row" style="background:#D4D4D3; min-height: 100%">
								<div class="column small-4 medium-4 large-4" style="   display: block; padding-left:20px; padding-right:20px;"><br>
								
								
								</div>
								<div class="column small-6 medium-6 large-6" style="padding:10px; background:#FAFAFA">
							';
								if ($row['logo'] != '')
							echo
							'
								<img style="width:70%;"src="files/logo/'.$row['id_pter'].'/'.$row['logo'].'"></img>
								<br> 
								
							';
							echo
							'		
							
									<p1>'.$name_vacancy.'</p1>
									<hr class="orange-line">
									<p4 style="text-align:left">Дата начала прохождения практики '.$first_date.'</p4><br>
									
									<p4>Дата окончания прохождения практики '.$last_date.'</p4><br>
									<br>
									<p2>'.$name_company.'</p2>
									<br>
									<p4 style="text-align:right">'.$practic.'</p4>
									<br>
									<p4 style="text-align:right">'.$privet.'</p4>
									<br>
							
									
								</div>
					</figure>
				</li>
				';
		}
		?>
			</ul>
		</div><!-- @end .slider -->
  </div><!-- @end #w -->
  
 
<script type="text/javascript">
$(function(){
  $('.slider').glide({
    autoplay: 3500,
    hoverpause: true, // set to false for nonstop rotate
    arrowRightText: '&rarr;',
    arrowLeftText: '&larr;'
  });
});
</script>
</body>