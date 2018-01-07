<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>

	<div class="row" style="background:#D4D4D3; height:100%">
		
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
						<hr class="orange_line">
						<p2><? echo $group_student ?></p2>
						<br><p3>Опыт: </p3>
						<br><p3><? echo $experience ?></p3>
						<br>
						<p3>Навыки:</p3>
						<br><p3><? echo $skills ?></p3>
						<?
						if($role=='pterodactyl') { 
							$vac = $db->query('SELECT id_vac, about FROM vacancy WHERE id_pter = '.$_SESSION['id']);

							$stm = $db->prepare("SELECT id_stud FROM request WHERE id_stud=? AND (admin_agree=1 OR id_vac IN (SELECT id_vac FROM vacancy WHERE id_pter=?)) ");
							$stm->execute(array($id, $_SESSION['id']));
							$res = $stm->fetch();

							?>
							<br>
							<button name="<? echo $id.'submit' ?>" id="<? echo $id.$name_student /*в ид записываем ид студента и его имя*/?>" iddiv="box_invite" class="popup" type="submit" <? if ($res) {?> disabled <?}?> >Пригласить</button>
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
		<span style="padding:2%;">Приглашение</span>
		<div>
			<input class="rectangle" type="text" name="student" readonly> 
			<select class="rectangle-select" required>
			    <option value="" id="select-none" selected disabled hidden>Вакансия</option>
			    <? while ($v = $vac->fetch()) { ?>
			    	<option name="vacancy" id="<? echo $v['id_vac']?>"><? echo $v['about'] ?></option>
			    <? } ?>
			</select>
		</div>
		<div class="row" style="float:right"><button type="submit" >Отправить</button></div>
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