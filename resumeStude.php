<?php include('search.php');?>
<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<?php
	
	if(isset($_POST['update_resume']))
	{
		$id = $_POST['id_stud'];
		$skills =$_POST['skills'];
		$experience =$_POST['experience'];
		$additional =$_POST['additional'];
		$group_student = $_POST['group_student_reset'];
		$studygroup=$_POST['group_student'];
		$FIO=$_POST['name_sudent'];
		
		
		$lastname=substr($FIO, 0, strpos($FIO, " "));
		$FIO= substr(strstr($FIO, ' '), 1, strlen($FIO));
		$name=substr($FIO, 0, strpos($FIO, " "));
		$FIO= substr(strstr($FIO, ' '), 1, strlen($FIO));
		$fathername=$FIO;

		
		//Заменяю данные в таблице RESUME, осталось GROUP, PERSON, 
		$sql = "UPDATE resume 
			SET resume.skills = '$skills',
			resume.experience = '$experience',
			resume.additional = '$additional'
			WHERE resume.id_stud = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		$sql = "UPDATE person
			SET person.lastname = '$lastname',
			person.name = '$name',
			person.fathername = '$fathername'
			WHERE person.id_person = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		$sql = "SELECT groups.id_group FROM groups
			WHERE groups.studygroup = CASE WHEN '$studygroup' <> '' THEN '$studygroup' ELSE groups.studygroup END
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) {
			$id_group= $row['id_group'];
		}
			$sql = "UPDATE student
			SET student.studygroup = '$id_group'
			WHERE student.id = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
	}
	
	if(isset($_POST['add_resume']))
	{
		
	}
	?>
	<div class="row" style="background:#D4D4D3;">
		<?php
			$stmt = $db->query('SELECT * FROM resume 
			LEFT JOIN person ON resume.id_stud = person.id_person 
			LEFT JOIN student ON resume.id_stud = student.id
			LEFT JOIN groups ON student.studygroup = groups.id_group WHERE person.username = "'.$_SESSION['login'].'"');
			
		
			$row = $stmt->fetch();
			$id=$row['id'];
			$skills=$row['skills'];
			$experience=$row['experience'];
			$additional=$row['additional'];//Опыт работы
			$group_student=$row['studygroup'];//Группа   birthdate
			$name_sudent=$row['lastname'];//ФИО студента
			$name_sudent.=' ' . $row['name'];
			$name_sudent.=' ' . $row['fathername'];
			echo
			'
				<div class="column small-12 medium-12 large-12">
					<div class="row" style="padding:5px; margin:5px;">
					
						<div class="column small-6 medium-6 large-6" style="background:none; padding:10px; margin-left:25%">
							<p5>Резюме</p5>
							<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
							<form action="resumeStude.php" method="POST" enctype="multipart/form-data" id="resumeStude">
								<input  type="hidden" value="'.$id.'" name="id_stud"></input>
								<input  type="hidden" value="'.$group_student_reset.'" name="group_student_reset"></input>
								<input class="rectangle" style=" "name="name_sudent" required placeholder="ФИО" value="'.$name_sudent.'" type="text" style="width:80%" ></input>
								
								<!--Выпадающий список групп-->
								<select class="rectangle" style="width:80%; " name="group_student">
								';	
									//Запрос всех неповторяющийхся элементов столбца name таблицы groups
									$stmt = $db->query('SELECT distinct `studygroup` FROM `groups` ');
									echo'<option class="rectangle" value="" disabled selected>Группа</option>';
									while ($row = $stmt->fetch())
									{				
										$groups_name = $row['studygroup'];
										echo'<option class="rectangle" value="'.$groups_name.'" >'.$groups_name.'</option>';
									}
								echo'		
								</select>
								<!--Выпадающий список групп end-->
								<div class="grid-x grid-padding-x">
									<div class="large-12 cell">
										<textarea form="resumeStude" required class="rectangle" name="skills" placeholder="Профессиональные навыки" value="'.$skills.'" type="text" style="height:100px;" >'.$skills.'</textarea>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="large-12 cell">
										<textarea form="resumeStude" required class="rectangle" name="experience" placeholder="Приктический опыт" value="'.$experience.'" type="text" style="height:100px;" >'.$experience.'</textarea>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="large-12 cell">
										<textarea form="resumeStude" required class="rectangle" name="additional" placeholder="Дополнительные сведения" value="'.$additional.'" type="text" style="height:100px;" >'.$additional.'</textarea>
									</div>
								</div>
								<div style="float:left; width:18%; margin-left:0;"><button type="submit" name="update_resume" >Опубликовать</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			';	
		?>
	</div>
</body>	
	