<?php include('search.php');?>

<body>
	<!--Поисковая строка+название+кнопка входа-->
	
	<!--Меню-->
	<?php include('menu.php');?>
		
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; height:100%">
		<!--Меню-->
		
		<?php
		//$stmt = $db->query('SELECT * FROM resume'); ДЛЯ ОДНОЙ ТАБЛИЦЫ
		//$stmt = $db->query('SELECT * FROM resume  INNER JOIN student ON resume.id_stud = student.id_stud'); ДЛЯ ДВУХ ТАБЛИЦ
		$stmt = $db->query('SELECT * 
			FROM resume 
			LEFT JOIN person ON resume.id_stud = person.id_person 
			LEFT JOIN student ON resume.id_stud = student.id
			LEFT JOIN groups ON student.studygroup = groups.id_group
		');
		while ($row = $stmt->fetch())
		{
		$skills=$row['skills'];//Навыки
		$experience=$row['experience'];//Опыт работы
		$group_student=$row['studygroup'];//Группа   birthdate
		$name_sudent=$row['lastname'];//ФИО студента
		$name_sudent.=' ' . $row['name'];
		$name_sudent.=' ' . $row['fathername'];
		
		
		$first_date='01.01.01';
		$last_date='15.01.01';
		
		
		
		
		
		echo
		'
		<div class="column small-6 medium-6 large-6" >
		<div class="row" id="trunk">
		<div class="column small-4 medium-4 large-4" style="padding:10px; " >
		<br>
		<p4>от '.$first_date.'</p4>
		<br><p4>до '.$last_date.'</p4>
		</div>
		<div class="column small-8 medium-8 large-8" style="padding:10px;">
		<p1>'.$name_sudent.'</p1>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;">
		<p2>'.$group_student.'</p2>
		<br><p3>Опыт: </p3>
		<br><p3>'.$experience.'</p3>
		<br>
		<p3>Навыки:</p3>
		<br><p3>'.$skills.'</p3>
		';
		if ($role=="RMPT"){
			echo'
			<br>
			 <button type="submit">Пригласить</button>
			';
		}
		echo'
		</div>
		</div>
		</div>
		';
		}
		?>
	</div>
</body>	
	