<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
<?php

?>
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		
		echo
		'
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				</div>
				
					<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
					<form action="registration_two_step.php" method="POST" enctype="multipart/form-data" id="registration">	<p5>Кто вы</p5>
					
				
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-4 medium-4 large-4"style="padding:0; margin:0;">
							
							
								<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:120%">
					
								<p2><input required name="role" type="radio" value="student"> Cтудент</input></p2>
								
								<p2><input required name="role" type="radio" value="pterodactyl"> Работодатель</input></p2>
								
								<input class="rectangle" required name="last_name" placeholder="Фамилия" type="text" ></input>
								
								<input class="rectangle" required name="first_name" placeholder="Имя"  type="text" ></input>
								
								<input class="rectangle" required name="father_name" placeholder="Отчество" type="text" ></input>
								
								<input class="rectangle" required style="width:50%" name="number_telephone" placeholder="Телефон"  type="text" ></input>
								
								<input class="rectangle" required name="Email" placeholder="Email" type="text" ></input>
								
								<input class="rectangle" required name="login" placeholder="Логин" type="text" ></input>
								
								<input class="rectangle" required name="new_password" placeholder="Новый пароль" type="password" ></input>
								
								<input class="rectangle" required name="double_new_password" placeholder="Подтверждение пароля" type="password" ></input>
							
							</div>
							
						</div>
						<div style="text-align: center;">
							<div style="display: inline-block;
								height: 50px;
								line-height: 50px;
								position: relative;
								border: 1px solid white;
								padding: 0 1rem;"><button type="submit" name="registration_one_step" >Далее</button>
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
	