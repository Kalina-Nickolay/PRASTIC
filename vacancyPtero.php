<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$first_date='01.01.01';
		$last_date='15.01.01';
		
		$name_vacancy='1111111';//Название вокансии:
		$name_company='2222222';//Название компании:
		$student_dities='3333333';//Обязанности:
		$student_welcome='4444444';//Приветствуется:
		
		echo
		'
		<a class="column small-6 medium-6 large-6" href="vacancy_detail.php">
		<div class="row" id="trunk">
		<div class="column small-4 medium-4 large-4" style="   display: block; padding:10px;">
			<br>
		<p4>от '.$first_date.'</p4>
			<br>
		<p4>до '.$last_date.'</p4>
		
		<br>
		<img src="images/7026.jpg"></img>
		<br>
		</div>
		<div class="column small-8 medium-8 large-8" style="padding:10px;">
		<p1>'.$name_vacancy.'</p1>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;">
		<p2>'.$name_company.'</p2>
		<br>
		<p3>Обязанности: </p3>
		<br><p3>'.$student_dities.'</p3>
		<br>
		<p3>Приветствуется:</p3>
		<br><p3>'.$student_welcome.'</p3>
		</div>
		</div>
		</a>
		';
		
		
		
		
		?>
	</div>
</body>	
	