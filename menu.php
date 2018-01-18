<!--Меню-->
<div class="row" style="background:#343843; height:30px">
	<?
	$url = $_SERVER["REQUEST_URI"];
	?>
	<div class="column small-6 medium-6 large-6"  style="padding:0;">
		<ul class="menu">
			<li <?if (stripos($url, "vacancy.php")!==false || stripos($url, "vacancy_detail.php")!==false) {?> class="active" <?}?> >
				<a href="vacancy.php">Вакансии</a></li>
			<li <?if (stripos($url, "resume.php")!==false) {?> class="active" <?}?> >
				<a href="resume.php">Резюме</a></li>
			<li <?if (stripos($url, "company.php")!==false || stripos($url, "company_detail.php")!==false) {?> class="active" <?}?> >
				<a href="company.php">Компании</a></li>
			<li <?if (stripos($url, "group.php")!==false || stripos($url, "group_students.php")!==false) {?> class="active" <?}?> >
				<a href="group.php">Группы</a></li>
		</ul>
	</div>
	<?
		
		// АДминистратор
		if($role=='admin') {
		?>
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li <?if (stripos($url, "sample.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="sample.php">Образец</a></li>
					<li <?if (stripos($url, "group_admin.php")!==false || stripos($url, "group_students_admin.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="group_admin.php">Группы</a></li>
					<li <?if (stripos($url, "bidadmin.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="bidadmin.php">Заявки</a></li>
					<li <?if (stripos($url, "settingsAdmin.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="settingsAdmin.php">Настройки</a></li>
				</ul>
			</div>
		<? }

		// СТудент
		if($role=='student') {
		?>
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li <?if (stripos($url, "sample.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="sample.php">Образец</a></li>
					<li <?if (stripos($url, "resumeStude.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="resumeStude.php">Резюме</a></li>
					<li <?if (stripos($url, "bid.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="bid.php">Заявки</a></li>
					<li <?if (stripos($url, "settingsStude.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="settingsStude.php">Настройки</a></li>
				</ul>
			</div>
		<? }
		
		// ПТеродактель
		if($role=='pterodactyl') {
		?>
			<div class="column small-6 medium-6 large-6"  style="padding:0;">
				<ul class="menu align-right">
					<li <?if (stripos($url, "sample.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="sample.php">Образец</a></li>
					<li <?if (stripos($url, "vacancyPtero.php")!==false || stripos($url, "vacancyAdd.php")!==false || stripos($url, "vacancyEdit.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="vacancyPtero.php">Вакансии</a></li>
					<li <?if (stripos($url, "bidPtero.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="bidPtero.php">Заявки</a></li>
					<li <?if (stripos($url, "settingsPtero.php")!==false) {?> class="active" <?}?> style="float:right;">
						<a href="settingsPtero.php">Настройки</a></li>
				</ul>
			</div>
		<? } ?>
</div>