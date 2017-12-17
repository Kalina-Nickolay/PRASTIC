<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<?php
		
		$first_date='01.01.01';
		$last_date='15.01.01';
		
		$name_vacancy='1111111';//Название вакансии:
		$name_company='2222222';//Название компании:
		$student_dities='3333333';//Обязанности:
		$student_welcome='4444444';//Приветствуется:
		$for_invalids='5555';

		?>

		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<form enctype="multipart/form-data" action="bd/add_vac.php" method="POST" class="column small-12 medium-12 large-12" style="background:none; padding:10px; padding-right:60px; height:100%">
					<p1>Вакансия</p1>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:100%">
					
					
					<div class="row" style="padding:0; margin:0;">
						<div class="column small-7 medium-7 large-7"style="padding:0; margin:0; ">
						<input class="rectangle" name="about" placeholder="Название вакансии" type="text" ></input>
						
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-6 medium-6 large-6" style="padding-left:0;">
								<input class="rectangle" name="start" placeholder="С" type="text" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" style="width:100%; margin-left:0;"></input>
							</div>	
							<div class="column small-6 medium-6 large-6" style="padding-right:0;">
								<input class="rectangle" name="finish" placeholder="По" type="text" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" style="width:100%" ></input>
							</div>	
						</div>	
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="privet" placeholder="Описание" style="height:100px;"></textarea>
					        </div>
					    </div>
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="practic" placeholder="Вид деятельности" style="height:100px;"></textarea>
				        	</div>
				        </div>
						
						<div class="grid-x grid-padding-x">
							<div class="large-12 cell">
				                <textarea name="invalid" placeholder="Условия для инвалидов" style="height:100px;"></textarea>
				        	</div>
				        </div>
						
						<div class="row" style="padding:0; margin:0;">
							<div class="column small-6 medium-6 large-6" style="padding-left:0;">
								<input class="rectangle" name="places" placeholder="Мест" type="text" style="width:100%; margin-left:0;"></input>
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
	

<script>
  function handleFileSelect(evt) {
    var logo = evt.target.files[0]; // выбираем олько что выбранный файл

    // Loop through the FileList and render image files as thumbnails.
    //for (var i = 0, f; f = files[i]; i++) {

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" id="logo" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');

          var nodes = document.getElementsByTagName("span");

			for (var i = 0, len = nodes.length; i != len; ++i) {
			    nodes[0].parentNode.removeChild(nodes[0]);
			}
          document.getElementById('list').insertBefore(span, null);
        };
      })(logo);

      // Read in the image file as a data URL.
      reader.readAsDataURL(logo);
    //}
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>