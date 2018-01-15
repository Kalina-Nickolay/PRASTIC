<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT * FROM pterodactyl WHERE (SELECT COUNT(vacancy.id_pter) FROM vacancy WHERE vacancy.id_pter=pterodactyl.id)>0');

		while ($row = $stmt->fetch())
		{
		
		$id = $row['id'];
		$name_company=$row['name'];//Название компании:
		$adds=$row['address'];//адрес:
		$score=$row['sphere'];//Сфера:
		$About_company=$row['about'];//о компании

		if (strlen($score)>50)
			$score = mb_substr($score, 0, 50, 'UTF-8').'...';
		
		if (strlen($About_company)>50)
			$About_company = mb_substr($About_company, 0, 50, 'UTF-8').'...';
		
		?>
		<a class="column small-6 medium-6 large-6"  href="company_detail.php?id=<? echo $id ?>">
			<div <? if ($row['iscontract']==1) {?> class="row" <? } else { ?> class="row no-contract" <?}?> id="trunk">
				<div class="column small-4 medium-4 large-4" style="padding:10px;">
					<br>
					<img src="images/7026.jpg"></img>
					<br>
				</div>

				<div class="column small-8 medium-8 large-8" style="padding:10px;">
					<p1 ><? echo $name_company ?></p1>
					<hr class="orange-line">
					<br>
					<? if ($adds != "") { ?>
						<p3>Адрес: <? echo $adds ?></p3>
						<br>
					<? }
					if ($score != "") { ?> 
						<p3>Сфера деятельности: <? echo $score ?></p3>
						<br>
					<? }
					if ($About_company != "") { ?>  
						<p3>О компании: <? echo $About_company ?></p3>
					<?}?>
				</div>
			</div>
		</a>
		
		<? } ?>
	</div>
</body>	
	