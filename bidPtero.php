<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<div class="column small-12 medium-12 large-12" style="height:100%;">
			<div class="row" style="padding:5px; margin:5px;">

				<!--кнопки "входящие" и "исходящие"// табы-->
				<div class="column small-2 medium-2 large-2" style="background:none; padding:10px 0;">
					<div class="tabNav">
						<a class="request-button bid-section" href="#incoming">Входящие
							<div class="row line">
								<hr class="orange-line-button">
							</div>
						</a>
						<a class="request-button bid-section" href="#outgoing">Исходящие
							<div class="row line" style="display:none">
								<hr class="orange-line-button">
							</div>
						</a>
					</div>
				</div>
				
				<div class="column small-10 medium-10 large-10">
					<div class="tabs-request">
						<!-- входящие заявки -->
						<div id="incoming" >
							<div style="background:none; padding:10px;">

								<!--ЗАГОЛОВОК-->
								<table class="table-request table-checks-in">
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
							 	$id_pter = $_SESSION['id'];
								$stmt = $db->prepare('SELECT request.id_stud, request.id_vac, vacancy.about, person.lastname,person.name AS personName, fathername,pterodactyl.name AS pteroName,request.pter_agree, request.admin_agree FROM request
									LEFT JOIN person ON request.id_stud = person.id_person
									LEFT JOIN vacancy ON request.id_vac = vacancy.id_vac
									LEFT JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id WHERE vacancy.id_pter=? AND request.sender="student"');
								$stmt -> execute(array($id_pter));

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
										<td style="background:none;"><input type="checkbox"></td>
										<td style="background:none;"><p><? echo $vacancy ?></p></td>
										<td style="background:none;"><p><? echo $FIO ?></p></td>
										<td style="background:none;"><p><? echo $company ?></p></td>
										<td style="background:none;">
											<select id="<? echo $row['id_vac'].'!'.$row['id_stud'] ?>" class="request-select">
												<option value="" selected disabled hidden>...</option>
												<option value="1" <? if ($row['pter_agree']==1) {?> selected <?}?> >Да</option>
												<option value="0" <? if ($row['pter_agree']=="0") {?> selected <?}?>>Нет</option>
											</select>
										</td>
									</tr>
								<? } ?>
								</table>
							</div>
						</div>

						<!-- исходящие заявки -->
						<div id="outgoing">
							<div style="background:none; padding:10px;">
								<!-- кнопка "удалить" появляется (становится доступной) только при выделении чекбокса и ТОЛЬКО во вкладке "исходящие" -->
								<button id="del-request" class="bid-section" style="margin-right:0; background:#E3A36F; margin-bottom: 8px; border: 1px solid #E3A36F;" disabled >Удалить</button> 
								
								<!--ЗАГОЛОВОК-->
								<table class="table-request table-checks-out">
									<thead>
										<tr class="request">
											<th style="width:5%"><input class="all_checks" type="checkbox"></th>
											<th style="width:25%"><p4>Вакансия</p4></th>
											<th style="width:30%"><p4>Студент</p4></th>
											<th style="width:20%"><p4>Компания</p4></th>
											<th style="width:15%"><p4>Согласие</p4></th>
										</tr>
									</thead>

								 	<?
								 	$id_pter = $_SESSION['id'];
									$stmt = $db->prepare('SELECT request.id_stud, request.id_vac, vacancy.about, person.lastname,person.name AS personName, fathername,pterodactyl.name AS pteroName,request.pter_agree, request.admin_agree FROM request
										LEFT JOIN person ON request.id_stud = person.id_person
										LEFT JOIN vacancy ON request.id_vac = vacancy.id_vac
										LEFT JOIN pterodactyl ON vacancy.id_pter = pterodactyl.id WHERE vacancy.id_pter=? AND request.sender="pterodactyl"');
									$stmt -> execute(array($id_pter));

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
											<td style="background:none; "><input class="requests" id="<? echo $row['id_vac'].'!'.$row['id_stud'] ?>" type="checkbox"></td>
											<td style="background:none;"><p><? echo $vacancy ?></p></td>
											<td style="background:none;"><p><? echo $FIO ?></p></td>
											<td style="background:none;"><p><? echo $company ?></p></td>
											<td style="background:none;"><p><? if ($row['pter_agree']==1) {?>Да<?}?> </p></td>
										</tr>
									<? } ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>	

<script>

	$(document).ready(function(){
		// выделение всех чекбоксов в таблице входящих заявок
	    var table1 = $('table.table-checks-in');
	    table1
	    .on('change', '> tbody input:checkbox',function() {
	        $(this).closest('span').toggleClass('checked', $(this).is(':checked'));
	    })
	    .on('change', '.all_checks', function(){
	        $('> tbody input:checkbox', table1).prop('checked', $(this).is(':checked')).trigger('change');
	    });

	    // выделение всех чекбоксов в таблице исходящих заявок
	    var table2 = $('table.table-checks-out');
	    table2
	    .on('change', '> tbody input:checkbox',function() {
	        $(this).closest('span').toggleClass('checked', $(this).is(':checked'));
	        check();
	    })
	    .on('change', '.all_checks', function(){
	        $('> tbody input:checkbox', table2).prop('checked', $(this).is(':checked')).trigger('change');
	    });

	    function check(){
		    var cb = table2.find('input:checkbox'),
	        L = cb.length-1,
	        f = true;
		    for(;L>=0;L--){
		        if (cb[L]['checked']==true){
		            f=!f; break;
		        }
		    }   
		    $('#del-request').attr('disabled',f);
		}

	    // подмена контента + отображение оранжевых линий для активных кнопок
		$(function () {
		    var tabContainers = $('div.tabs-request > div'); // получаем массив контейнеров
		    tabContainers.hide().filter(':first').show(); // прячем все, кроме первого

		    // далее обрабатывается клик по кнопке
		    $('div.tabNav a').click(function () {
		        tabContainers.hide(); // прячем все табы
		        tabContainers.filter(this.hash).show(); // показываем содержимое текущего
		        $('div.tabNav a').find('.line').css('display', 'none'); //убираем оранжевые линии
		        $(this).find('.line').css('display', ''); // и делаем видимой ёё там, где нужно
		        return false;
		    }).filter('#first').click();
		});

		// изменение значения поля pter_agree при изменении значения селекта
		$('.request-select').change(function () {
			var id_req = $(this).attr('id').split('!'); // получаем ключ заявки
			var id_vac = id_req[0]; //и достаём из него ид вакансии и ид студента
			var id_stud = id_req[1];
			var request_data = {
	            "pter_agree":  $(this).val(), //выбранное решение практикодателя
	            "id_vac":  id_vac,
	            "id_stud":  id_stud,
	        };
	        $.ajax({
	            url: "bd/pter_decision.php", 
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

   		// удаление помеченных заявок
		$('#del-request').click(function () {
			var cb = table2.find('.requests:checked'); //массив отмеченных чекбоксов
			var arr_vac_stud = new Array();
			$(cb).each(function (){
				arr_vac_stud.push($(this).attr('id'));
			});

			var request_del_data = {
	            "arr":  arr_vac_stud,
	        };
	        $.ajax({
	            url: "bd/del_request.php", 
	            type: "POST", 
	            data: 'jsonData=' + JSON.stringify(request_del_data), 
	            success:function(response){
	            	$(cb).each(function (){
						$(this).parent().parent().fadeOut(300);
					});
	            }
	            /*,
	            error:function (xhr, ajaxOptions, thrownError){
	                alert(thrownError);
	            }*/
	        });
   		});

	});
</script>