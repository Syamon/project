<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}	
	if(isset($_POST["enter"])){//нахождение клиента, который обратился
		$user = mysqli_query ($connect, "SELECT * FROM `client` WHERE `nomer_cheta` = '".$_POST["nomer_cheta"]."'");
		$user = mysqli_fetch_assoc($user);
		$_SESSION["user_date"] = $user;
		$_SESSION["Date_Start"] = date("Y.m.d H:i:s");//Время начала работа с клиентом
	}
	if(isset($_POST["finish"])){//Закончить работу с клиентом
		$_SESSION["Date_END"] = date("Y.m.d H:i:s");//Время конца работы с клиентом
		header("Location:dogovor.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="../js/script.js" type="text/javascript"></script>
	<title> Аккаунт</title>
</head>

<body>
	<div class="top_menu">
		<a href="account.php">Поиск клиента</a>
		<a href="transfer.php">Перевод</a>
		<a href="withdraw.php">Снятие</a>
		<a href="buy.php">Покупка/Продажа</a>
		<a href="reg_client.php">Регистрация клиента</a>
		<a href="distroy.php">Выйти</a>
	</div>
	<div class="poisk_klient">
		<!-- Форма поиска клиента-->
		<form method="post">
			<input type="text" class="form-control" name="nomer_cheta" id="nomer_pas" placeholder="Введите номер счета" autocomplete="off" list="Num_chet" /><br>
			<input name="enter" type="submit" value="Найти клиента" class="log_but" /><br>
			<input name="finish" type="submit" value="Перейти к договору" class="log_but" /><br>
		</form>
	</div>
	<datalist id="Num_chet">
		<?php
			$clients =  mysqli_query($connect, "SELECT * FROM `client`");
				while(($row = mysqli_fetch_assoc($clients))!= false){
					echo"<option value = '".$row["nomer_cheta"]."'>".$row["name"]."</option>";
				}
		?>
	</datalist>
	<?php
				if($_SESSION["user_date"] != null){//Вывод данных о клиенте
					echo'
						<div class = "info_client">
						<label>Имя Клиента: '.$_SESSION["user_date"]["name"].'</label><br/>
						<label>Номер счёта: '.$_SESSION["user_date"]["nomer_cheta"].' </label><br/>
						<label>Рубли: '.number_format($_SESSION["user_date"]["RUB"],0,' ',' ').'₽</label><br>
						<label>Доллары: '.number_format($_SESSION["user_date"]["USD"],0,' ',' ').' $</label><br>
						<label>Рубли: '.number_format($_SESSION["user_date"]["EUR"],0,' ',' ').' €</label><br>
						<label>Номер паспорта: '.$_SESSION["user_date"]["nomer_pasporta"].'</label><br/>
						<label>Серия паспорта: '.$_SESSION["user_date"]["seria_pasporta"].'</label><br/>
						<label>Страна: '.$_SESSION["user_date"]["strana"].'</label>
						</div>';
				}	
			?>
</body>

</html>
