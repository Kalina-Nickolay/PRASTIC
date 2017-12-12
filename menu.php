<!--Меню-->
<div class="row" style="background:#343843; height:30px">
	<?php //?role='.$role.'&idr='.$idr.' а зачем нам вообще это передавать каждый раз, да ещё и через get?????
		echo
		'
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu">
					<li><a href="vacancy.php">Вакансии</a></li>
					<li><a href="resume.php">Резюме</a></li>
					<li><a href="company.php">Компании</a></li>
					<li><a href="group.php">Группы</a></li>
				</ul>
			</div>
		';
		
		// АДминистратор
		if($role=='admin')
		echo
		'
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li style="float:right;"><a href="sample.php">Образец</a></li>
					<li style="float:right;"><a href="group.php">Группы</a></li>
					<li style="float:right;"><a href="bid.php">Заявки</a></li>
					<li style="float:right;"><a href="settings.php">Настройки</a></li>
				</ul>
			</div>
		';
		// СТудент
		if($role=='student')
		echo
		'
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li style="float:right;"><a href="sample.php">Образец</a></li>
					<li style="float:right;"><a href="resumeStude.php">Резюме</a></li>
					<li style="float:right;"><a href="bid.php">Заявки</a></li>
					<li style="float:right;"><a href="settings.php">Настройки</a></li>
				</ul>
			</div>
		
		';
		// ПТеродактель
		if($role=='pterodactyl')
		echo
		'
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li style="float:right;"><a href="sample.php">Образец</a></li>
					<li style="float:right;"><a href="vacancyPtero.php">Вакансии</a></li>
					<li style="float:right;"><a href="bid.php">Заявки</a></li>
					<li style="float:right;"><a href="settings.php">Настройки</a></li>
				</ul>
			</div>
		';
	?>
</div>

<!-- выделение пунктов меню / косячненькое :с-->
<script>
$(function () {
	var location = window.location.href;
	var cur_url = location.split('/').pop();
	
	if(cur_url.search('_') != -1)
		cur_url = cur_url.split('_').shift() + '.php';
	
	$('li').each(function () {
		var link = $(this).find('a').attr('href');
		if(cur_url == link) 
			$(this).addClass('active');
	});
});
</script>