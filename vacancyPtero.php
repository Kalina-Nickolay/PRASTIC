<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		
	<?php
		$id = $_SESSION['id'];
		$stmt = $db->query('SELECT vacancy.id_vac as id_vac, vacancy.about as ab, pterodactyl.name as name, vacancy.practic as practic, vacancy.privet as privet, vacancy.start as start, vacancy.finish as finish, vacancy.logo as logo
			FROM vacancy INNER JOIN pterodactyl ON vacancy.id_pter=pterodactyl.id WHERE vacancy.id_pter = '.$id);
		while ($row = $stmt->fetch()) {
				
		$first_date=$row['start'];
		$last_date=$row['finish'];
		
		$id_vac=$row['id_vac'];
		$name_vacancy=$row['ab'];//Название вакансии:
		$name_company=$row['name'];//Название компании:
		$student_dities=$row['practic'];//Обязанности:
		$student_welcome=$row['privet'];//Приветствуется:

		$stm = $db->prepare("SELECT id_vac FROM request WHERE id_vac=? AND stud_agree=1 AND pter_agree=1 AND admin_agree=1");
		$stm->execute([$id_vac]);
		$res = $stm->fetch();

		?>
		<div class="column small-6 medium-6 large-6" id="vac_<? echo $id_vac?>">
			<div class="row" id="trunk" >
				<div class="column small-4 medium-4 large-4" style="display: block; padding:10px;"><br>
					
					<?
					if ($row['logo'] !='') {
						?><img src="files/logo/<? echo $_SESSION['id'] ?>/<? echo $row['logo']?>"></img><br><?
					}
					?>
				</div>
			
				<div class="column small-8 medium-8 large-8" style="padding:10px;">
					<p1><a style="color:black;"><? echo $name_vacancy ?></a></p1>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;">
					<p2><? echo $name_company ?></p2>
					<br>
					<p3>Обязанности: </p3>
					<br><p3><? echo $student_dities ?></p3>
					<br>
					<p3>Приветствуется:</p3>
					<br><p3><? echo $student_welcome ?></p3>
					
						<div class="buttonGroup">
							<button data-href="vacancyEdit.php?id_vac=<? echo $id_vac?>" onClick="gotolink(this)">Изменить</button>
							<button id="<? echo $id_vac?>" class="del_button" <? if ($res) {?> disabled <? } ?> >Удалить</button>
						</div>
				</div>
				
			</div>
		</div>
		
		<?
		
		}

		?>
		
		<a href="vacancyAdd.php" class="column small-6 medium-6 large-6">
			<div class="row" id="trunk">
				<div class="column small-12 medium-12 large-12" style="text-align: center">
					<img src="images/on.png" width="150" style="display: block; margin-top: 30; margin-left: auto; margin-right: auto"></img>
					<p4>Добавить вакансию</p4>
				</div>
			</div>
		</a>
		
	</div>
</body>	
	
		
<script>


function gotolink(event) {
	document.location.href = event.getAttribute('data-href');
}

$(document).ready(function() {

	//удаление вакансии
    $(".del_button").click(function(e) {
        e.preventDefault();
        var clickedID = this.id; 
        var myData = 'recordToDelete='+ clickedID;

        jQuery.ajax({
            type: "POST", 
            url: "bd/del_vac.php", 
            dataType:"text",
            data:myData, //post переменные
            success:function(response){
            	$('#vac_'+clickedID).fadeOut(0);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    });
});


</script>