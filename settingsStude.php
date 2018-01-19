<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
<?php

if (isset($_SESSION['role']) && $_SESSION['role']=="student") {
	if(isset($_POST['update_stude']))
	{
		$id=$_POST['id_stud'];
		$last_name =$_POST['last_name'];
		$first_name = $_POST['first_name'];
		$father_name = $_POST['father_name'];
		
		$number_telephone = $_POST['number_telephone'];
		$Email = $_POST['Email'];
		$last_password = $_POST['last_password'];//На случай если пароль не меняется
		$new_password = $_POST['new_password'];
		$double_new_password =  $_POST['double_new_password'];
		$study_group = $_POST['study_group'];
		$course = $_POST['course'];
		$speciality = $_POST['speciality'];
		$birth_date = $_POST['birth_date'];
		$invalid = $_POST['invalid'];
		
		$stmt = $db->query('SELECT * FROM person 
		LEFT JOIN student ON person.id_person = student.id
		LEFT JOIN groups ON student.studygroup = groups.id_group WHERE person.username = "'.$_SESSION['login'].'"');
		$row = $stmt->fetch();
		$report=$row['report'];
		$diary=$row['diary'];
		$feedback=$row['feedback'];
		$direction=$row['direction'];
		
		
		if (is_uploaded_file($_FILES['report_name']['tmp_name'])) 
		{
			$report=($_FILES['report_name']['name']);
			$uploaddir = 'files/students/'.$_SESSION['id'].'/';
			if (file_exists($uploaddir)) {
			   $uploadfile = $uploaddir.basename($_FILES['report_name']['name']);
			   copy($_FILES['report_name']['tmp_name'], $uploadfile);
			} else {
			   mkdir($uploaddir, 0700, true);
			   $uploadfile = $uploaddir.basename($_FILES['report_name']['name']);
			   copy($_FILES['report_name']['tmp_name'], $uploadfile);
			}
		}
		
		if (is_uploaded_file($_FILES['diary_name']['tmp_name'])) 
		{
			$diary=($_FILES['diary_name']['name']);
			$uploaddir = 'files/students/'.$_SESSION['id'].'/';
			if (file_exists($uploaddir)) {
			   $uploadfile = $uploaddir.basename($_FILES['diary_name']['name']);
			   copy($_FILES['diary_name']['tmp_name'], $uploadfile);
			} else {
			   mkdir($uploaddir, 0700, true);
			   $uploadfile = $uploaddir.basename($_FILES['diary_name']['name']);
			   copy($_FILES['diary_name']['tmp_name'], $uploadfile);
			}
		}
		
			if (is_uploaded_file($_FILES['feedback_name']['tmp_name'])) 
		{
				$feedback=($_FILES['feedback_name']['name']);
			$uploaddir = 'files/students/'.$_SESSION['id'].'/';
			if (file_exists($uploaddir)) {
			   $uploadfile = $uploaddir.basename($_FILES['feedback_name']['name']);
			   copy($_FILES['feedback_name']['tmp_name'], $uploadfile);
			} else {
			   mkdir($uploaddir, 0700, true);
			   $uploadfile = $uploaddir.basename($_FILES['feedback_name']['name']);
			   copy($_FILES['feedback_name']['tmp_name'], $uploadfile);
			}
		}
		
			if (is_uploaded_file($_FILES['direction_name']['tmp_name'])) 
		{
			$direction=($_FILES['direction_name']['name']);
			$uploaddir = 'files/students/'.$_SESSION['id'].'/';
			if (file_exists($uploaddir)) {
			   $uploadfile = $uploaddir.basename($_FILES['direction_name']['name']);
			   copy($_FILES['direction_name']['tmp_name'], $uploadfile);
			} else {
			   mkdir($uploaddir, 0700, true);
			   $uploadfile = $uploaddir.basename($_FILES['direction_name']['name']);
			   copy($_FILES['direction_name']['tmp_name'], $uploadfile);
			}
		}
		
		if($new_password==$double_new_password &&  isset($new_password))
			$last_password=md5($new_password);
		
		$sql = "UPDATE person
			SET lastname = '$last_name',
			name = '$first_name',
			fathername = '$father_name',
			password = '$last_password',
			email = '$Email',
			telephone = '$number_telephone'
			WHERE id_person = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		
		
		$sql = "SELECT groups.id_group FROM groups
			WHERE groups.studygroup = CASE WHEN '$study_group' <> '' THEN '$study_group' ELSE groups.studygroup END
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row) {
			$id_group= $row['id_group'];
		}
			$sql = "UPDATE student
			SET student.studygroup = '$id_group',
			student.birthdate = '$birth_date',
			student.invalid = '$invalid',
			student.report = '$report',
			student.diary = '$diary',
			student.feedback ='$feedback',
			student.direction ='$direction'
			WHERE student.id = '$id'
		";
		$stmt = $db->prepare($sql);
		$stmt->execute();
	}
?>
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$stmt = $db->query('SELECT * FROM person 
		LEFT JOIN student ON person.id_person = student.id
		LEFT JOIN groups ON student.studygroup = groups.id_group WHERE person.username = "'.$_SESSION['login'].'"');
		
	
		$row = $stmt->fetch();
		
		$skills=$row['skills'];
		$experience=$row['experience'];
		$additional=$row['additional'];//Опыт работы
		$group_student=$row['studygroup'];//Группа   birthdate
		$name_sudent=$row['lastname'];//ФИО студента
		$name_sudent.=' ' . $row['name'];
		$name_sudent.=' ' . $row['fathername'];
		
		$id=$row['id_person'];
		$last_name =$row['lastname'];
		$first_name = $row['name'];
		$father_name = $row['fathername'];
		
		$number_telephone = $row['telephone'];
		$Email = $row['email'];
		$last_password = $row['password'];//На случай если пароль не меняется
		$new_password = '';
		$double_new_password = '';
		$study_group = $row['studygroup'];
		$course = $row['course'];
		$speciality = $row['speciality'];
		$birth_date = $row['birthdate'];
		$invalid = $row['invalid'];
		
		$report=$row['report'];
		$diary=$row['diary'];
		$feedback=$row['feedback'];
		$direction=$row['direction'];
		echo
		'
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				</div>
				
					<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
					<form action="settingsStude.php" method="POST" enctype="multipart/form-data" id="settingsStude">	
					<p5>Настройки</p5>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:80%">
					
				
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-4 medium-4 large-4"style="padding:0; margin:0;">
								<input  type="hidden" value="'.$id.'" name="id_stud"></input>
								
								<input class="rectangle" required name="last_name" placeholder="Фамилия" value="'.$last_name.'" type="text" ></input>
								
								<input class="rectangle" required name="first_name" placeholder="Имя" value="'.$first_name.'" type="text" ></input>
								
								<input class="rectangle" required name="father_name" placeholder="Отчество" value="'.$father_name.'" type="text" ></input>
								
								<input class="rectangle" required style="width:50%" name="number_telephone" placeholder="Телефон"  value="'.$number_telephone.'" type="text" ></input>
								
								<input class="rectangle" required name="Email" placeholder="Email" value="'.$Email.'" type="text" ></input>
								
								<input class="rectangle" type="hidden" required name="last_password" placeholder="last_password" value="'.$last_password.'" type="text" ></input>
								
								
								
								<input class="rectangle" name="new_password" placeholder="Новый пароль" type="password" ></input>
								
								<input class="rectangle" name="double_new_password" placeholder="Подтверждение пароля" type="password" ></input>
								
								<!-- <input class="rectangle" required name="study_group" placeholder="Группа" value="'.$study_group.'" type="text" ></input> -->
								
								<input id="course" class="rectangle" readonly name="course" placeholder="Курс" value="'.$course.'" type="text" ></input>
								
								<input id="speciality" class="rectangle" readonly name="speciality" placeholder="Специальность" value="'.$speciality.'" type="text" ></input>
								
								<!-- <input class="rectangle" required name="birth_date" placeholder="Дата рождения" value="'.$birth_date.'" type="text" ></input>-->
								
							</div>
							<div class="column small-7 medium-7 large-7" style="padding:0; padding-left:50px;margin:0;">
								
								<input class="rectangle" required style="width:40%" name="birth_date" placeholder="Дата рождения" value="'.$birth_date.'" type="text" ></input>
								 
								';
								$stmt1 = $db->query('SELECT distinct studygroup
									FROM groups
									order by studygroup			
								');
								echo
								'
									<select id="group" form="settingsStude" class="rectangle" name="study_group" placeholder="Группа" style="width:25%">
									<option>'.$study_group.'</option>
								';
								while ($row1 = $stmt1->fetch())
								{
									$study_group_1 = $row1['studygroup'];
									echo
									'
										<option>'.$study_group_1.'</option>
									';
								}
								echo'
								<textarea form="settingsStude" class="rectangle" style="height:30%" name="invalid" placeholder="Инвалидам и людям с ограниченными возможностями, написать условия для прохождения практики" value="'.$invalid.'" type="text" >'.$invalid.'</textarea>
								
							</div>
								<p5>Документы</p5>
								<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
					
								
								';
								
								if ($report)
								{
									echo
									'									
										<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
											<a href="files/students/'.$_SESSION['id'].'/'.$report.'" download>
											'.$report.'
											</a>
										</div>
										<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
											<input type="file" id="report_name" name="report_name" />
										</div>
										<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
											<p>&#10004</p>
										</div>
									';
								}
								else
								{
									echo
									'
									<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
									<p>Прикрепите отчёт о прохождении практики</p>	
									</div>
									<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
										<input type="file" id="report_name" name="report_name"/>
									</div>
									<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
										
									</div>
									';
								}
								
								if ($diary)
								{
									echo
									'									
										<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
											<a href="files/students/'.$_SESSION['id'].'/'.$diary.'" download>
											'.$diary.'
											</a>
										</div>
										<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
											<input type="file" id="diary_name" name="diary_name" />
										</div>
										<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
											<p>&#10004</p>
										</div>
									';
								}
								else
								{
									echo
									'
									<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
									<p>Прикрепите дневник прохождения практики</p>	
									</div>
									<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
										<input type="file" id="diary_name" name="diary_name"/>
									</div>
									<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
										
									</div>
									';
								}
								
								
								if ($feedback)
								{
									echo
									'									
										<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
											<a href="files/students/'.$_SESSION['id'].'/'.$feedback.'" download>
											'.$feedback.'
											</a>
										</div>
										<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
											<input type="file" id="feedback_name" name="feedback_name" />
										</div>
										<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
											<p>&#10004</p>
										</div>
									';
								}
								else
								{
									echo
									'
									<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
									<p>Прикрепите отзыв руководителя</p>	
									</div>
									<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
										<input type="file" id="feedback_name" name="feedback_name" accept="files/report"/>
									</div>
									<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
										
									</div>
									';
								}
								
								
								if ($direction)
								{
									echo
									'									
										<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
											<a href="files/students/'.$_SESSION['id'].'/'.$direction.'" download>
											'.$direction.'
											</a>
										</div>
										<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
											<input type="file" id="direction_name" name="direction_name" />
										</div>
										<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
											<p>&#10004</p>
										</div>
									';
								}
								else
								{
									echo
									'
									<div class="column small-6 medium-6 large-6" style="padding:0; margin:0;">
									<p>Прикрепите направление на практику</p>	
									</div>
									<div class="column small-5 medium-5 large-5" style="padding:0; margin:0;">
										<input type="file" id="direction_name" name="direction_name" accept="files/report"/>
									</div>
									<div class="column small-1 medium-1 large-1" style="padding:0; margin:0;">
										
									</div>
									';
								}
								
								
								echo'
								
									
						</div>
						<div style="text-align: center;">
							<div style="display: inline-block;
								height: 50px;
								line-height: 50px;
								position: relative;
								border: 1px solid white;
								padding: 0 1rem;"><button type="submit" name="update_stude" >Сохранить</button>
							</div>
						</div>
				</form>
					</div>
			</div>
		</div>
		';
		?>
	</div>
<? } else { ?>
	<div class="column small-12 medium-12 large-12" style="height: 100vh">
		<p id="no-res">Нет доступа</p>
	</div>
<?} ?>

</body>	
	
<script type="text/javascript" src="jquery-1.8.2.min.js"></script>



<script>
	$(document).ready(function(){
		// изменение значения полей направления и курса при изменении селекта с группой
		$("#group").change(function () {
			var request_data = {
	            "group":  $(this).val(), //выбранное решение практикодателя
	        };
	        $.ajax({
	            url: "bd/settings_stud.php", 
	            type: "POST", 
	            data: 'jsonData=' + JSON.stringify(request_data), 
	            success:function(response){
	            	res=JSON.parse(response);
                    $("#course").val(res.course);
                    $("#speciality").val(res.speciality);
	            }
	            /*,
	            error:function (xhr, ajaxOptions, thrownError){
	                alert(thrownError);
	            }*/
	        });
   		});
	});
</script>