<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		
		<?php
		$idadmin=$_SESSION['id'];
			echo
			'
				<div class="column small-12 medium-12 large-12" style="height:100%;">
					<div class="row" style="padding:5px; margin:5px;">
						<div class="column small-2 medium-2 large-2" style="background:none; padding:10px;">
							';
							echo
							'
						</div>
						
						<div class="column small-10 medium-10 large-10" style="background:none; padding:10px; padding-right:60px;">
							<button style="margin-right:0; background:#E3A36F" onClick="clicke()" >Удалить</button> 
							
							
							<!--ЭТО ЗАГОЛОВОК ЕГО НЕ ТРОГАТЬ-->
							<div class="column small-12 medium-12 large-12" style="background:#FAFAFA; margin-top:10px;">
								<div class="row" >
									<div class="column small-2 medium-2 large-2" style="background:none; "></div>
									<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.625em;"><p4>Вакансия</p4></div>
									<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.625em;"><p4>Студент</p4></div>
									<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.625em;"><p4>Компания</p4></div>
									<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.625em;"><p4>Согласие</p4></div>
								</div>
							</div>
							<!--ЭТО ЗАГОЛОВОК ЕГО НЕ ТРОГАТЬ-->
							';
							
						$stmt = $db->query('SELECT request.id_stud, vacancy.about, person.lastname,person.name AS personName, fathername,pterodactyl.name AS pteroName,request.pter_agree as pter_agree, request.stud_agree as stud_agree, request.admin_agree as admin_agree, groups.admin, request.admin_agree as admin_agree FROM request 
						LEFT JOIN person ON request.id_stud = person.id_person
						LEFT JOIN vacancy ON request.id_vac = vacancy.id_vac
						LEFT JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id
						left join student on student.id = request.id_stud 
						left join groups on groups.id_group = student.studygroup');
						while ($row = $stmt->fetch())
						{
						$admin = $row['admin'];
						if ($admin == $idadmin){
						$id=$row['id_stud'];
						$vacancy=$row['about'];
						$FIO=$row['lastname'].' '.$row['personName'].' '.$row['fathername'];
						$company=$row['pteroName'];
						$pter_agree = $row['pter_agree'];
						$stud_agree = $row['stud_agree'];
						$admin_agree = $row['admin_agree'];
							if (($pter_agree == 1) and ($stud_agree == 1)){
							if ($admin_agree==1)
								$color_background='#7E8AA0';
							else
							if ($admin_agree==0)
								$color_background='#BFC1C2';
							echo'
							<div class="column small-12 medium-12 large-12" id="'.$id.'block" style="background:'.$color_background.'; margin-top:10px;">
								<div class="row" >
									<div class="column small-2 medium-2 large-2" style="background:none; "><input id='.$id.' type="checkbox"><label for="checkbox1" style="margin-top:30%;"></label></div>
									<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.525em;"><p>'.$vacancy.'</p></div>
									<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.525em;"><p>'.$FIO.'</p></div>
									<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.525em;"><p>'.$company.'</p></div>';
							echo '
							<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.525em;">
							<select name="chose['.$id.']"; id="'.$id.'"; onChange="change(this)">';
						if($admin_agree==1)
								{
								$consent='Да';
								echo
								'<option>Да</option>;
								<option>Нет</option>';
								}
							else
								if($admin_agree==0){
								
									$consent='Нет';
									echo
									'
									<option>Нет</option>
									<option>Да</option>';
									};
								echo
								'
								</select>
									</div>
								</div>
							</div>
						';
						}
						}
						}
						echo'
						</div>
					</div>
				</div>
			';
		?>
	</div>
	<!--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
	<script src="http://yandex.st/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>
	<script language="javascript">
		function change(event){
		var n = event.options.selectedIndex;
		var idi = event.id;
		if (event.options[n].text == 'Да') {
			var ch = 1;
			document.getElementById(idi+'block').style.background = '#7E8AA0';
		}	
		else {
			var ch = 0;
			document.getElementById(idi+'block').style.background = '#BFC1C2';
		}

		var formData = { 
		"id": idi,
		"ch": ch,
		}; 


		$.ajax({ 
		url: "bidadmindop.php", 
		type: "POST", 
		data: 'jsonData=' + JSON.stringify(formData), 
		success:function(res) {
			
		}
		}); 
		}; 
	</script>
	
	<script>
		function clicke(){
		$('input:checkbox:checked').each(function(){
		var idd = this.id; 
		var formData = { 
		"id": idd,
		}; 


		$.ajax({ 
		url: "bidadmindel.php", 
		type: "POST", 
		data: 'jsonData=' + JSON.stringify(formData), 
		success:function(res) {
			$('#'+idd+'block').fadeOut(300);
		}
		}); 
		});
		};
	</script>
</body>	