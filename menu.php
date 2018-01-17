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
					<li style="float:right;"><a href="group_admin.php">Группы</a></li>
					<li style="float:right;"><a href="bidadmin.php">Заявки</a></li>
					<li style="float:right;"><a href="settingsAdmin.php">Настройки</a></li>
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
					<li style="float:right;"><a href="settingsStude.php">Настройки</a></li>
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
					<li style="float:right;"><a href="bidPtero.php">Заявки</a></li>
					<li style="float:right;"><a href="settingsPtero.php">Настройки</a></li>
				</ul>
			</div>
		';
	?>
</div>

<!-- выделение пунктов меню / косячненькое :с-->
<script>
$(document).ready(function(){
	/* говнокод пздц, простите :с */
	var location = window.location.href;
	

	if (location.indexOf('vacancy.php')>-1 || location.indexOf('vacancy_detail.php')>-1) 
		$('li').find('a[href*="vacancy.php"]').parent().addClass('active');
	else if (location.indexOf('resume.php')>-1) 
		$('li').find('a[href*="resume.php"]').parent().addClass('active');
	else if (location.indexOf('company.php')>-1 || location.indexOf('company_detail.php')>-1) 
		$('li').find('a[href*="company.php"]').parent().addClass('active');
	else if (location.indexOf('group.php')>-1 || location.indexOf('group_students.php')>-1) 
		$('li').find('a[href*="group.php"]').parent().addClass('active');
	else if (location.indexOf('sample.php')>-1)
		$('li').find('a[href*="sample.php"]').parent().addClass('active');
	else if (location.indexOf('vacancyPtero.php')>-1 || location.indexOf('vacancyAdd.php')>-1 || location.indexOf('vacancyEdit.php')>-1) 
		$('li').find('a[href*="vacancyPtero.php"]').parent().addClass('active'); 
	else if (location.indexOf('bidPtero.php')>-1 ) 
		$('li').find('a[href*="bidPtero.php"]').parent().addClass('active'); 
	else if (location.indexOf('settingsPtero.php')>-1 ) 
		$('li').find('a[href*="settingsPtero.php"]').parent().addClass('active'); 
	else if (location.indexOf('resumeStude.php')>-1 ) 
		$('li').find('a[href*="resumeStude.php"]').parent().addClass('active'); 
	else if (location.indexOf('bid.php')>-1 ) 
		$('li').find('a[href*="bid.php"]').parent().addClass('active');
	else if (location.indexOf('settingsStude.php')>-1 ) 
		$('li').find('a[href*="settingsStude.php"]').parent().addClass('active');  
	else if (location.indexOf('group_admin.php')>-1 || location.indexOf('group_students_admin.php')>-1) 
		$('li').find('a[href*="group_admin.php"]').parent().addClass('active');  
	else if (location.indexOf('bidadmin.php')>-1) 
		$('li').find('a[href*="bidadmin.php"]').parent().addClass('active'); 
	else if (location.indexOf('settingsAdmin.php')>-1) 
		$('li').find('a[href*="settingsAdmin.php"]').parent().addClass('active');
});
</script>