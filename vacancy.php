<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height: 100%">
		
		<?php
		if (isset($_GET['search'])) {
			$query = trim($_GET['search']); // удаляем пробелы из начала и конца строки
			$query = preg_replace('/\s+/', ' ', $query); //заменяем двойные (и более) пробелы на одинарные
			$query = htmlspecialchars($query); 
			$query = substr($query, 0, 128);
			$query = mb_strtolower($query);
			$query = "%".$query."%";
			$stmt = $db->prepare("SELECT vacancy.id_vac as id_vac, vacancy.id_pter as id_pter, vacancy.about as ab, pterodactyl.name as name, pterodactyl.iscontract as contract, vacancy.practic as practic, vacancy.privet as privet, vacancy.start as start, vacancy.finish as finish, vacancy.logo as logo
			FROM vacancy 
			inner JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id WHERE LOWER(vacancy.about) LIKE ? OR LOWER(pterodactyl.name) LIKE ? ORDER BY vacancy.id_vac DESC");
			$stmt -> execute(array($query,$query)); //с включённой эмуляцией, по идее, можно и один раз передать параметр
		} else {
			$stmt = $db->query("SELECT vacancy.id_vac as id_vac, vacancy.id_pter as id_pter, vacancy.about as ab, pterodactyl.name as name, pterodactyl.iscontract as contract, vacancy.practic as practic, vacancy.privet as privet, vacancy.start as start, vacancy.finish as finish, vacancy.logo as logo
			FROM vacancy 
			inner JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id ORDER BY vacancy.id_vac DESC");
		}
		
		$c = $stmt -> rowCount();
		if ($c==0) { ?>
			<div class="column small-12 medium-12 large-12" style="height: 100vh">
				<p id="no-res">Нет результатов.</p>
			</div>
		<? } 
		else 
			while ($row = $stmt->fetch())
			{
					
			$first_date=$row['start'];
			$last_date=$row['finish'];
			
			$id_vac=$row['id_vac'];
			$name_vacancy=$row['ab'];//Название вакансии:
			$name_company=$row['name'];//Название компании:
			$student_dities=$row['practic'];//хм
			$student_welcome=$row['privet'];//Описание вакансии
			
			?>
			<a class="column small-6 medium-6 large-6" href="vacancy_detail.php?id=<? echo $id_vac ?>">
				<div id="trunk" <? if ($row['contract']==1) {?> class="row" <? } else { ?> class="row no-contract" <?}?> >
					<div class="column small-4 medium-4 large-4" style="   display: block; padding:10px;"><br>
						<p4>от <? echo $first_date ?></p4><br>
						<p4>до <? echo $last_date ?></p4><br>
						<? if ($row['logo'] != '') {
							?> <img src="files/logo/<? echo $row['id_pter'] ?>/<? echo $row['logo']?>"></img><br> <?
						} ?>
						
					</div>
					<div class="column small-8 medium-8 large-8" style="padding:10px;">
						<p1><? echo $name_vacancy ?></p1>
						<hr class="orange-line">
						<p2><? echo $name_company ?></p2>
						<br>

						<? if ($student_welcome != "") { ?>
							<p3><? echo $student_welcome ?></p3>
						<? } ?>
					</div>
				</div>
			</a>
			<? } ?>
	</div>
</body>		