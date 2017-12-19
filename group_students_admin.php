<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$idg = $_GET['id'];
		$i = 1;
		$stmt = $db->query('SELECT student.studygroup as idgr, person.lastname as lastname, person.name as name, person.fathername as fathername, groups.studygroup as studygroup, pterodactyl.name as place, vacancy.about as vacancy, groups.speciality as speciality
			FROM student
			left join person on student.id = person.id_person
			left join groups on student.studygroup = groups.id_group
			left join request on student.id = request.id_stud
			left join vacancy on request.id_vac = vacancy.id_vac
			left join pterodactyl on vacancy.id_pter = pterodactyl.id
		');
		
		echo
		'
		<div class="column small-12 medium-12 large-12" style="padding-top:10px;">
		<div style="background:white">
		<div class="block-absolute">';
		while ($row = $stmt->fetch())
			{
			$idgr = $row['idgr'];
			if ($idg == $idgr){
			$studygroup = $row['studygroup'];
			$speciality = $row['speciality'];};}	
			echo'
			<p2 style="font-size:xx-large">'.$speciality.' '.$studygroup.'</p2>';
			$stmt = $db->query('SELECT student.studygroup as idgr, person.lastname as lastname, person.name as name, person.fathername as fathername, groups.studygroup as studygroup, pterodactyl.name as place, vacancy.about as vacancy, groups.speciality as speciality
			FROM student
			left join person on student.id = person.id_person
			left join groups on student.studygroup = groups.id_group
			left join request on student.id = request.id_stud
			left join vacancy on request.id_vac = vacancy.id_vac
			left join pterodactyl on vacancy.id_pter = pterodactyl.id
		');
			echo'
			<table>
				<thead>
					<tr  onclick="window.location.href="group_students.php"; return false>
						<th>№</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Место прохождения практики</th>
					</tr>
				</thead>
				<tbody>';
				while ($row = $stmt->fetch())
				{
				$idgr = $row['idgr'];
				$studygroup = $row['studygroup'];
				$lastname = $row['lastname'];
				$name = $row['name'];
				$fathername = $row['fathername'];
				$place = $row['place'];
				$vacancy = $row['vacancy'];
				if ($idg == $idgr){
					echo'
					<tr>
						<td>'.$i.'</td>
						<td>'.$lastname.'</td>
						<td>'.$name.'</td>
						<td>'.$fathername.'</td>
						<td>'.'Компания: '.$place. '<br>'.' Вакансия: '.$vacancy.'</td>
					</tr>';
					$i = $i +1;};
					};
					echo'
				</tbody>
			</table>
		</div></div>
			
		
		';
		if($role=="RMAD"){
			echo'<button type="submit">Выбрать</button>';
		}
		?>
		
	</div>
</body>	
	