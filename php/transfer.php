<?php
	session_start();
	include 'connect.php';
	if(isset($_POST["otprav"])){//перевод денег
		if(isset($_SESSION["user_date"])){
			$Date = date("Y.m.d H:i:s");
			$chet = $_POST["Chet_pol"];
			$Summ1 = $_POST["Summ_ot"];
			$Val1 = $_POST["valut_client"];
			$Val2 = $_POST["valut_poluch"];
			if($chet == 0 || $Summ1 == 0 || $Val1 == "" || $Val2 == ""){//Проверка полей на пустоту
				echo'<script> alert("Данные введены не корректно");</script>';
			}
			else{//запрос данных получателя
				$user_polu = mysqli_query ($connect, "SELECT * FROM `client` WHERE `nomer_cheta` = '$chet'");//запрос данных получателя
				$user_polu = mysqli_fetch_assoc($user_polu);
				$_SESSION["pol"] = $user_polu;
				$strana = mysqli_query ($connect, "SELECT * FROM `commission` WHERE `Сountry` = '".$_SESSION["pol"]["strana"]."'");//запрос данных о комиссии
				$strana = mysqli_fetch_assoc($strana);
				$_SESSION["strana"] = $strana;	
				$valut = mysqli_query ($connect, "SELECT t1.Pocup_val, t1.Prodach_val, t2.Name_val FROM valuta t1 LEFT JOIN name_valut t2 ON t1.Name_val = t2.ID_valut WHERE t2.`Name_val`  = '$Val1'");//запрос курса валют
				$valut = mysqli_fetch_assoc($valut);
				$_SESSION["valut_client"] = $valut;
				$valut_pol = mysqli_query ($connect, "SELECT t1.Pocup_val, t1.Prodach_val, t2.Name_val FROM valuta t1 LEFT JOIN name_valut t2 ON t1.Name_val = t2.ID_valut WHERE t2.`Name_val`  = '$Val2'");//запрос курса валют
				$valut_pol = mysqli_fetch_assoc($valut_pol);
				$_SESSION["valut_poluch"] = $valut_pol;
			}	
			if($_SESSION["pol"] == "" || $Summ > $_SESSION["user_date"][$Val1]){//проверка существования данных о получателе и сумме перевода
				echo'<script> alert("Не выбран клиент или средств недостаточно");</script>';
			}
			else{
				if($_SESSION["pol"]["strana"] != $_SESSION["user_date"]["strana"]){	
					include 'transfer_podchet.php';
					$prib_organiz = $Summ1 * ($_SESSION["strana"]["commission"] / 100);//подсчет прибыли организации
					$Summ = $Summ1 * $_SESSION["strana"]["commission"];
					mysqli_query($connect,"INSERT INTO `prib_organiz`(`Date_prib`, `Summ_prib`) VALUES ('$Date','$prib_organiz')");
					mysqli_query($connect,"INSERT INTO `oper`(`Name_otprav`, `Chet_otprav`, `ID_otprav`, `Name_pol`, `Chet_pol`, `ID_pol`, `Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES ('".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."',3,'".$_SESSION["pol"]["name"]."','$chet',4,'$Summ_per','$Val1',1,'$Date')");
					$_SESSION["user_date"][$Val1] = $_SESSION["user_date"][$Val1] - $Summ;
					$_SESSION["pol"][$Val2] = $_SESSION["pol"][$Val2] + $Summ_per;
					mysqli_query($connect,"UPDATE `client` SET `$Val1` = '".$_SESSION["user_date"][$Val1]."' WHERE `nomer_cheta` = '".$_SESSION["user_date"]["nomer_cheta"]."'");
					mysqli_query($connect,"UPDATE `client` SET `$Val2` = '".$_SESSION["pol"][$Val2]."' WHERE `nomer_cheta` = '".$_SESSION["pol"]["nomer_cheta"]."'");	
				}
				else{
					include 'transfer_podchet.php';
					mysqli_query($connect,"INSERT INTO `oper`(`Name_otprav`, `Chet_otprav`, `ID_otprav`, `Name_pol`, `Chet_pol`, `ID_pol`, `Summ`, `Name_val`, `ID_vid_oper`, `Data`) VALUES ('".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."',3,'".$_SESSION["pol"]["name"]."','$chet',4,'$Summ_per','$Val2',1,'$Date')");
					$_SESSION["user_date"][$Val1] = $_SESSION["user_date"][$Val1] - $Summ;
					$_SESSION["pol"][$Val2] = $_SESSION["pol"][$Val2] +  $Summ;
					mysqli_query($connect,"UPDATE `client` SET `$Val1` = '".$_SESSION["user_date"][$Val1]."' WHERE `nomer_cheta` = '".$_SESSION["user_date"]["nomer_cheta"]."'");
					mysqli_query($connect,"UPDATE `client` SET `$Val1` = '".$_SESSION["pol"][$Val2]."' WHERE `nomer_cheta` = '".$_SESSION["pol"]["nomer_cheta"]."'");					
				}
			}
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
		<input type="text" class="form-control" name="Chet_pol" placeholder="Введите счёт получатеся" autocomplete="off" list="Num_chet" /><br>
		<input type="text" class="form-control" name="Summ_ot" placeholder="Введите сумму перевода" /><br>
		<select name="valut_client" class="fasad">
			<option selected value="ноль">Выбор валюты клиента</option>
			<?php
				$valut = mysqli_query ($connect, "SELECT * FROM `name_valut`");//Таблица с валютами
				while(($valut1 = mysqli_fetch_assoc($valut)) != false){
					echo'<option value = "'.$valut1["Name_val"].'">'.$valut1["Name_val"].'</option>';
				}
			?>
		</select><br>
		<select name="valut_poluch" class="fasad">
			<option selected value="ноль">Выбор валюты получателя</option>
			<?php
				$valut_pol = mysqli_query ($connect, "SELECT * FROM `name_valut`");//Таблица с валютами
				while(($valut1_pol = mysqli_fetch_assoc($valut_pol)) != false){
					echo'<option value = "'.$valut1_pol["Name_val"].'">'.$valut1_pol["Name_val"].'</option>';
				}
			?>
		</select>
		<datalist id="Num_chet">
			<?php
				$clients =  mysqli_query($connect, "SELECT * FROM `client` WHERE `nomer_cheta` != '".$_SESSION["user_date"]["nomer_cheta"]."'");
					while(($row = mysqli_fetch_assoc($clients))!= false){
						echo"<option value = '".$row["nomer_cheta"]."'>".$row["name"]."</option>";
					}
			?>
		</datalist>
		<input name="otprav" type="submit" value="Перечислить" class="log_but" />
	</form>
</body>

</html>
