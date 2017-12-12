<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
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
		<p5>Настройки</p5>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:80%">
		
		
		<div class="row" style="padding:0; margin:0;">
		<div class="column small-4 medium-4 large-4"style="padding:0; margin:0;">
		 <input class="rectangle" name="last_name" placeholder="Фамилия" type="text" ></input>
		  <input class="rectangle" name="first_name" placeholder="Имя" type="text" ></input>
		 <input class="rectangle" name="father_name" placeholder="Отчество" type="text" ></input>
		 <input class="rectangle" name="number_telephone" placeholder="Телефон" type="text" ></input>
		 <input class="rectangle" name="email" placeholder="Email" type="text" ></input>
		
		
		
		 <input class="rectangle" name="new_password" placeholder="Новый пароль" type="text" ></input>
		 <input class="rectangle" name="double_new_papassword" placeholder="Подтверждение пароля" type="text" ></input>
		 <input class="rectangle" name="stady_group" placeholder="Группа" type="text" ></input>
		 <input class="rectangle" name="course" placeholder="Курс" type="text" ></input>
		 <input class="rectangle" name="speciality" placeholder="Специальность" type="text" ></input>
		 <input class="rectangle" name="birth_date" placeholder="Дата рождения" type="text" ></input>
		
		</div>
		<div class="column small-4 medium-4 large-4" style="padding:0; padding-left:5px;margin:0;">
		
		<input class="rectangle" name="course" placeholder="Дата рождения" type="text" ></input>
		 <input class="rectangle" name="speciality" placeholder="Группа" type="text" ></input>
		 <input class="rectangle" name="birth_date" placeholder="Инвалидам и людям с ограниченными возможностями, написать условия для прохождения практики" type="text" ></input>
		 
		 
		</div>
		</div>
			<div style="float:left; width:18%; margin-left:55%;"><button type="submit" >Сохранить</button></div>
			
		</div>
	
		</div>
		
		</div>
		';
		?>
	</div>
</body>	
	