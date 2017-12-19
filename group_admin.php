<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$idadmin=$_SESSION['id'];
		if(isset($_POST['vibor'])){
		$shkola = $_POST['school'];
		$gruppa = $_POST['studygroup'];
		$kafedra = $_POST['kaf'];
		$kyrs = $_POST['course'];
		$imya = $_POST['fio'];
		$spec = $_POST['speciality'];
		};
		$stmt = $db->query('SELECT distinct school
			FROM groups	
			
		');
		
		echo
		'
		<form action="" method="post">
		<div class="column small-12 medium-12 large-12" style="padding-top:10px;">
		<div style="background:white">
		<div class="block-absolute">
		
		<p2>Школа
		<select name="school"; style="width:20%">
		<option></option>';
		while ($row = $stmt->fetch())
		{
		$school = $row['school'];
		echo
		'
		
		<option>'.$school.'</option>';
		}
		;
		$stmt = $db->query('SELECT distinct kaf
			FROM groups	
			
		');
		echo
		'
		<select>
		</p2>
		
		<p2>Кафедра
		<select name="kaf"; style="width:20%">
		<option></option>';
		while ($row = $stmt->fetch())
		{
		$kaf = $row['kaf'];
		echo
		'
		
		<option >'.$kaf.'</option>';
		}
		;
		echo
		'
		<select>
		</p2>';
		$stmt = $db->query('SELECT distinct speciality
			FROM groups		
		');
		echo
		'
		<p2>Специальность
		<select name="speciality"; style="width:20%">
		<option></option>';
		while ($row = $stmt->fetch())
		{
		$speciality = $row['speciality'];
		echo
		'
		<option >'.$speciality.'</option>';
		}
		;
		echo
		'
		<select>
		</p2>';
		$stmt = $db->query('SELECT distinct course
			FROM groups
			order by course			
		');
		echo
		'
		<p2>Курс
		<select name="course"; style="width:20%">
		<option></option>';
		while ($row = $stmt->fetch())
		{
		$course = $row['course'];
		echo
		'
		<option>'.$course.'</option>';
		}
		;
		echo
		'
		<select>
		</p2>';
		$stmt = $db->query('SELECT distinct studygroup
			FROM groups
			order by studygroup			
		');
		echo
		'
		<p2>Группа
		<select name="studygroup"; style="width:20%">
		<option></option>';
		while ($row = $stmt->fetch())
		{
		$studygroup = $row['studygroup'];
		echo
		'
		<option>'.$studygroup.'</option>';
		}
		;
		echo
		'
		<select>
		</p2>';
		$stmt = $db->query('SELECT *
			FROM groups
			left join person on groups.admin = person.id_person
			group by admin
			order by admin			
		');
		echo	
		'
		<p2>Руководитель
		<select name="fio"; style="width:20%">';
		while ($row = $stmt->fetch())
		{
		$admin = $row['admin'];
		if ($admin == $idadmin){
		$fio = $row['lastname'] .' '. $row['name'] .' '. $row['fathername'];};};
		echo
		'
		<option>'.$fio.'</option>';
		
		echo
		'
		<select></p2>
		</form>	
		<button type="submit"; name="vibor">Выбрать</button>
		
			<table class="linkRow">
				<thead>
						<tr >
							<th>Группа</th>
							<th>Курс</th>
							<th>Специальность</th>
							<th>Кафедра</th>
							<th>Школа</th>
							<th>Руководитель</th>
						</tr>
				</thead>
				<tbody>';
					$stmt = $db->query('SELECT *
					FROM groups
					left join person on groups.admin = person.id_person
					order by studygroup
					');
					while ($row = $stmt->fetch())
					{
					$idg = $row['id_group'];
					echo'
					<tr  data-href="group_students_admin.php?id='.$idg.'" onClick="gotolink(this)">';
					$admin = $row['admin'];
					$course = $row['course'];
					$fio = $row['lastname'] .' '. $row['name'] .' '. $row['fathername'];
					$speciality = $row['speciality'];
					$studygroup = $row['studygroup'];
					if((($kyrs == $course)or ($kyrs=='')) and (($imya == $fio)or ($imya=='')) and (($gruppa == $studygroup)or ($gruppa=='')) and (($spec == $speciality) or ($spec=='')) and ($idadmin == $admin)){
						if ($gruppa=='') { echo'
						<td>'.$studygroup.'</td>';}
						else { echo'
						<td>'.$gruppa.'</td>';};
						if ($kyrs=='') { echo'
						<td>'.$course.'</td>';}
						else { echo'
						<td>'.$kyrs.'</td>';};
						if ($spec=='') { echo'
						<td>'.$speciality.'</td>';}
						else { echo'
						<td>'.$spec.'</td>';};
						if ($kafedra=='') { echo'
						<td>'.$kaf.'</td>';}
						else { echo'
						<td>'.$kafedra.'</td>';};
						if ($shkola=='') { echo'
						<td>'.$school.'</td>';}
						else { echo'
						<td>'.$shkola.'</td>';};
						echo'
						<td>'.$fio.'</td>';
					echo '
						</tr>';}};
					echo '	
					
				</tbody>
			</table>
			
		</div></div>
		';
		
		?>
<script>
	function gotolink(event) {
		document.location.href = event.getAttribute('data-href');
	}
</script>
	</div>
</body>	
	