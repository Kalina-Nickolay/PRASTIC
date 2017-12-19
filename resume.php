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
		$id=$row['id_stud'];
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
		if($role=='pterodactyl')
		{
			echo'
			<br>
			 <button iddiv="box_invite" class="popup" type="submit">Пригласить</button>
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
	
<!-- Всплывающее окно авторизации (форма и скрипт) -->
<div id="myfond_gris" opendiv=""></div>
<div id="box_invite" class="mymagicoverbox_fenetre">
	<form name="fr" action="bd/login.php" method="post" action="">
		<span style="padding:2%;">Приглашение</span>
		<div>
			<input name="stud" type="text"> <!-- ЗДЕСЬ ДОЛЖНО БЫТЬ ФИО СТУДЕНТА // ЗАПОЛНЯЕТСЯ АВТОМАТИЧЕСКИ-->
			<input name="vac" type="text">  <!-- ЗДЕСЬ ДОЛЖЕН БЫТЬ ВЫПАДАЮЩИЙ СПИСОК -> ВАКАНСИИ ТОЛЬКО ТОГО ПРЕДПРИЯТИЯ, КОТОРОЕ ОТПРАВЛЯЕТ ПРИГЛАШЕНИЕ (ТОЛЬКО ТОГО, КТО АВТОРИЗОВАН)-->
		</div>
		<div class="row" style="float:right"><button type="submit" >Отправить</button></div>
	</form>
</div>

<script>
$(document).ready(function(){
	$(".popup").click(function(){
		$('#myfond_gris').fadeIn(300);
		var iddiv = $(this).attr("iddiv");
		$('#'+iddiv).fadeIn(300);
		$('#myfond_gris').attr('opendiv',iddiv);
		return false;
	});
	 
	$('#myfond_gris, .mymagicoverbox_fermer').click(function(){
		var iddiv = $("#myfond_gris").attr('opendiv');
		$('#myfond_gris').fadeOut(300);
		$('#'+iddiv).fadeOut(300);
	});
});
</script>