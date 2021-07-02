<?php
	session_start();
	include 'php/connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}	
	if(isset($_POST["enter"])){
		$login = $_POST["login"];
		$user=mysqli_query ($connect, "SELECT * FROM user WHERE`login` = '".$login."'");
		$user=mysqli_fetch_assoc($user);
		if($user["login"] == $login && $user["ID_role"] == 2){
			$_SESSION["user"] = $user;
			header("Location:php/account.php");
		}
		if($user["login"] == $login && $user["ID_role"] == 1){
			$_SESSION["user"] = $user;
			header("Location:php/admin.php");
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://kit.fontawesome.com/46b8acc894.js" crossorigin="anonymous"></script>
</head>

<body>
	<div class="index_main_block">
		<div class="or">
			<h1 class="name_or">Международные денежные переводы</h1>
			<div class="opis">
				<label class="opisanie_or"><i class="far fa-check-circle"></i><br>Более миллиона пользователей </label>
				<label class="opisanie_or"><i class="far fa-heart"></i><br>Быстрые и безопасные переводы </label>
				<label class="opisanie_or"><i class="far fa-life-ring"></i><br>Минимальная комиссия</label>
			</div>
		</div>
		<div class="forv_avto">
			<h1> Форма авторизации</h1>
			<form action=" " method="post" class="form-avto">
				<input required type="text" class="form" name="login" id="login" placeholder="Введите логин" /><br>
				<input required type="password" class="form" name="pass" id="pass" placeholder="Введите пароль" /><br>
				<input name="enter" type="submit" value="Войти" class="but" /><br />
			</form>
		</div>
	</div>
</body>

</html>
