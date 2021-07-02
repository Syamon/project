<?php
	session_start();
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}
	if($_POST["myString"]){
		$_SESSION["myString"] = $_POST['myString'];
		$cities =  mysqli_query($connect, "SELECT t1.*, t2.`Name_val` FROM `valuta` t1 LEFT JOIN `name_valut` t2 ON t1.Name_val = t2.ID_valut WHERE t2.`Name_val` = '".$_SESSION["myString"]."'");
		$citi = mysqli_fetch_assoc($cities);		
		$pro = $citi["Prodach_val"];
		$pro.= ",";
		$poc = $citi["Pocup_val"];
		echo $pro;
		echo $poc;	
		exit();
	}
?>