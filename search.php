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

<div class="row" style="background:#FAFAFA">
		<div class="column small-2 medium-2 large-2" >
			<p id="site_caption">Практики</p>
		</div>
		<form class="column small-9 medium-9 large-9" id="search-form" action="vacancy.php" method="GET">
			<div class="row">
				<div class="column small-9 medium-9 large-9" >
			  		<input class="rectangle" name="search" placeholder="Найти вакансию" type="search" style="font-size: 20px; height:34px; margin:10 0"></input>
			  	</div>
				<div class="column small-3 medium-3 large-3" >
					<button class="button expanded" name="search-button" type="submit" style="font-size: 20px; margin:10px 0">Найти</button>
				</div>
			</div>
		</form>
		<div class="column small-1 medium-1 large-1" style="float:right;">
			  
			<?php
			if($role){
				echo
				'<form action="bd/logout.php" method="POST">
					<button type="submit" class="clear button" id="cab_button">Выйти</button>
				</form>' ;
			} else
				echo '<button type="submit" class="popup clear button" iddiv="box_1" id="cab_button">Войти</button>';
			?>
			
		</div>
	</div>	
 
<!-- Всплывающее окно авторизации (форма и скрипт) -->
<div id="myfond_gris" opendiv=""></div>
<div id="box_1" class="mymagicoverbox_fenetre">
	<form name="fr" action="bd/login.php" method="post" action="">
		<span style="padding:2%;">Вход</span>
		<div>
			<input name="login" type="text" class="authorize rectangle" placeholder="Логин" required>
			<input name="pass" type="password" class="authorize rectangle" placeholder="Пароль" required>
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