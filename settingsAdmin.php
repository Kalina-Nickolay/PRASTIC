<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
<?php
if(isset($_POST['update_admin']))
	{
		$id=$_POST['id_person'];
		$last_name =$_POST['last_name'];
		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$number_telephone = $_POST['number_telephone'];
		$Email = $_POST['Email'];
		$last_password = $_POST['last_password'];//На случай если пароль не меняется
		$new_password = $_POST['new_password']; ;
		$double_new_password =$_POST['double_new_password'];
		
		if($new_password==$double_new_password &&  isset($new_password))
			$last_password=md5($new_password);
		
		$sql = "UPDATE person
			SET lastname = '$last_name',
			name = '$name',
			fathername = '$father_name',
			password = '$last_password',
			email = '$Email',
			telephone = '$number_telephone'
			WHERE id_person = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		
		
		
	}
?>
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT * FROM person
		WHERE person.username = "'.$_SESSION['login'].'"');
		
	
		$row = $stmt->fetch();
		
		$id=$row['id_person'];
		
		$last_name =$row['lastname'];
		$name = $row['name'];
		$father_name = $row['fathername'];
		$number_telephone = $row['telephone'];
		$Email = $row['email'];
		$last_password = $row['password'];//На случай если пароль не меняется
		$new_password = '';
		$double_new_password = '';
		
		
		echo
		'
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				</div>
				
					<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
					<form action="settingsAdmin.php" method="POST" enctype="multipart/form-data" id="settingsAdmin">	<p5>Настройки</p5>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:80%">
					
				
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-4 medium-4 large-4"style="padding:0; margin:0;">
							
							
								
								<input  type="hidden" value="'.$id.'" name="id_person"></input>
								
								<input class="rectangle" required name="last_name" placeholder="Фамилия администратора" value="'.$last_name.'" type="text" ></input>
								
								<input class="rectangle" required name="name" placeholder="Имя администратора" value="'.$name.'" type="text" ></input>
								
								<input class="rectangle" required name="father_name" placeholder="Отчество администратора" value="'.$father_name.'" type="text" ></input>
								
								<input class="rectangle" required style="width:50%" name="number_telephone" placeholder="номер телефона администратора"  value="'.$number_telephone.'" type="text" ></input>
								
								<input class="rectangle" required name="Email" placeholder="email администратора" value="'.$Email.'" type="text" ></input>
								
								<input class="rectangle" type="hidden" required name="last_password" placeholder="last_password" value="'.$last_password.'" type="text" ></input>
								
								<input class="rectangle" name="new_password" placeholder="Новый пароль" type="password"></input>
								
								<input class="rectangle" name="double_new_password" placeholder="Подтверждение пароля" type="password" ></input>
								
							</div>
						</div>
						<div style="text-align: center;">
							<div style="display: inline-block;
								height: 50px;
								line-height: 50px;
								position: relative;
								border: 1px solid white;
								padding: 0 1rem;"><button type="submit" name="update_admin" >Сохранить</button>
							</div>
						</div>
				</form>
					</div>
			</div>
		</div>
		';
		?>
	</div>
</body>	
	