<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="../js/script_admin_graf.js" type="text/javascript"></script>
	<title> Администратор</title>
</head>

<body>
	<div class="top_menu">
		<a href="admin.php">Главная</a>
		<a href="kurs_val.php">Курс валют</a>
		<a href="graf_othet.php">Отчет</a>
		<a href="distroy.php">Выйти</a>
	</div>
	<div class="control_date">
		<div>
			<input type="date" class="form-control" id="do_date"><br>
			<input type="date" class="form-control" id="posle_date"><br>
			<input type="text" class="form-control" id="vid_otch" placeholder="Выбирите отчёт" list="vid"><br>
			<input type="button" class="log_but" id="but_date" value="Вывести отчёт"><br>
		</div>
		<datalist id="vid">
			<?php
				$otchet = mysqli_query($connect, "SELECT * FROM `vid_oper`");
				while(($row = mysqli_fetch_assoc($otchet)) != false){
					echo "<option value = '".$row["Name_oper"]."'>".$row["Name_oper"]."</option>";
				}
			?>
		</datalist>
	</div>
	<div class="vivod_ot">
		<div id="piechart_3d">

		</div>
		<table class="table_otchet">
		</table>
	</div>

</body>

</html>
