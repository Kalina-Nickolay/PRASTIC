<?php
	include ("../db.php"); 
	$data = json_decode($_POST['jsonData']);

	$key = $data->acc_req;
	$id_req = explode("!", $key); // vac=0 // stud=1

	// проверяем, есть ли уже утверждённые админом заявки у этого студента
	$stm = $db -> query('SELECT id_vac FROM request WHERE admin_agree=1 AND id_stud='.$id_req[1]);
	$check = $stm -> fetch();

	if (!$check) { //если у студента пока нет утверждённой заявки
		// проверяем согласие админа и практикодателя
		$stm = $db -> query('SELECT * FROM request WHERE id_vac='.$id_req[0].' AND id_stud='.$id_req[1]);
		$res = $stm -> fetch();

		if (!$res) {
			echo "Ошибка! Данная заявка отсутствует в базе.";
		} elseif ($res['pter_agree'] != 1) //проверяем согласие практикодателя
			echo "Заявку без согласия практикодателя нельзя отправить на утверждение Вашему администратору!";
		elseif ($res['admin_agree']==NULL && $res['stud_agree']==1) // проверяем факт "отправки" этой заявки ранее
			echo "Вы уже оправили данную заявку на утверждение Вашему администратору";
		else {
			$stm = $db->query('UPDATE request SET stud_agree = 1 WHERE id_vac='.$id_req[0].' AND id_stud='.$id_req[1]);
			echo "Заявка успешно отправлена на рассмотрение Вашему администратору.";
		}
	} else 
		echo "У Вас уже есть утверждённое место практики.";


?>

