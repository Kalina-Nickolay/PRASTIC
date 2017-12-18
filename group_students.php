<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$idg = $_GET['id'];
		$stmt = $db->query('SELECT student.studygroup as idgr, person.lastname as lastname, person.name as name, person.fathername as fathername, student.invalid as invalid, groups.studygroup as studygroup 
			FROM student
			left join person on student.id = person.id_person
			left join groups on student.studygroup = groups.id_group
		');
		
		echo
		'
		<div class="column small-12 medium-12 large-12" style="padding-top:10px;">
		<div style="background:white">
		<div class="block-absolute">
			<p2 style="font-size:xx-large">Прикладная информатика группа Б8419А</p2>
			<table>
				<thead>
					<tr  onclick="window.location.href="group_students.php"; return false>
						<th>№</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>ОВЗ</th>
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
				$invalid = $row['invalid'];
				if ($idg == $idgr){
					echo'
					<tr>
						<td>'.$studygroup.'</td>
						<td>'.$lastname.'</td>
						<td>'.$name.'</td>
						<td>'.$fathername.'</td>
						<td>'.$invalid.'</td>
					</tr>';
					};};
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
	