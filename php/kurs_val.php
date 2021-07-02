<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
	if(isset($_POST["valu"])){
		$Name_val = $_POST["val"];
		$pocup = $_POST["pocup"];
		$prodaj = $_POST["prodaj"];
		$Date = date("Y.m.d H:i:s");
		mysqli_query($connect,"UPDATE `valuta` SET `Pocup_val` = '$pocup',`Prodach_val` = '$prodaj',`Data_izm` = '$Date' WHERE `Name_val` = '$Name_val'");	
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="../js/script_admin.js" type="text/javascript"></script>
	<title> Администратор</title>
</head>

<body>
	<div class="top_menu">
		<a href="admin.php">Главная</a>
		<a href="kurs_val.php">Курс валют</a>
		<a href="graf_othet.php">Отчет</a>
		<a href="distroy.php">Выйти</a>
	</div>
	<form action=" " method="post" class="act">
		<h1>Изменение курса валют</h1>
		<input required type="text" class="form-control" name="val" id="valut" autocomplete="off" list="valuta" onchange="change_label()" placeholder="Выбирите валюту" /><br>
		<input type="text" class="form-control" name="prodaj" id="pro" placeholder="Инфо продажи" /><br>
		<input type="text" class="form-control" name="pocup" id="poc" placeholder="Инфо покупки" /><br>
		<input name="valu" type="submit" value="Ввести данные" class="log_but" /><br />
	</form>
	<datalist id="valuta">
		<?php
			$cities =  mysqli_query($connect, "SELECT val.*, nv.Name_val AS `another_name` FROM `valuta` val LEFT JOIN `name_valut` nv ON nv.ID_valut = val.Name_val");
				while(($citi = mysqli_fetch_assoc($cities)) != null){
					echo'<option value="'.$citi["another_name"].'"></option>';
				}
		?>
	</datalist>
</body>

</html>
