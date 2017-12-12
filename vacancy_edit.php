<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		
		$idq=$_GET["idq"];//ИНДЕКС РЕДАКТИРУЕМОЙ ВАКАНСИИ ну или как там леха сделал
		
		
		$first_date='01.01.01';
		$last_date='15.01.01';
		
		$name_vacancy='1111111';//Название вакансии:
		$name_company='2222222';//Название компании:
		$student_dities='3333333';//Обязанности:
		$student_welcome='4444444';//Приветствуется:
		$for_invalids='5555';
		echo
		'
		<div class="column small-12 medium-12 large-12">
		<div class="row" style="padding:5px; margin:5px;">
		
		<div class="column small-12 medium-12 large-12" style="background:none; padding:10px; padding-right:60px; height:100%">
		<p1>Вакансия</p1>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
		
		
		<div class="row" style="padding:0; margin:0;">
		<div class="column small-7 medium-7 large-7"style="padding:0; margin:0; ">
		<input class="rectangle" name="last_name" placeholder="Название вакансии" type="text" ></input>
		
		<div class="row" style="padding:0; margin:0;">
		 <div class="column small-6 medium-6 large-6" style="padding-left:0;"><input class="rectangle" name="first_name" placeholder="С" type="text" style="width:100%; margin-left:0;"></input></div>	
		 <div class="column small-6 medium-6 large-6" style="padding-right:0;"><input class="rectangle" name="father_name" placeholder="По" type="text" style="width:100%" ></input></div>	
		</div>	
		
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Описание" style="height:100px;"></textarea>
        </div></div>
		
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Вид деятельности" style="height:100px;"></textarea>
        </div></div>
		
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Условия для инвалидов" style="height:100px;"></textarea>
        </div></div>
		
		 <div class="row" style="padding:0; margin:0;">
		 <div class="column small-6 medium-6 large-6" style="padding-left:0;"><input class="rectangle" name="first_name" placeholder="Мест" type="text" style="width:100%; margin-left:0;"></input></div>	
		 </div>
		
		</div>
		<div class="column small-5 medium-5 large-5" style="padding:0; padding-left:10%;margin:0;">
		
		<div class="row" style="padding:0; margin:0;"><div style="height:100px; width:80%; background:white; border:3px; float:right;"></div></div>
		<div class="row" style="padding:0; margin:0;"><div style="float:left; width:18%; margin-top:10px; margin-left:2%;float:right;"><button type="submit" >Изменить логотип</button></div></div>
		</div>
		</div><div style="float:left; width:18%; margin-left:55%;"><button type="submit" >Опубликовать</button></div>
		</div>
		
		</div>
		
		</div>
		';
		
		?>
	</div>
</body>	
	