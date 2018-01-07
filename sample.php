<?php include('search.php');?>

<body>
	<!--Поисковая строка+название+кнопка входа-->
	
	<!--Меню-->
	<?php include('menu.php');?>
		
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height:100%">
		<!--Меню-->
		
		<?php
		$name_dogovora="Образец договора о сотрудничестве";
		$komy="Всем группам";
		$kto_dobavil="Кленина Н.В.";
		$data="актуально";
		
		$stmt = $db->query('SELECT * FROM pterodactyl');
		
		while ($row = $stmt->fetch())
		{
			$name_dogovora=$row['contract'];
			$kto_dobavil=$row['name'];
			if($name_dogovora)
			{
			echo
			'
			<div class="column small-6 medium-6 large-6" style="padding-top:40px;">
			<div class="row" id="trunk">
			<div class="column small-12 medium-12 large-12" style="padding:10px;">
			
			<p1><a href="files/contract/'.$name_dogovora.'" download>
			'.$name_dogovora.'
			</a></p1>
			<br>
			<p2>'.$komy.'</p2>
			<br>
			<div style="float: left;">
				<p4>'.$kto_dobavil.'</p4>
			</div>
			<div style="float: right;"><p4 align="right">Дата:</p4>
				<p4>'.$data.'</p4>
			</div>
			
			</div>
			</div>
			</div>
			
		
		
		';}
		}
		?>
	</div>
</body>	
	