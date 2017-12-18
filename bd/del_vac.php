<?php
	session_start();
	include('../db.php');
	
	if(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"])>0 && is_numeric($_POST["recordToDelete"]))
	{//do we have a delete request? $_POST["recordToDelete"]

    // очищаем значение переменной, PHP фильтр FILTER_SANITIZE_NUMBER_INT
    // Удаляет все символы, кроме цифр и знаков плюса и минуса

    $idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

    $stm = $db->prepare('DELETE FROM vacancy WHERE id_vac=?');
	$stm -> execute([$idToDelete]);

}
?>


