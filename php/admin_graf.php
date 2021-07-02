<?php
    include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
	$id_oper;
	$date_from;
	$date_to;
	if(isset($_POST["vid_oper"])){
		$id_oper = mysqli_query($connect,"SELECT `ID_Vid` FROM `vid_oper` WHERE `Name_oper` = '".$_POST["vid_oper"]."'");
		$id_oper = mysqli_fetch_assoc($id_oper);
		$date_from = $_POST["date_do"];
		$date_to = $_POST["date_pos"];
	}
    $RUB =  mysqli_query($connect, "SELECT SUM(Summ) As `sum` FROM `oper` WHERE `Data` BETWEEN '$date_from' AND '$date_to' AND `ID_vid_oper` = ".$id_oper["ID_Vid"]." AND `Name_val` = 'RUB'");
    $RUB = mysqli_fetch_assoc($RUB);
    $USD =  mysqli_query($connect, "SELECT SUM(Summ) As `sum` FROM `oper` WHERE `Data` BETWEEN '$date_from' AND '$date_to' AND `ID_vid_oper` = ".$id_oper["ID_Vid"]." AND `Name_val` = 'USD'");
    $USD = mysqli_fetch_assoc($USD);
    $EUR =  mysqli_query($connect, "SELECT SUM(Summ) As `sum` FROM `oper` WHERE `Data` BETWEEN '$date_from' AND '$date_to' AND `ID_vid_oper` = ".$id_oper["ID_Vid"]." AND `Name_val` = 'EUR'");
    $EUR = mysqli_fetch_assoc($EUR);
    $CHF =  mysqli_query($connect, "SELECT SUM(Summ) As `sum` FROM `oper` WHERE `Data` BETWEEN '$date_from' AND '$date_to' AND `ID_vid_oper` = ".$id_oper["ID_Vid"]." AND `Name_val` = 'CHF'");
    $CHF = mysqli_fetch_assoc($CHF);
    $CZK =  mysqli_query($connect, "SELECT SUM(Summ) As `sum` FROM `oper` WHERE `Data` BETWEEN '$date_from' AND '$date_to' AND `ID_vid_oper` = ".$id_oper["ID_Vid"]." AND `Name_val` = 'CZK'");
    $CZK = mysqli_fetch_assoc($CZK);
    echo json_encode(array("RUB" => $RUB["sum"],"USD" => $USD["sum"],"EUR" => $EUR["sum"],"CHF" => $CHF["sum"],"CZK" => $CZK["sum"]));
?>
