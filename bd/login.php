<?php
	session_start();
	
	include('../db.php'); //подключение к БД
	
	$login = $_POST['login'];
	$pswd = $_POST['pass'];
	
	//проверка логина
	$stm = $db->prepare('SELECT id_person, username, password FROM person WHERE username=?');
	$stm->execute([$login]);
	$res = $stm->fetch();
	if (!$res)
	{
		?> <script>
			alert("Неверный логин");
		</script> <?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancy.php'></head></html>");
	} 
	else {
		if ($res['password']!=md5($pswd)) {
			?> <script>
				alert("Неверный пароль");
			</script> <?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancy.php'></head></html>");
		}
		else {
			$_SESSION['login']=$res['username']; 
			$_SESSION['password']=$res['password']; 
			$_SESSION['id']=$res['id_person'];
			
			$role='';
			$tables = array('admin','student','pterodactyl');
			
			foreach ($tables as $nt) {
				$stmt = $db->query('SELECT id FROM '.$nt.' WHERE id = '.$_SESSION['id']); //БАЙДА КАКАЯ-ТО :СССС
				$res = $stmt->fetch();
				if ($res)				// и здесь тоже :сссс 
					$role = $nt;
			}
			$_SESSION['role']=$role;
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancy.php'></head></html>");
		}
	}
?>


