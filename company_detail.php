<?include('search.php');?>

<body>
	<!--Меню-->
	<?php include('menu.php');?>
	<!--Контент-->	
	<div class="row" style="background:#D4D4D3; min-height: 100%">
		
		<?php

		$stmt = $db->prepare('SELECT * FROM pterodactyl WHERE id=?');
		$stmt -> execute(array($_GET['id']));
		$row = $stmt->fetch();

		$num_vac = $db->prepare('SELECT COUNT(id_vac) AS num_vac FROM vacancy WHERE id_pter=?');
		$num_vac -> execute(array($_GET['id']));
		$n_v = $num_vac->fetch();

		?>

		<div class="column small-12 medium-12 large-12">
			<div class="row" style="padding:5px; margin:5px;">
				<div class="column small-12 medium-12 large-12" style="background:white; padding:2% 5%;">
					<p5><? echo $row['name'] ?></p5>
					<hr style="border: none; background-color: #EF9C00; color: #EF9C00; height: 3px;  padding:0; margin:0; margin-top:-5px; margin-bottom:7px;  width:50%">
					<div style="float: left;"><a class="contract-href" 
						 <? if ($row['iscontract']==1) { ?> 
						 	href="files/contract/<?echo $row['contract']?>"
						 <?} else { ?>
							style="display: none"
						 <?}?> >Договор о сотрудничестве</a> 
					</div>
					<div style="float: right;"><p4 align="right">Вакансий:</p4>
						<p4><? echo $n_v['num_vac'] ?></p4>
					</div>
					<br>
					<div class="vac-description">
						<p4>Описание: </p4>
						<p3><? echo $row['about']?></p3>
					</div>
					<div class="vac-description">
						<p4>Вид деятельности:</p4>
						<p3><? echo $row['sphere']?></p3>
					</div>
				</div>
			
			</div>
		
		</div>
	</div>
</body>	
	