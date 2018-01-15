<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		
		<?php
		$idadmin=$_SESSION['id'];
		?>
				<div class="column small-12 medium-12 large-12" style="min-height:100%;">
					<div class="row" style="padding:5px; margin:5px;">
						<div class="column small-2 medium-2 large-2" style="background:none; padding:10px;">

						</div>
						
						<div class="column small-10 medium-10 large-10" style="background:none; padding:10px;">
							<div style="background:none; padding:10px;">
								<!-- по идее, у нас только входящие для администратора, а удалять входящие типа нельзя
								<button id="del-request" class="bid-section" style="background:#E3A36F; margin-bottom: 8px; border: 1px solid #E3A36F;" disabled >Удалить</button> 
								-->

								<!--ЗАГОЛОВОК-->
								<table class="table-request table-checks">
									<thead>
										<tr class="request">
											<th style="width:5%"><input class="all_checks" type="checkbox"></th>
											<th style="width:25%"><p4>Вакансия</p4></th>
											<th style="width:30%"><p4>Студент</p4></th>
											<th style="width:20%"><p4>Компания</p4></th>
											<th style="width:15%"><p4>Согласие</p4></th>
										</tr>
									</thead>
								<!--ЗАГОЛОВОК-->

							 	<?
							 	$id_admin = $_SESSION['id'];
								$stmt = $db->prepare('SELECT request.id_stud AS id_stud, 
														   request.id_vac AS id_vac,
														   vacancy.about, 
														   person.lastname,person.name AS personName, fathername,
														   pterodactyl.name AS pteroName,
														   request.pter_agree as pter_agree, 
														   request.stud_agree as stud_agree, 
														   request.admin_agree as admin_agree, 
														   groups.admin 
									FROM request 
									LEFT JOIN person ON request.id_stud = person.id_person
									LEFT JOIN vacancy ON request.id_vac = vacancy.id_vac
									LEFT JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id
									left join student on student.id = request.id_stud 
									left join groups on groups.id_group = student.studygroup WHERE groups.admin=? AND request.pter_agree=1 AND request.stud_agree=1');
								$stmt -> execute(array($id_admin));

								while ($row = $stmt->fetch()) {
									$id=$row['id_stud']; //ид студента
									$vacancy=$row['about'];
									$FIO=$row['lastname'].' '.$row['personName'].' '.$row['fathername'];
									$company=$row['pteroName'];
									?>
									<tr 
										<? switch ($row['admin_agree']) { 
											case "1": ?> class="request-approved" <? break;
											case "0": ?> class="request-declined" <? break;
											case NULL: ?> class="request" <? break;
										} ?> >
										<td style="background:none;"><input class="requests" type="checkbox"></td>
										<td style="background:none;"><p><? echo $vacancy ?></p></td>
										<td style="background:none;"><p><? echo $FIO ?></p></td>
										<td style="background:none;"><p><? echo $company ?></p></td>
										<td style="background:none;">
											<select id="<? echo $row['id_vac'].'!'.$row['id_stud'] ?>" class="request-select">
												<option value="" selected disabled hidden>...</option>
												<option value="1" <? if ($row['admin_agree']==1) {?> selected <?}?> >Да</option>
												<option value="0" <? if ($row['admin_agree']=="0") {?> selected <?}?>>Нет</option>
											</select>
										</td>
									</tr>
								<? } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
	</div>
</body>

<script>
	$(document).ready(function(){
		var table = $('table.table-checks');
	    table
	    .on('change', '> tbody input:checkbox',function() {
	        $(this).closest('span').toggleClass('checked', $(this).is(':checked'));
	        //check();
	    })
	    .on('change', '.all_checks', function(){
	        $('> tbody input:checkbox', table).prop('checked', $(this).is(':checked')).trigger('change');
	    });
	    /*
	    function check(){
		    var cb = table.find('input:checkbox'),
	        L = cb.length-1,
	        f = true;
		    for(;L>=0;L--){
		        if (cb[L]['checked']==true){
		            f=!f; break;
		        }
		    }   
		    $('#del-request').attr('disabled',f);
		}
		*/
		// изменение значения поля admin_agree при изменении значения селекта
		$('.request-select').change(function () {
			req = $(this).parent().parent(); //получаем строку заявки
			if ($(this).val()==1)
				$(req).attr('class','request-approved');
			else 
				$(req).attr('class','request-declined');

			var id_req = $(this).attr('id').split('!'); // получаем ключ заявки
			var id_vac = id_req[0]; //и достаём из него ид вакансии и ид студента
			var id_stud = id_req[1];
			var request_data = {
	            "admin_agree":  $(this).val(), //выбранное решение администратора
	            "id_vac":  id_vac,
	            "id_stud":  id_stud,
	        };
	        $.ajax({
	            url: "bd/bidadmindop.php", 
	            type: "POST", 
	            data: 'jsonData=' + JSON.stringify(request_data), 
	            success:function(response){
	            }
	            /*,
	            error:function (xhr, ajaxOptions, thrownError){
	                alert(thrownError);
	            }*/
	        });
   		});

		/*
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
		*/
	});
</script>