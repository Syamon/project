<?php
	session_start();
	include 'connect.php';
	if(isset($_POST["but"])){//купить валюту
		if(isset($_SESSION["user_date"])){//проверка данных о клиенте
			if($_POST["val"] == ""){//проверка поля для введения суммы
				echo'<script> alert("Впишите сумму");</script>';
			}
			else{
				$currency = $_POST["funct"];//выбор валюты
				$action = $_POST["buy"];//Выбор операции:купить/продать
				$valut = mysqli_query($connect,"SELECT t1.Name_val, t1.Pocup_val, t1.Prodach_val, t2.Name_val FROM valuta t1 LEFT JOIN name_valut t2 ON t1.Name_val = t2.ID_valut WHERE t2.Name_val = '$currency'");
				$valut = mysqli_fetch_assoc($valut);
				if($action == "buy" && $_SESSION["user_date"][$currency] >= $_POST["val"]){//покупка валюты
					$Date = date("Y.m.d H:i:s");
					$SUMM1 = $_POST["val"];
					$Rezult1 = $SUMM1 / $valut["Pocup_val"];  
					$_SESSION["user_date"]["RUB"] = $_SESSION["user_date"]["RUB"] - $SUMM1;				
					$_SESSION["user_date"][$currency] = $_SESSION["user_date"][$currency] + $Rezult1;
					mysqli_query($connect,"UPDATE `client` SET `RUB` = '".$_SESSION["user_date"]["RUB"]."', `$currency` = '".$_SESSION["user_date"][$currency]."' WHERE `nomer_cheta` = '".$_SESSION["user_date"]["nomer_cheta"]."'");
					mysqli_query($connect,"INSERT INTO `oper`(`Name_otprav`, `Chet_otprav`, `ID_otprav`,`Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES('".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."',3,'$SUMM1','$currency',3,'$Date')");
				}
				elseif($action == "sell" && $_SESSION["user_date"][$currency] >= $_POST["val"]){//продажа валюты
					$Date = date("Y.m.d H:i:s");
					$SUMM2 = $_POST["val"];
					$Rezult2 = $SUMM2 * $valut["Prodach_val"];  
					$_SESSION["user_date"][$currency] = $_SESSION["user_date"][$currency] - $SUMM2;
					$_SESSION["user_date"]["RUB"] = $_SESSION["user_date"]["RUB"] + $Rezult2;
					mysqli_query($connect,"UPDATE `client` SET `RUB` = '".$_SESSION["user_date"]["RUB"]."', `$currency` = '".$_SESSION["user_date"][$currency]."' WHERE `nomer_cheta` = '".$_SESSION["user_date"]["nomer_cheta"]."'");
					mysqli_query($connect,"INSERT INTO `oper`(`Name_otprav`, `Chet_otprav`, `ID_otprav`,`Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES('".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."',3,'$SUMM2','$currency',3,'$Date')");
				}
				else{
					echo'<script> alert("Не достаточно средств на счету или не выбраны значения");</script>';
				}
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
	<div class="valuta">
		<?php
				include "table.php";
			?>
	</div>
	<form method="post" action="" class="act">
		<h1>Введите данные</h1>
		<input type="text" class="form-control" name="val" placeholder="Введите сумму" /><br>
		<select name="funct" class="fasad">
			<option selected value="ноль">Выбор валюты</option>
			<?php
				$valut = mysqli_query ($connect, "SELECT * FROM `valuta`");//Таблица с валютами
					while(($valut1 = mysqli_fetch_assoc($valut)) != false){
						$Naim_val = mysqli_query ($connect, "SELECT * FROM `name_valut` WHERE `ID_valut` = '".$valut1["Name_val"]."'");//
						$Naim_val = mysqli_fetch_assoc($Naim_val);
						echo'<option value = "'.$Naim_val["Name_val"].'">'.$Naim_val["Name_val"].'</option>';
					}
				?>
		</select>
		<select name="buy" class="fasad">
			<option selected value="ноль">Операция</option>
			<option value="buy">Покупка</option>
			<option value="sell">Продажа</option>
		</select>
		<input name="but" type="submit" value="Обработать" class="log_but" />
	</form>
</body>

</html>
