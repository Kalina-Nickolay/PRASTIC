<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$id_vac=$_GET['id'];
		$pret = 0;
		$stmt = $db->query('SELECT vacancy.id_vac as id_vac, vacancy.about as ab, pterodactyl.name as name, vacancy.practic as practic, vacancy.invalid as invalid, vacancy.privet as privet, pterodactyl.sphere as sphere, vacancy.places as places, request.id_vac as is_rvac, request.stud_agree as sagr, request.pter_agree as pagr,  vacancy.start as start, vacancy.finish as finish
			FROM vacancy 
			left JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id
			left JOIN request ON request.id_vac = vacancy.id_vac
		');
		
		
		while ($row = $stmt->fetch())
		{
		//$id_vac =$row['id_vac'];
		//$file = $_SERVER['REQUEST_URI'];
		//$file = substr($file, 23);
		
		$ideee=$row['id_vac'];
		if ($id_vac == $ideee) {
		
		$first_date=$row['start'];
		$last_date=$row['finish'];
		$name_vacancy=$row['ab'];//Название вокансии:
		$name_company=$row['name'];//Название компании:
		$student_dities=$row['practic'];//Обязанности:
		$student_welcome=$row['privet'];//Приветствуется:
		$pterodactyl_sphere=$row['sphere'];//вид деятельности:
		$for_invalids=$row['invalid'];
		$places=$row['places'];
		$id_rvac=$row['id_rvac'];
		$sagr=$row['sagr'];
		$pagr=$row['pagr'];
		if ($sagr==1 and $pagr==1){
		$pret = $pret + 1;
		}
		$places = $places - $pret;
		
		}
		}		
		echo
		
		'
		
		<div class="column small-12 medium-12 large-12">
		<div class="row" style="padding:5px; margin:5px;">
		<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
		
		
		</div>
		<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
		<p5>'.$name_vacancy.'</p5>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:50%">
		<div style="float: left;"><p4>'.$name_company.'</p4></div>
		<div style="float: right;"><p4 align="right">Осталось мест:</p4>
		<p4>'.$places.'</p4>
		<p4>Претендентов:</p4>
		<p4>'.$pret.'</p4>
		<p4>Период:</p4>
		<p4>'.$first_date.' - '.$last_date.'</p4>
		</div>
		<br>
		<p4>Описание: </p4>
		<br>
		<p3>'.$student_dities.'</p3>
		<br>
		<p4>Вид деятельности:</p4>
		<br>
		<p3>'.$pterodactyl_sphere.'</p3>
		<br>
		<p4>Условия для инвалидов:</p4>
		<br>
		<p3>'.$for_invalids.'</p3>
		<br>
		';

		if ($_SESSION['role']=='student') {
			echo '<div style="float: right;"><button type="submit" align="right">Подать</button></div>';
		}

		echo '
		</div>
		
		</div>
		
		</div>
		';
		
		?>
	</div>
</body>	
	