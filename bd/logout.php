<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['password']);
	unset($_SESSION['id']);
	unset($_SESSION['role']);
	
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../vacancy.php'></head></html>");
?>


