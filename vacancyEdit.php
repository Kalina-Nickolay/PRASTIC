<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<?php
		
		$id_vac=$_GET["id_vac"];
		
		$stm = $db->prepare('SELECT * FROM vacancy WHERE id_vac = ?');
		$stm->execute([$id_vac]);
		$res = $stm->fetch();

		?>
		<div class="column small-12 medium-12 large-12">
			<div class="row" style="margin:5px;">
				<form enctype="multipart/form-data" action="bd/edit_vac.php" method="POST" class="column small-12 medium-12 large-12" style="background:none; padding:10px; padding-right:60px; height:100%">
					<p1>Вакансия</p1>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
					<input style="display:none;" name="id_vac" value="<? echo $id_vac?>"></input>
					
					<div class="row" style="padding:0; margin:0;">
						<div class="column small-7 medium-7 large-7"style="padding:0; margin:0; ">
						<input class="rectangle" name="about" placeholder="Название вакансии" type="text" value="<? echo $res['about']?>"></input>
						
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-6 medium-6 large-6" style="padding-left:0;">
								<input class="rectangle" name="start" placeholder="С" type="text" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" style="width:100%; margin-left:0;" value="<? echo $res['start']?>"></input>
							</div>	
							<div class="column small-6 medium-6 large-6" style="padding-right:0;">
								<input class="rectangle" name="finish" placeholder="По" type="text" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" style="width:100%" value="<? echo $res['finish']?>"></input>
							</div>	
						</div>	
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="privet" placeholder="Описание" style="height:100px;"><? echo $res['privet']?></textarea>
					        </div>
					    </div>
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="practic" placeholder="Вид деятельности" style="height:100px;"><? echo $res['practic']?></textarea>
				        	</div>
				        </div>
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="invalid" placeholder="Условия для инвалидов" style="height:100px;"><? echo $res['invalid']?></textarea>
				        	</div>
				        </div>
						
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-6 medium-6 large-6" style="padding-left:0;">
								<input class="rectangle" name="places" placeholder="Мест" type="text" style="width:100%; margin-left:0;" value="<? echo $res['places']?>"></input>
							</div>	
						</div>
					
					</div>

					<div class="column small-5 medium-5 large-5" style="padding:0; padding-left:10%;margin:0;">
						<div class="row" style="padding:0; margin:0;">
							<!--<div style="height:100px; width:80%; background:white; border:3px; float:right;">	
							</div>-->
							<output id="list"></output>
						</div>
						<div class="row" style="padding:0; margin:0;">
							<div style="float:left; width:100%; margin-top:10px; margin-left:2%;float:right;">
								<input value="Изменить логотип" type="file" id="files" name="logo_url" accept="image/*,image/jpeg" />
							</div>
						</div>
					</div>

					<div style="float:left; width:18%; margin-left:55%;">
						<button type="submit" >Опубликовать</button>
					</div>
				</form>
			</div>
		
		</div>
		
	</div>
</body>	
	