<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
<?php
if(isset($_POST['update_ptero']))
	{
		$id=$_POST['id_person'];
		$last_name =$_POST['last_name'];
		$namePerson = $_POST['namePerson'];
		$father_name = $_POST['father_name'];
		$number_telephone = $_POST['number_telephone'];
		$Email = $_POST['Email'];
		$last_password = $_POST['last_password'];//На случай если пароль не меняется
		$new_password = $_POST['new_password']; ;
		$double_new_password =$_POST['double_new_password'];
		
		$namePtero=$_POST['namePtero'];
		$address=$_POST['address'];
		$sphere=$_POST['sphere'];
		$about=$_POST['about'];
		$iscontract=$_POST['iscontract'];
		
		
		if (is_uploaded_file($_FILES['contract_name']['tmp_name'])) 
		{
			
			$contract=($_FILES['contract_name']['name']);
			$uploaddir = 'files/contract/';
			if (file_exists($uploaddir)) {
			   $uploadfile = $uploaddir.basename($_FILES['contract_name']['name']);
			   copy($_FILES['contract_name']['tmp_name'], $uploadfile);
			} else {
			   mkdir($uploaddir, 0700, true);
			   $uploadfile = $uploaddir.basename($_FILES['contract_name']['name']);
			   copy($_FILES['contract_name']['tmp_name'], $uploadfile);
			}
		}
		
		if($new_password==$double_new_password &&  isset($new_password))
			$last_password=md5($new_password);
		
		
		$sql = "UPDATE person
			SET lastname = '$last_name',
			name = '$namePerson',
			fathername = '$father_name',
			password = '$last_password',
			email = '$Email',
			telephone = '$number_telephone'
			WHERE id_person = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		
		
			$sql = "UPDATE pterodactyl
			SET name = '$namePtero',
			address = '$address',
			sphere = '$sphere',
			about = '$about',
			iscontract = '$iscontract',
			contract = '$contract'
			WHERE pterodactyl.id = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
	}
?>
	<div class="row" style="background:#D4D4D3; min-height: 100%">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT person.name AS namePerson, person.id_person, lastname, fathername, telephone,email,address,sphere,about,iscontract,contract, pterodactyl.name AS namePtero FROM person
		LEFT JOIN pterodactyl ON person.id_person = pterodactyl.id WHERE person.username = "'.$_SESSION['login'].'"');
		
	
		$row = $stmt->fetch();
		
		$id=$row['id_person'];
		
		$last_name =$row['lastname'];
		$namePerson = $row['namePerson'];
		$father_name = $row['fathername'];
		$number_telephone = $row['telephone'];
		$Email = $row['email'];
		$last_password = $row['password'];//На случай если пароль не меняется
		$new_password = '';
		$double_new_password = '';
		
		$namePtero=$row['namePtero'];
		$address=$row['address'];
		$sphere=$row['sphere'];
		$about=$row['about'];
		$iscontract=$row['iscontract'];
		if(isset($row['contract']))
			$iscontract='1';
		else
			$iscontract='0';
		$contract=$row['contract'];
		echo
		'
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				</div>
				
					<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
					<form action="settingsPtero.php" method="POST" enctype="multipart/form-data" id="settingsPtero">	<p5>Настройки</p5>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:80%">
					
				
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-4 medium-4 large-4"style="padding:0; margin:0;">
							
							
								
								<input  type="hidden" value="'.$id.'" name="id_person"></input>
								
								<input class="rectangle" required name="last_name" placeholder="Фамилия представителя" value="'.$last_name.'" type="text" ></input>
								
								<input class="rectangle" required name="namePerson" placeholder="Имя представителя" value="'.$namePerson.'" type="text" ></input>
								
								<input class="rectangle" required name="father_name" placeholder="Отчество представителя" value="'.$father_name.'" type="text" ></input>
								
								<input class="rectangle" required style="width:50%" name="number_telephone" placeholder="номер телефона представителя"  value="'.$number_telephone.'" type="text" ></input>
								
								<input class="rectangle" required name="Email" placeholder="email представителя" value="'.$Email.'" type="text" ></input>
								
								<input class="rectangle" type="hidden" required name="last_password" placeholder="last_password" value="'.$last_password.'" type="text" ></input>
								
								<input class="rectangle" name="new_password" placeholder="Новый пароль" type="password" ></input>
								
								<input class="rectangle" name="double_new_password" placeholder="Подтверждение пароля" type="password" ></input>
								
							</div>
							<div class="column small-7 medium-7 large-7" style="padding:0; padding-left:50px;margin:0;">
								
								<input class="rectangle" required style="" name="namePtero" placeholder="Наименования компании" value="'.$namePtero.'" type="text" ></input>
								 
								<input class="rectangle" required style="" name="address" placeholder="Юридический адрес компании" value="'.$address.'" type="text" ></input>
								 
								<input class="rectangle" required style="" name="sphere" placeholder="Сфера деятельности" value="'.$sphere.'" type="text" ></input>
								 
								<input class="rectangle" style="" name="about" placeholder="О компании" value="'.$about.'" type="text" ></input>
								 
								<input class="rectangle" type="hidden" style="" name="iscontract" placeholder="Наличие договора о сотрудничестве с ДВФУ" value="'.$iscontract.'" type="text" ></input>

							</div>
								<p5>Документы</p5>
								<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
								';
								if ($contract)
								{
									echo
									'									
										<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
											<a href="files/contract/'.$contract.'" download>
											'.$contract.'
											</a>
										</div>
										<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
											<input type="file" id="contract_name" name="contract_name" />
										</div>
										<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
											<p>&#10004</p>
										</div>
									';
								}
								else
								{
									echo
									'
									<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
									<p>Прикрепите договор о сотрудничестве с ДВФУ</p>	
									</div>
									<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
										<input type="file" id="contract_name" name="contract_name"/>
									</div>
									<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
										
									</div>
									';
								}
							echo'
						</div>
						<div style="text-align: center;">
							<div style="display: inline-block;
								height: 50px;
								line-height: 50px;
								position: relative;
								border: 1px solid white;
								padding: 0 1rem;"><button type="submit" name="update_ptero" >Сохранить</button>
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
	