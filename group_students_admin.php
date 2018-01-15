<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height: 100%">
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
			$speciality = $row['speciality'];
			$stm = $db->query('SELECT *
					FROM groups
					left join person on groups.admin = person.id_person
					');
			while ($row = $stm->fetch())
			{
				$gr = $row['studygroup'];
				if ($gr == $studygroup){
				$fio = $row['lastname'] .' '.mb_substr($row['name'], 0, 1) .'. '.mb_substr($row['fathername'], 0, 1).'. ';}
			}
					};};
			echo'
			<p2 class="speciality-name">'.$speciality.' '.$studygroup.'</p2>
			<p2 >Руководитель - '.$fio.'</p2>';
			$stmt = $db->query('SELECT *
			FROM student
			left join request on student.id = request.id_stud
			');
			$schet = 0;
			$schetgrupp = 0;
			while ($row = $stmt->fetch())
				{ $adagr = $row['admin_agree'];
				$studygrou = $row['studygroup'];
					if ($studygrou == $idg) {
					$schetgrupp = $schetgrupp + 1;
					if ($adagr == 1 ) {
					$schet = $schet + 1;
					};
					};}
			echo'
			<br>
			<p2 style= "padding-left:10">Практика утверждена у '.$schet.' из '.$schetgrupp.' человек</p2>';
			$stmt = $db->query('SELECT student.studygroup as idgr, person.lastname as lastname, person.name as name, person.fathername as fathername, groups.studygroup as studygroup, pterodactyl.name as place, vacancy.about as vacancy, groups.speciality as speciality, request.admin_agree as admin_agree
			FROM student
			left join person on student.id = person.id_person
			left join groups on student.studygroup = groups.id_group
			left join request on student.id = request.id_stud
			left join vacancy on request.id_vac = vacancy.id_vac
			left join pterodactyl on vacancy.id_pter = pterodactyl.id
		');
			echo'
			<table class="linkRow">
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
						<td>'.$fathername.'</td>';
						if ( $row['admin_agree'] == 1){
						echo'
						<td>'.'Компания: '.$place. '<br>'.' Вакансия: '.$vacancy.'</td>';}
						else {echo'<td> </td>';};
					echo'
					</tr>';
					$i = $i +1;};
					};
					echo'
				</tbody>
			</table>
			<button style="margin-left:1%" class="button" onClick="clicke()">Отказаться от <br> руководства</button>
		</div></div>
			
		
		';
		if($role=="RMAD"){
			echo'<button type="submit">Выбрать</button>';
		}
		?>
		
	</div>
</body>	

<script>
		function clicke(){

		var formData = { 
		"id": <?php echo $idg ?>,
		}; 
		
		$.ajax({ 
		url: "groupstudentsadmindop.php", 
		type: "POST", 
		data: 'jsonData=' + JSON.stringify(formData), 
		success:function(res) {
			
		}
		}); 
		location.reload();
		document.location.href = "group_admin.php";
		
		}; 
</script>
	