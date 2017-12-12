<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		
		echo
		'
		<div class="column small-12 medium-12 large-12">
		<div class="row" style="padding:5px; margin:5px;">
		
		<div class="column small-6 medium-6 large-6" style="background:none; padding:10px; margin-left:25%">
		<p5>Резюме</p5>
		<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
		
		<form>
		
		 <input class="rectangle" name="last_name" placeholder="ФИО" type="text" style="width:80%" ></input>
		 <input class="rectangle" name="last_name" placeholder="Группа" type="text" style="width:80%"></input>
		
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Профессиональные навыкии" style="height:100px;"></textarea>
        </div></div>
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Практический опыт" style="height:100px;"></textarea>
        </div></div>
		<div class="grid-x grid-padding-x"><div class="large-12 cell">
                <textarea placeholder="Дополнительные сведения" style="height:100px;"></textarea>
        </div></div>
		<div style="float:left; width:18%; margin-left:0;"><button type="submit" >Опубликовать</button></div>
		</form>
		
		</div>
		
		</div>
		
		</div>
		';
		?>
	</div>
</body>	
	