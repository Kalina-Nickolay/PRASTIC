<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
<?php

		
if(isset($_POST['registration_one_step']))
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
		$stmt = $db->query("SELECT username FROM person WHERE username = '$login'");
		$stmt->execute();
		$row = $stmt->fetch();
		$username=$row['username'];
		if($username==$login)
		{
			$error='Такой логин уже сущетвует в системе.';
			
		}
		else
		{
			if($new_password!=$double_new_password && isset($new_password))
			{
				$error='Пароли не совпадают. ';
			}
		}
		
	}
	
	
?>
	
	<!--Меню-->
	
	<?php
	if (!isset($error))
	{
	echo
	'
	<div class="row" style="background:#D4D4D3;">
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				</div>
				
					<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
						<form action="index.php" method="POST" enctype="multipart/form-data" id="registration_two_step">	
							
			
							<input type="hidden" name = "role" value="'.$role.'" </input>
							<input type="hidden" name = "last_name" value="'.$last_name.'" </input>
							<input type="hidden" name = "first_name" value="'.$first_name.'" </input>
							<input type="hidden" name = "father_name" value="'.$father_name.'" </input>
							<input type="hidden" name = "number_telephone" value="'.$number_telephone.'" </input>
							<input type="hidden" name = "Email" value="'.$Email.'" </input>
							<input type="hidden" name = "login" value="'.$login.'" </input>
							<input type="hidden" name = "new_password" value="'.$new_password.'" </input>
							<input type="hidden" name = "double_new_password" value="'.$double_new_password.'" </input>
						';
						
						if($role=='pterodactyl'){
							echo'
										
							<p5>Компания</p5>
							
							<div class="row" style="padding:0; margin:0;">
								<div class="column small-8 medium-8 large-8"style="padding:0; margin:0;">
								
								<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:120%">
			
									
									<input class="rectangle" style="width:60%"  required name="name_company" placeholder="Название компании" type="text" ></input>
									
									<textarea form="registration_two_step" style="width:80%; height:20px;"  required class="rectangle" name="address" placeholder="Адрес" type="text" style="height:100px;" ></textarea>
									
									<input class="rectangle" style="width:80%"  required name="sphere" placeholder="Сфера деятельности" type="text" ></input>
									
									<textarea form="registration_two_step" style="width:100%; height:150px;"  required class="rectangle" name="about" placeholder="О компании" type="text" style="height:100px;" ></textarea>
									
									
									<input value="Догоров о сотрудничестве" type="file" id="contract_url" name="contract_url" placeholder="Догоров о сотрудничестве" accept="files/contract" />
									
								</div>
								
							</div>
						
							';}
								else
								{
									if($role=='student')
									{
									echo
									'
										<p5>Студент</p5>
										<div class="row" style="padding:0; margin:0;">
										<div class="column small-8 medium-8 large-8"style="padding:0; margin:0;">
										
										<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:120%">
								
								
											<input class="rectangle" required style="width:80%"  name="birthdate" placeholder="Дата рождения" type="text" ></input>
											';
											$stmt = $db->query('SELECT distinct studygroup
												FROM groups
												order by studygroup			
											');
											echo
											'
												<select form="registration_two_step" class="rectangle" name="studygroup" placeholder="Группа" style="width:25%">
												<option>'.$study_group.'</option>
											';
											while ($row = $stmt->fetch())
											{
												$study_group_1 = $row['studygroup'];
												echo
												'
													<option>'.$study_group_1.'</option>
												';
											}
											echo'
											
											
											
											<textarea form="registration_two_step" style="width:100%"  class="rectangle" name="invalid" placeholder="Инвалидам и людям с ограниченными возможностями, написать условия для прохождения практики" type="text" style="height:100px;" ></textarea>
										
										</div>
										
										</div>
										
							
									';
									}
								}
							echo'
							<div style="text-align: center;">
								<div style="display: inline-block;
									height: 50px;
									line-height: 50px;
									position: relative;
									border: 1px solid white;
									padding: 0 1rem;"><button type="submit" name="reg" >Зарегистрироваться</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
	';
		}
		else
		{
			echo
			'
			<div class="row">
				<div class="large-12 medium-12 cell content-error">Ошибка. '.$error.'</div>
				</div>
			';
		}
		?>
	
</body>	
	