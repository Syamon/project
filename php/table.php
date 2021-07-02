<?php
	include 'connect.php';
	if($connect == false){
		echo"Сбой подключения";
		exit();
	}	
	echo'<table class = "table">
			<CAPTION> 
				Курс валют
			</CAPTION>
				<TR> 
					<TD> 
						Валюта
					</TD> 
					<TD> 
						Покупка
					</TD> 
					<TD>
						Продажа
					</TD>
				</TR>';
	$valut = mysqli_query ($connect, "SELECT * FROM `valuta`");//Таблица с валютами
		while(($valut1 = mysqli_fetch_assoc($valut)) != false){
		 	$Naim_val = mysqli_query ($connect, "SELECT * FROM `name_valut` WHERE `ID_valut` = '".$valut1["Name_val"]."'");//
		 	$Naim_val = mysqli_fetch_assoc($Naim_val);
			echo'<TR> 
					<TD> 
						'.$Naim_val["Name_val"].'/RUB
					</TD> 
					<TD> 
						'.$valut1["Pocup_val"].'
					</TD> 
					<TD>
						'.$valut1["Prodach_val"].'
					</TD>
					</TR>';
	 }
		echo '</table>';
?>
