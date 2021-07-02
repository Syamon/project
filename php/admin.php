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
	<div class="hello">
		<h1> Добрый день,<?php echo $_SESSION["user"]["FIO_user"];?>!</h1>
	</div>
</body>

</html>
