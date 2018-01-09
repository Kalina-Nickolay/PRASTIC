<?php include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3;">
		<!--Меню-->
		
		<?php
		$idg = $_GET['id'];

		$ngr = $db->prepare('SELECT studygroup, speciality FROM groups WHERE id_group=?');
		$ngr -> execute(array($idg));
		$res = $ngr -> fetch();

		$stmt = $db->prepare('SELECT student.studygroup as idgr, person.lastname as lastname, person.name as name, person.fathername as fathername, student.invalid as invalid, groups.studygroup as studygroup
			FROM student
			left join person on student.id = person.id_person
			left join groups on student.studygroup = groups.id_group WHERE groups.id_group=?');
		$stmt -> execute(array($idg));
		
		echo
		'
		<div class="column small-12 medium-12 large-12" style="padding:10px;">
		<div style="background:white">
		<div class="block-absolute">
			<p2 class="speciality-name">'.$res['speciality'].' '.$res['studygroup'].'</p2>
			<table class="linkRow">
				<thead>
					<tr  onclick="window.location.href="group_students.php"; return false>
						<th>№</th>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>ОВЗ</th>
					</tr>
				</thead>
				<tbody>';
				while ($row = $stmt->fetch())
				{
				$idgr = $row['idgr'];
				$studygroup = $row['studygroup'];
				$lastname = $row['lastname'];
				$name = $row['name'];
				$fathername = $row['fathername'];
				$invalid = $row['invalid'];
				
					echo'
					<tr>
						<td>'.$studygroup.'</td>
						<td>'.$lastname.'</td>
						<td>'.$name.'</td>
						<td>'.$fathername.'</td>
						<td>'.$invalid.'</td>
					</tr>';
				};
				echo ' 
				</tbody>
			</table>
		</div>';
		
		if($role=="admin"){
			$ngr = $db->prepare('SELECT admin FROM groups WHERE id_group=?');
			$ngr -> execute(array($idg));
			$res = $ngr -> fetch();

			?>
			<button id="become-admin" type="submit" style="margin:10 10" <? if ($res['admin']!=NULL) {?> disabled <?}?> >Стать руководителем</button>
			<?}?>
		</div>		
	</div>
</body>	
	
<script>
	$(document).ready(function(){
		$('#become-admin').click(function () {
			var formData = {
	            "id_group":  <? echo $idg ?>,
	            "id_admin":  <? echo $_SESSION['id'] ?>,
	        };
	        $.ajax({
	            url: "bd/become_admin.php", 
	            type: "POST", 
	            data: 'jsonData=' + JSON.stringify(formData), 
	            success:function(){
	            	$('#become-admin').attr('disabled',true);
	            }
	            /*,
	            error:function (xhr, ajaxOptions, thrownError){
	                alert(thrownError);
	            }*/
	        });
   		});
	});
</script>