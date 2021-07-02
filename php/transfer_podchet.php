<?php
	session_start();
	if($Val1 != $Val2 && $_SESSION["valut_client"] != "" && $_SESSION["valut_poluch"] != ""){
		$Summ_per = ($Summ1 * $_SESSION["valut_client"]["Prodach_val"]) / $_SESSION["valut_poluch"]["Pocup_val"];//подсчет перевода валюты в валюту
	}
	elseif($Val1 != $Val2 && $_SESSION["valut_client"] == "" && $_SESSION["valut_poluch"] != ""){
		$Summ_per = $Summ1 / $_SESSION["valut_poluch"]["Pocup_val"];
	}
	elseif($Val1 != $Val2 && $_SESSION["valut_client"] != "" && $_SESSION["valut_poluch"] == ""){
		$Summ_per = $Summ1 * $_SESSION["valut_client"]["Prodach_val"];
	}
	else{
		$Summ_per = $Summ1;
	}
?>