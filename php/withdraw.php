<?php
	session_start();
	include 'connect.php';
	if(isset($_POST["cnat"])){//снять деньги
		if(isset($_SESSION["user_date"])){
			$Summ_sn = $_POST["Summ_sn"];//поле для ввода суммы снятия
			$Val = $_POST["funct"];//Выбор валюты
				if($Summ_sn == 0 || $_SESSION["user_date"][$Val] < $Summ_sn){
					echo'<script> alert("Проверьте данные");</script>';
				}
				else{//снять деньги
					$Date = date("Y.m.d H:i:s");//время операции
					$_SESSION["user_date"][$Val] = $_SESSION["user_date"][$Val] - $Summ_sn;
					mysqli_query($connect,"UPDATE `client` SET `$Val`= '".$_SESSION["user_date"][$Val]."' WHERE `nomer_cheta` = '".$_SESSION["user_date"]["nomer_cheta"]."'");
					mysqli_query($connect,"INSERT INTO `oper`(`Name_otprav`, `Chet_otprav`, `ID_otprav`,`Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES('".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."',3,'$Summ_sn','$Val',2,'$Date')");
				}
		}
		else{
			echo'<script> alert("Не выбран клиент");</script>';
		}		
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
	<form method="post" action="" class="act">
		<h1>Введите данные</h1>
		<input type="text" class="form-control" name="Summ_sn" placeholder="Введите сумму снятия" /><br>
		<select name="funct" class="fasad">
			<option selected value="ноль">Выбор валюты</option>
			<?php
				$valut = mysqli_query ($connect, "SELECT * FROM `name_valut`");//Таблица с валютами
				while(($valut1 = mysqli_fetch_assoc($valut)) != false){
					echo'<option value = "'.$valut1["Name_val"].'">'.$valut1["Name_val"].'</option>';
				}
			?>
		</select>
		<input name="cnat" type="submit" value="Снять сумму" class="log_but" />
	</form>
</body>

</html>
