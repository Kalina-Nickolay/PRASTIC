<?session_start();
	$role = $_SESSION['role'];
	$idr = $_GET["idr"];
	include('db.php'); //подключение к БД
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--Заголовок сайта-->
	<title>Практика ДВФУ</title>
	<link rel="stylesheet" href="css/style.css">
	<!--Стили скачанного меню сайта-->
	<link rel="stylesheet" href="css/main_menu.css" type="text/css">
	<!--Стили foundation для разметки и стандартных элементов-->
	<link rel="stylesheet" href="css/foundation.css">
	<!--Основные стили на сайте--> 
	<link rel="stylesheet" href="css/app.css">
	<!--Стили для главного меню--> 
	<link rel="stylesheet" href="css/main_menu.css">
</head>

<script src="js/jquery-3.2.1.min.js"></script>

<div class="row" style="margin-top:10px;">
		<div class="column small-2 medium-2 large-2" style="background:WHITE">
			<p style="font-weight:bold; font-size:x-large;">Практики</p>
		</div>
		<div class="column small-8 medium-8 large-8" style="background:WHITE">
			<form id="search-form" action="bd/vac_search.php" method="GET">
				<div style="float:left; width:80%">
			  		<input class="rectangle1" name="search" placeholder="Найти вакансию" type="search" ></input>
			  	</div>
				<div style="float:left; width:18%; margin-left:2%;">
					<button name="search-button" type="submit" >Найти</button>
				</div>
			</form>
		</div>
		<div class="column small-2 medium-2 large-2" style="background:WHITE; float:right;">
			  
			<?php
			if($role){
				echo
				'<form action="bd/logout.php" method="POST">
					<button type="submit" style="float:right; background:white; color: black;">Выйти</button>
				</form>' ;
			} else
				echo '<button type="submit" class="popup" iddiv="box_1" style="float:right; background:white; color: black;">Войти</button>';
			?>
			
		</div>
	</div>	
 
<!-- Всплывающее окно авторизации (форма и скрипт) -->
<div id="myfond_gris" opendiv=""></div>
<div id="box_1" class="mymagicoverbox_fenetre">
	<form name="fr" action="bd/login.php" method="post" action="">
		<span style="padding:2%;">Вход</span>
		<div>
			<input name="login" type="text" class="authorize" placeholder="Логин" required>
			<input name="pass" type="password" class="authorize" placeholder="Пароль" required>
		</div>
		<div class="row"><span><a href="registration.php" style="float:left; color:#7E8AA0; font-size:16px">Регистрация</a></span></div>
		<div class="row" style="float:right"><button type="submit" >Войти</button></div>
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