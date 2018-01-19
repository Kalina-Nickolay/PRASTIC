<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height: 100%">
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
		<div class="column small-12 medium-12 large-12" style="padding-top:10px;">
		<form action="" method="post">
			
				<div style="background:white">
					<div class="block-absolute">
						<div class="row">
							<div class="column small-2 medium-2 large-2">
								<p2 style="float: right;">Школа
									<select class="group-select" name="school" style="width:55%">
										<option></option>';
										while ($row = $stmt->fetch()) {
											$school = $row['school'];
											if ($school == $shkola) {
												echo
												'
												<option selected>'.$school.'</option>';
											} else {
												echo
												'
												<option>'.$school.'</option>';
											}
										}
			
										$stmt = $db->query('SELECT distinct kaf FROM groups	WHERE admin='.$_SESSION['id']);
									echo
									'
									</select>
								</p2>
							</div>

							<div class="column small-4 medium-4 large-4">
								<p2>Кафедра</p2>
									<select class="group-select" name="kaf"; style="width:75%">
										<option></option>';
										while ($row = $stmt->fetch()) {
											$kaf = $row['kaf'];
											if ($kaf == $kafedra) {
												echo
												'
												<option selected>'.$kaf.'</option>';
											} else {
											echo
											'
											<option>'.$kaf.'</option>';
											}
										}
										;
										echo
										'
									</select>';
							$stmt = $db->query('SELECT distinct speciality FROM groups WHERE admin='.$_SESSION['id']);
							echo
							'
							</div>

							<div class="column small-4 medium-4 large-4">
								<p2>Специальность
									<select class="group-select" name="speciality"; style="width:57%">
										<option></option>';
										while ($row = $stmt->fetch()) {
											$speciality = $row['speciality'];
											if ($speciality == $spec) {
												echo
												'
												<option selected>'.$speciality.'</option>';
											}
											else {
												echo
												'
												<option>'.$speciality.'</option>';
											}
										}
										;
										echo
										'
									</select>
								</p2>';
							$stmt = $db->query('SELECT distinct course FROM groups WHERE admin='.$_SESSION['id'].' ORDER BY course');
							echo
							'
							</div>
						</div>

						<div class="row">
							<div class="column small-2 medium-2 large-2">
								<p2 style="padding-left: 10;">Курс</p2>
									<select class="group-select" name="course"; style="width:55%">
										<option></option>';
										while ($row = $stmt->fetch()) { 
											$course = $row['course'];
											if ($course == $kyrs) {
												echo
												'
												<option selected>'.$course.'</option>';
											}
											else {
												echo
												'
												<option>'.$course.'</option>';
											}
										};
									echo
									'
									</select>';
							$stmt = $db->query('SELECT distinct studygroup FROM groups WHERE admin='.$_SESSION['id'].' order by studygroup');
							echo
							'
							</div>

							<div class="column small-4 medium-4 large-4">
								<p2 style="">Группа 
									<select class="group-select" name="studygroup"; style="width:75%">
										<option></option>';
										while ($row = $stmt->fetch()) {
											$studygroup = $row['studygroup'];
											if ($studygroup == $gruppa) {
												echo
												'
												<option selected>'.$studygroup.'</option>';
											}
											else {
												echo
												'
												<option>'.$studygroup.'</option>';
											}
										}
										;
									echo
									'
									<select>
								</p2>';
							$stmt = $db->query('SELECT * FROM groups
								left join person on groups.admin = person.id_person
								WHERE person.id_person='.$_SESSION['id'].' GROUP BY person.id_person');
							echo	
							'
							</div>

							<div class="column small-4 medium-4 large-4">
								<p2>Руководитель 
									<select class="group-select" name="fio"; style="width:57%">';
										$row = $stmt -> fetch();
										$fio = $row['lastname'] .' '. $row['name'] .' '. $row['fathername'];
										echo '<option selected>'.$fio.'</option>';	
									echo
									'
									</select>
								</p2>
							</div>
			
							<div class="column small-2 medium-2 large-2">
								<button class="button" type="submit"; name="vibor" >Выбрать</button>
							</div>
						</div>
			</form>
		
			<table class="linkRow">
				<thead>
					<tr >
						<th>Группа</th>
						<th>Курс</th>
						<th>Специальность</th>
						<th>Руководитель</th>
						<th>Число студентов с утвержденной практикой</th>
					</tr>
				</thead>
				<tbody>';
					$stmt = $db->query('SELECT *
					FROM groups
					left join person on groups.admin = person.id_person
					left join request on person.id_person = request.id_stud
					order by studygroup
					');
					while ($row = $stmt->fetch())
					{
					$schet = 0;
					$schetgrupp = 0;
					$idg = $row['id_group'];
					$fio = $row['lastname'] .' '. $row['name'] .' '. $row['fathername'];
					echo'
					<tr  data-href="group_students_admin.php?id='.$idg.'" onClick="gotolink(this)">';
					$admin = $row['admin'];
					$course = $row['course'];
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
						echo'
						<td>'.$fio.'</td>';
						$stm = $db->query('SELECT *
						FROM student
						left join request on student.id = request.id_stud
						');
						while ($row = $stm->fetch())
						{ $adagr = $row['admin_agree'];
						$studygrou = $row['studygroup'];
						if ($studygrou == $idg) {
							$schetgrupp = $schetgrupp + 1;
							if ($adagr == 1 ) {
							$schet = $schet + 1;
							};
							};}
						echo'
						<td>'.$schet.' из '.$schetgrupp.'</td>';
					echo '
						</tr>';}
						};
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
	