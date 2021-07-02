<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
	if(isset($_POST["Vvod_clienta"])){
		$user2 = mysqli_query ($connect,"INSERT INTO `client`(`name`, `nomer_cheta`, `nomer_pasporta`, `seria_pasporta`, `strana`) VALUES ('".$_POST["name_user"]."','".$_POST["nomer_cheta"]."','".$_POST["nomer_pasporta"]."','".$_POST["seria_pasporta"]."','".$_POST["strana"]."')");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<title>Регистрация</title>
</head>

<body>
	<div class="top_menu">
		<a href="account.php">Поиск клиента</a><br>
		<a href="transfer.php">Перевод</a><br>
		<a href="withdraw.php">Снятие</a><br>
		<a href="buy.php">Покупка/Продажа</a><br>
		<a href="reg_client.php">Регистрация клиента</a><br>
		<a href="distroy.php">Выйти</a><br>
	</div>
	<form action=" " method="post" class="act">
		<h1>Регистрация нового клиента</h1>
		<input required type="text" class="form-control" name="name_user" placeholder="Введите имя клиента" /><br>
		<input required type="text" class="form-control" name="nomer_cheta" placeholder="Введите номер счёта" /><br>
		<input required type="text" class="form-control" name="nomer_pasporta" placeholder="Введите номер паспорта" /><br>
		<input required type="text" class="form-control" name="seria_pasporta" placeholder="Введите серию паспорта" /><br>
		<input required type="text" class="form-control" name="strana" placeholder="Введите страну" list="citi" autocomplete="off" /><br>
		<input name="Vvod_clienta" type="submit" value="Ввести данные" class="log_but" /><br />
	</form>
	<datalist id="citi">
		<?php
			$strana = mysqli_query ($connect, "SELECT `Сountry` FROM `commission`");//запрос стран
			while(($siti = mysqli_fetch_assoc($strana)) != false){
				echo'<option value = "'.$siti["Сountry"].'"/>';		
			}
		?>
	</datalist>
</body>

</html>
