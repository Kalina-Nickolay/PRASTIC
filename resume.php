<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>

	<div class="row" style="background:#D4D4D3; min-height: 100%">
		
		<?php
		$stmt = $db->query('SELECT * 
			FROM resume 
			LEFT JOIN person ON resume.id_stud = person.id_person 
			LEFT JOIN student ON resume.id_stud = student.id
			LEFT JOIN groups ON student.studygroup = groups.id_group
		');

		while ($row = $stmt->fetch()) {
			$id=$row['id_stud'];
			$skills=$row['skills'];//Навыки
			$experience=$row['experience'];//Опыт работы
			$group_student=$row['studygroup'];//Группа   birthdate
			$name_student=$row['lastname'];//ФИО студента
			$name_student.=' ' . $row['name'];
			$name_student.=' ' . $row['fathername'];
			
			?>

			<div class="column small-6 medium-6 large-6" >
				<div id="trunk">
					<div style="padding:10px;">
						<p1><? echo $name_student ?></p1>
						<hr class="orange-line">
						<p2><? echo $group_student ?></p2>
						<br><p3>Опыт: </p3>
						<br><p3><? echo $experience ?></p3>
						<br>
						<p3>Навыки:</p3>
						<br><p3><? echo $skills ?></p3>
						<?
						if($role=='pterodactyl') { 

							//это для списка вакансий для приглашения - в выпадающем списке выводятся вакансии, на которые ещё есть свободные места (не утверждённые админом)
							$vac = $db->query("SELECT vacancy.id_vac AS id_vac, vacancy.about AS about FROM vacancy WHERE vacancy.id_pter = ".$_SESSION['id']." AND vacancy.places>(SELECT COUNT(request.id_vac) FROM request WHERE request.admin_agree=1 AND vacancy.id_vac=request.id_vac)");
							$n_v = $vac -> rowCount(); // узнаём кол-во вакансий, на которые ещё есть места

							// проверяем, есть ли у данного студента утверждённое место практики и отправлял ли уже практикодатель этому студенту своё приглашение
							$stm = $db->prepare("SELECT id_stud FROM request WHERE id_stud=? AND (admin_agree=1 OR id_vac IN (SELECT id_vac FROM vacancy WHERE id_pter=?)) "); 
							$stm->execute(array($id, $_SESSION['id']));
							$res = $stm->fetch();

							?>
							<br>
							<button name="<? echo $id.'submit' ?>" 
									id="<? echo $id.$name_student /*в ид записываем ид студента и его имя*/?>" 
									iddiv="box_invite" class="popup" type="submit" 
									<? /**/if ($res || $n_v==0) {?> disabled <?}?> /*если у практикодателя нет мест или у студента уже есть утв.место практики, то кнопка "пригласить" недоступна*/ >Пригласить</button>
						<? } ?>
					</div>
				</div>
			</div>
		<? } ?>
	</div>
</body>	
	
<!-- Всплывающее окно авторизации (форма и скрипт) -->
<div id="myfond_gris" opendiv=""></div>
<div id="box_invite" class="mymagicoverbox_fenetre">
	<form id="send_invite"  method="post" action="bd/out_request.php">
		<span class="popup-caption">Приглашение</span>
		<div>
			<input class="rectangle" type="text" name="student" readonly> 
			<select class="rectangle-select" required>
			    <option value="" id="select-none" selected disabled hidden>Вакансия</option>
			    <? while ($v = $vac->fetch()) { ?>
			    	<option name="vacancy" id="<? echo $v['id_vac']?>"><? echo $v['about'] ?></option>
			    <? } ?>
			</select>
		</div>
		<div class="row" style="float:right"><button class="popup-button" type="submit" >Отправить</button></div>
	</form>
</div>

<script>
$(document).ready(function(){

	$(".popup").click(function(){
		$('#select-none').prop('selected',true); //опция "вакансия" выбрана
		$('#myfond_gris').fadeIn(300);
		var iddiv = $(this).attr("iddiv");
		$('#'+iddiv).fadeIn(300);
		$('#myfond_gris').attr('opendiv',iddiv);

		var str = $(this).attr("id");
		var name = str.replace(/\d/g, ''); //вычленяем имя студента
		var num_id = parseInt(str,10); // и его ид // строка и основание счисления
		$("[name = student]").attr('id', num_id);
		$("[name = student]").attr('value', name); // записываем фио студена в появившийся инпут

		return false;
	});
	 
	$('#myfond_gris, .mymagicoverbox_fermer').click(function(){
		var iddiv = $("#myfond_gris").attr('opendiv');
		$('#myfond_gris').fadeOut(300);
		$('#'+iddiv).fadeOut(300);
	});


	//отправка заявки
    $("#send_invite").submit(function() {
    	var n_st = $("[name = student]").attr('value');

        var formData = {
            "id_vac": $("[name = vacancy]").attr('id'),
            "id_stud": $("[name = student]").attr('id'), 
            "sender": "<?php echo $role ?>",
        };
				
        jQuery.ajax({
        	url: "bd/out_request.php", 
            type: "POST", 
            data: 'jsonData=' + JSON.stringify(formData), 
            success:function(response){
            	var n = $("[name = student]").attr('id')+'submit';
            	$("[name = "+n+"]").attr('disabled',true);
            	
            	var iddiv = $("#myfond_gris").attr('opendiv');
				$('#myfond_gris').fadeOut(300);
				$('#'+iddiv).fadeOut(300);
				
            }
            /*,
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }*/
        });
        return false;
    });
});
</script>