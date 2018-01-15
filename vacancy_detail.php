<?php include('search.php');?>


	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height: 100%">
		
		<?php
		$id_vac=$_GET['id'];
		$pret = 0;
		$accepted = 0;
		$stmt = $db->query('SELECT vacancy.id_vac as id_vac, 
								   vacancy.about as ab, 
								   pterodactyl.name as name, 
								   vacancy.practic as practic, 
								   vacancy.invalid as invalid, 
								   vacancy.privet as privet, 
								   vacancy.places as places, 
								   request.id_vac as is_rvac, 
								   request.stud_agree as sagr, 
								   request.pter_agree as pagr,  
								   request.admin_agree as aagr,
								   vacancy.start as start, 
								   vacancy.finish as finish
			FROM vacancy 
			left JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id
			left JOIN request ON request.id_vac = vacancy.id_vac
		');
		
		
		while ($row = $stmt->fetch())
		{
			//$id_vac =$row['id_vac'];
			//$file = $_SERVER['REQUEST_URI'];
			//$file = substr($file, 23);
			
			$ideee=$row['id_vac'];
			if ($id_vac == $ideee) {
				
				$first_date=$row['start'];
				$last_date=$row['finish'];
				$name_vacancy=$row['ab'];//Название вакансии:
				$name_company=$row['name'];//Название компании:
				$student_dities=$row['practic'];//вид деятельности
				$student_welcome=$row['privet'];//описание:
				$for_invalids=$row['invalid'];// условия для инвалидов
				$places=$row['places'];
				$id_rvac=$row['id_rvac'];
				$sagr=$row['sagr'];
				$pagr=$row['pagr'];
				$aagr=$row['aagr'];
				if ($sagr==1 and $pagr==1 and $aagr==NULL) // если есть студенты, которые отправили заявку на утверждение, но пока ещё не получили ответ -> претендент
					$pret++;
				if ($sagr==1 and $pagr==1 and $aagr==1) // кол-во студентов, у которых уже одобрена заявка на данную вакансию -> отнимаем от кол-ва мест всего
					$accepted++;
				$places = $places - $accepted;
			
			}
		}	
		?>	
		
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-12 medium-12 large-12" style="background:#fafafa; padding:2% 5%;">
				<p5><? echo $name_vacancy ?></p5>
				<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:50%">
				<div style="float: left;"><b><p3><? echo $name_company ?></p3></b></div>

				<div >
					<b>
						<div class="vac-up">
							<p3>Период:</p3>
							<p3><? echo date_create($first_date)->Format("d.m.Y").'-'.date_create($last_date)->Format("d.m.Y")?></p3>
						</div>
						<div class="vac-up">
							<p3>Претендентов:</p3>
							<p3><? echo $pret ?></p3>
						</div>
						<div class="vac-up">
							<p3 align="right">Осталось мест:</p3>
							<p3><? echo $places ?></p3>
						</div>
						
						
					</b>
				</div>

				<br>

				<? if ($student_welcome !="") { ?>
					<div class="vac-description">
						<b><p3>Описание: </p3></b>
						<p3><? echo $student_welcome ?></p3><br>
					</div>
				<?}
				if ($student_dities!="") { ?>
					<div class="vac-description">
						<b><p3>Вид деятельности:</p3></b>
						<p3><? echo $student_dities ?></p3><br>
					</div>
				<?}
				if ($for_invalids!="") { ?>
					<div class="vac-description">
						<b><p3>Условия для инвалидов:</p3></b>
						<p3><? echo $for_invalids ?></p3><br>
					</div>
				<?}

				$stm = $db->prepare("SELECT id_vac FROM request WHERE id_stud=? AND (id_vac=? OR (stud_agree=1 AND pter_agree=1 AND admin_agree=1))");
				$stm->execute(array($_SESSION['id'],$id_vac));
				$res = $stm->fetch();

				if ($_SESSION['role']=='student') {
					?> 
					<div style="float: right;">
						<button iddiv="box_request" id="popup_request" class="button primary" type="submit" align="right" <? if ($res || $places==0) {?> disabled <?}?>>Подать</button>
					</div> <?
				} ?>

				</div>
			
			</div>
		
		</div>
	</div>

<!-- Всплывающее окно подачи заявки (форма и скрипт) -->
<div id="myfond_gris" opendiv=""></div>
<div id="box_request" class="mymagicoverbox_fenetre">
	<form id="send_request" action="" method="POST">
		<span class="popup-caption">Заявка</span>
		<div>
			<input name="name_vac" class="rectangle" type="text" value="<? echo $name_vacancy ?>" readonly>
		</div>
		<div class="row" style="float:right"><button class="popup-button" type="submit" id="send">Отправить</button></div>
	</form>
</div>

<script>
$(document).ready(function(){
	$("#popup_request").click(function(){
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

	//отправка заявки
    $("#send_request").submit(function() {

        var formData = {
            "id_vac": <?php echo $id_vac ?>, 
            "id_stud": <?php if (isset($_SESSION['id'])) echo $_SESSION['id'] ?>,
            "sender": "<?php echo $_SESSION['role'] ?>"
        };
				
        jQuery.ajax({
        	url: "bd/out_request.php", 
            type: "POST", 
            data: 'jsonData=' + JSON.stringify(formData), 
            success:function(response){
            	$("#popup_request").attr('disabled',true);
            	
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
	