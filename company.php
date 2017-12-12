<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT *
			FROM pterodactyl
			
		');
		while ($row = $stmt->fetch())
		{
		
		$id = $row['id'];
		$name_company=$row['name'];//Название компании:
		$adds=$row['address'];//адрес:
		$score=$row['sphere'];//Сфера:
		$score = substr($score, 0, 100).'...';
		$About_company=$row['about'];//о компании
		$About_company = substr($About_company, 0, 100).'...';
		
		
		
		echo
		'
		<a class="column small-6 medium-6 large-6"  href="company_detail.php?id='.$id.'">
		<div class="row" id="trunk">
		<div class="column small-4 medium-4 large-4" style="padding:10px;">
		<br>
		<br>
		<br>
		
		<br>
		<img src="images/7026.jpg"></img>
		<br>
		</div>
		<div class="column small-8 medium-8 large-8" style="padding:10px;">
		<p1 >'.$name_company.'</p1>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;">
		<br>
		<p3>Адрес: </p3>
		<p3>'.$adds.'</p3>
		<br>
		<p3>Сфера деятельности:</p3>
		<p3>'.$score.'</p3>
		<br>
		<p3>О компании:</p3>
		<p3>'.$About_company.'</p3>
		</div>
		</div>
		</a>
		';	
		
		}
		?>
	</div>
</body>	
	