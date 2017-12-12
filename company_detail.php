<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$scetchik =0;
		$ide=$_GET['id'];
		$stmt = $db->query('SELECT *
			FROM pterodactyl
			left join vacancy on pterodactyl.id = vacancy.id_pter
		');
		
		while ($row = $stmt->fetch())
		{
		
		//$id =$row['id'];
		//$file = $_SERVER['REQUEST_URI'];
		//$file = substr($file, 23);	
		$ideee=$row['id'];
		if ($ide == $ideee) {
		$name_company=$row['name'];//Название компании:
		$adds=$row['address'];//адрес:
		$kind_activity=$row['sphere'];//Сфера:
		$description=$row['about'];//о компании
		$for_invalids='888888';
		$id =$row['id'];
		$id_pter=$row['id_pter'];
		if ($id_pter==$id){
		$scetchik = $scetchik + 1;
		}
		}
		}
		echo
		'
		<div class="column small-12 medium-12 large-12">
		<div class="row" style="padding:5px; margin:5px;">
		<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
		
		
		</div>
		<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
		<p5>'.$name_company.'</p5>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:50%">
		<div style="float: left;"><p3>договор о сотрудничестве</p3></div>
		<div style="float: right;"><p4 align="right">Вакансий:</p4>
		<p4>'.$scetchik.'</p4>
		</div>
		
		<br>
		<p4>Описание: </p4>
		<br>
		<p3>'.$description.'</p3>
		<br>
		<p4>Вид деятельности:</p4>
		<br>
		<p3>'.$kind_activity.'</p3>
		<br>
		<p4>Условия для инвалидов:</p4>
		<br>
		<p3>'.$for_invalids.'</p3>
		</div>
		
		</div>
		
		</div>
		';
		
		?>
	</div>
</body>	
	