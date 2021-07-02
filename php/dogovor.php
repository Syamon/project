<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
	$dogovor = mysqli_query ($connect, "SELECT * FROM `role` WHERE `ID_role` = '".$_SESSION["user"]["ID_role"]."'");
	$dogovor = mysqli_fetch_assoc($dogovor);
	$_SESSION["role"] = $dogovor;
	if(isset($_POST["exit"])){
		mysqli_query($connect,"INSERT INTO `dogovor`(`Num_dog`, `Name_klient`, `Nomer_cheta`, `Date_dogovor`, `FIO_user`, `Role_user`, `Name_action`) VALUES ('$Num_dog','".$_SESSION["user_date"]["name"]."','".$_SESSION["user_date"]["nomer_cheta"]."','".$_SESSION["Date_END"]."','".$_SESSION["user"]["FIO_user"]."','".$_SESSION["role"]["Role"]."','".$_SESSION["dog_action"]["Name_action"]."')");
		unset($_SESSION["user_date"]);
		unset($_SESSION["pol"]);
		exit("<meta http-equiv='refresh' content='0; url= account.php'>");
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<title> Договор</title>
</head>

<body>
	<form method="post">
		<input name="exit" type="submit" value="Обработать " class="log_but" /><br>
	</form>
	<div class="dog">
		<?php 
			$Num_dog = rand(0,10000);
			echo '
			<label>Имя Клиента: '.$_SESSION["user_date"]["name"].'</label><br/>
			<label>Номер счёта: '.$_SESSION["user_date"]["nomer_cheta"].' </label><br/>
			<label>Дата договора: '.$_SESSION["Date_END"].'</label><br/>
			<label>№ договора: № '.$Num_dog.' </label><br/>
			<label>ФИО сотрудника: '.$_SESSION["user"]["FIO_user"].'</label><br/>
			<label>Должность сотрудника: '.$_SESSION["role"]["Role"].'</label><br/>
			<table class = "table_dog"> 
					<CAPTION> 
						Отчёт
					</CAPTION>
						<TR> 
							<TH> 
								№ П/П
							</TH> 
							<TH> 
								Вид операции
							</TH> 
							<TH>
								сумма
							</TH>
						</TR>';
					$count = 0;
				$massages =  mysqli_query($connect, "SELECT * FROM `oper` WHERE (`Chet_otprav` = '".$_SESSION["user_date"]["nomer_cheta"]."') AND (`Data` BETWEEN CAST('".$_SESSION["Date_Start"]."' AS DATETIME) AND CAST('".$_SESSION["Date_END"]."' AS DATETIME));");	
				while(($row = mysqli_fetch_assoc($massages)) != null){
					$vid = mysqli_query ($connect, "SELECT * FROM `vid_oper` WHERE `ID_Vid` = '".$row["ID_vid_oper"]."'");
					$vid = mysqli_fetch_assoc($vid);
					$_SESSION["dog_action"] = $vid;				
					echo '<TR> 
					<TD> 
						'.$count++.'
					</TD> 
					<TD> 
						'.$vid["Name_oper"].'
					</TD> 
					<TD>
						'.$row["Summ"].'
					</TD>
				</TR>';
				}
				echo '</table>';
		?>
	</div>
</body>

</html>
