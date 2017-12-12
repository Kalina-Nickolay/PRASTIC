<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT vacancy.id_vac as id_vac, vacancy.about as ab, pterodactyl.name as name, vacancy.practic as practic, vacancy.privet as privet, vacancy.start as start, vacancy.finish as finish
			FROM vacancy 
			inner JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id
		');
		while ($row = $stmt->fetch())
		{
				
		$first_date=$row['start'];
		$last_date=$row['finish'];
		
		$id_vac=$row['id_vac'];
		$name_vacancy=$row['ab'];//Название вокансии:
		$name_company=$row['name'];//Название компании:
		$student_dities=$row['practic'];//Обязанности:
		$student_welcome=$row['privet'];//Приветствуется:
		
		echo
		'
		<a class="column small-6 medium-6 large-6">
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
		<div style="float:left; width:16%; margin-left:35%;"><button type="submit" data-href="vacancyEdit.php" onClick="gotolink(this)">Изменить</button></div>
		<div style="float:left; width:16%; margin-left:15%;"><button type="submit" data-href="vacancyEdit.php" onClick="gotolink(this)">Удалить</button></div>
		</div>
		</a>
		';
		
		
		
		}
		
		echo
		'
		<a class="column small-6 medium-6 large-6">
		<div class="row" id="trunk">
		
		
		<img style="margin-left:25%; height:150px;" src="images/on.png"></img>
		<p4 style="margin-left:25%">Добавить воканси</p4>
		</div>
		</a>
		';
		
		?>
<script>
	function gotolink(event) {
		document.location.href = event.getAttribute('data-href');
	}
</script>
		
			
		

		
	</div>
</body>	
	