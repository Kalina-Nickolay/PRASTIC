<?php include('search.php');?>

<body>
	<!--Поисковая строка+название+кнопка входа-->
	
	<!--Меню-->
	<?php include('menu.php');?>
		
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; height:100%">
		<!--Меню-->
		
		<?php
		$name_dogovora="Образец договора о сотрудничестве";
		$komy="Б8419а Б8319 Б8617";
		$kto_dobavil="Кленина Н.В.";
		$data="20.04.17";
		
		
		echo
		'
		<div class="column small-6 medium-6 large-6" style="padding:40px;">
		<div class="row" id="trunk">
		<div class="column small-12 medium-12 large-12" style="padding:10px;">
		<p1>'.$name_dogovora.'</p1>
		<br>
		<p2>'.$komy.'</p2>
		<br>
		<div style="float: left;"><p4>'.$kto_dobavil.'</p4></div>
		<div style="float: right;"><p4 align="right">Дата:</p4>
		<p4>'.$data.'</p4>
		
		</div>
		
		</div>
		</div>
		</div>
		';
		?>
	</div>
</body>	
	