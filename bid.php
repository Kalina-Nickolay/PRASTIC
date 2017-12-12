<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		
		<?php
		 $id='1';
		 $vacancy='Уборщик';
		 $FIO='ИВАНОВ ВАНЯ ИВАНОВИЧ';
			$company='Дёртон';
		$consent='Да';
		
		
		echo
		'
		<div class="column small-12 medium-12 large-12" style="height:100%;">
		<div class="row" style="padding:5px; margin:5px;">
		<div class="column small-2 medium-2 large-2" style="background:none; padding:10px;">
		';
		if (isset($_GET["outgoing"])) {
		echo'<button data-href="bid.php" onClick="gotolink(this)" type="submit" style="margin-bottom:10px; width:100%; background:#FAFAFA; color:black">Входящие</button>
		<button data-href="bid.php?outgoing=true" onClick="gotolink(this)" type="submit" style="width:100%; background:#FAFAFA;color:black"">Исходящие<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; width:100%"></button>
		';
		}
		else
			echo'<button data-href="bid.php" onClick="gotolink(this)" type="submit" style="margin-bottom:10px; width:100%; background:#FAFAFA; color:black">Входящие<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; width:100%"></button>
		<button data-href="bid.php?outgoing=true" onClick="gotolink(this)" type="submit" style="width:100%; background:#FAFAFA;color:black"">Исходящие</button>
		';
		echo'
		</div>
		
		<div class="column small-10 medium-10 large-10" style="background:none; padding:10px; padding-right:60px;">
		<button type="submit" style="margin-right:0; background:#E3A36F">Удалить</button> <button type="submit" style="margin-left:0; background:#4292D3">Утвердить</button>
		
		<!--ЭТО ЗАГОЛОВОК ЕГО НЕ ТРОГАТЬ-->
		<div class="column small-12 medium-12 large-12" style="background:#FAFAFA; margin-top:10px;">
		<div class="row" >
			<div class="column small-2 medium-2 large-2" style="background:none; "><input id="checkbox1" type="checkbox"><label for="checkbox1" style="margin-top:30%;"></label></div>
			<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.625em;"><p4>Вакансия</p4></div>
			<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.625em;"><p4>Студент</p4></div>
			<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.625em;"><p4>Компания</p4></div>
			<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.625em;"><p4>Согласие</p4></div>
		</div>
		</div>
		<!--ЭТО ЗАГОЛОВОК ЕГО НЕ ТРОГАТЬ-->
		';
		$color_background='#FAFAFA';
		//if ($ПЕРЕМЕННАЯЦВЕТАСТРОКИ=='ЗНАЧЕНИЕ1')
		//	$color_background='#7E8AA0';
		//else
		//if ($ПЕРЕМЕННАЯЦВЕТАСТРОКИ=='ЗНАЧЕНИЕ2')
		//	$color_background='#BFC1C2';
		echo'
		<div class="column small-12 medium-12 large-12" style="background:'.$color_background.'; margin-top:10px;">
		<div class="row" >
			<div class="column small-2 medium-2 large-2" style="background:none; "><input id="checkbox'.$id.'" type="checkbox"><label for="checkbox'.$id.'" style="margin-top:30%;"></label></div>
			<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.525em;"><p>'.$vacancy.'</p></div>
			<div class="column small-3 medium-3 large-3" style="background:none; margin-top: 0.525em;"><p>'.$FIO.'</p></div>
			<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.525em;"><p>'.$company.'</p></div>
			<div class="column small-2 medium-2 large-2" style="background:none; margin-top: 0.525em;"><p>'.$consent.'</p></div>
		</div>
		</div>
	
	
		</div>
		</div>
		
		</div>
		
		</div>
		';
		?>
	</div>
	<script>
	function gotolink(event) {
		document.location.href = event.getAttribute('data-href');
	}
</script>
</body>	
	