<?php include('search.php');?>


	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		
		<?php
		$id_vac=$_GET['id'];
		$pret = 0;
		$stmt = $db->query('SELECT vacancy.id_vac as id_vac, vacancy.about as ab, pterodactyl.name as name, vacancy.practic as practic, vacancy.invalid as invalid, vacancy.privet as privet, pterodactyl.sphere as sphere, vacancy.places as places, request.id_vac as is_rvac, request.stud_agree as sagr, request.pter_agree as pagr,  vacancy.start as start, vacancy.finish as finish
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
		$name_vacancy=$row['ab'];//Название вокансии:
		$name_company=$row['name'];//Название компании:
		$student_dities=$row['practic'];//Обязанности:
		$student_welcome=$row['privet'];//Приветствуется:
		$pterodactyl_sphere=$row['sphere'];//вид деятельности:
		$for_invalids=$row['invalid'];
		$places=$row['places'];
		$id_rvac=$row['id_rvac'];
		$sagr=$row['sagr'];
		$pagr=$row['pagr'];
		if ($sagr==1 and $pagr==1){
		$pret = $pret + 1;
		}
		$places = $places - $pret;
		
		}
		}	
		?>	
		
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-2 medium-2 large-2" style="background:white; padding:10px;">
				
				
				</div>
			<div class="column small-10 medium-10 large-10" style="background:white; padding:10px; padding-right:60px;">
			<p5><? echo $name_vacancy ?></p5>
			<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:50%">
			<div style="float: left;"><p4><? echo $name_company ?></p4></div>

			<div style="float: right;"><p4 align="right">Осталось мест:</p4>
				<p4><? echo $places ?></p4>
				<p4>Претендентов:</p4>
				<p4><? echo $pret ?></p4>
				<p4>Период:</p4>
				<p4><? echo $first_date.' - '.$last_date ?></p4>
			</div>

			<br>
			<p4>Описание: </p4>
			<br>
			<p3><? echo $student_dities ?></p3>
			<br>
			<p4>Вид деятельности:</p4>
			<br>
			<p3><? echo $pterodactyl_sphere ?></p3>
			<br>
			<p4>Условия для инвалидов:</p4>
			<br>
			<p3><? echo $for_invalids ?></p3>
			<br>

			<?
			$stm = $db->prepare("SELECT id_vac FROM request WHERE id_vac=? AND id_stud=?");
			$stm->execute(array($id_vac, $_SESSION['id']));
			$res = $stm->fetch();

			if ($_SESSION['role']=='student') {
				?> 
				<div style="float: right;">
					<button iddiv="box_request" id="popup_request" class="button primary" type="submit" align="right" <? if ($res) {?> disabled <? }?> >Подать</button>
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
		<span style="padding:2%;">Заявка</span>
		<div>
			<input name="name_vac" type="text" value="<? echo $name_vacancy ?>" readonly>
		</div>
		<div class="row" style="float:right"><button type="submit" id="send">Отправить</button></div>
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
            "id_stud": <?php echo $_SESSION['id'] ?>,
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
	