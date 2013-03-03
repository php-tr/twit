<?php
	include("config.php");
	include("twFonk.php");

	$sorgu=mysql_query("Select tID,fAd,fText,twAdress from tweets where aktive='1' ORDER BY Durum ASC LIMIT 1");
	$veriler = mysql_fetch_array($sorgu);

	if (count($veriler)>0) {
		$tID = $veriler['tID'];
		$fonksiyonadi = $veriler['fAd'];
		$fonksiyonaciklama = $veriler['fText'];
		$twAdress = $veriler['twAdress'];
		if (!empty($twAdress) && substr($twAdress,0,1)!='@') {
			$twAdress = '@'.$twAdress;
		}

		$icerik = $fonksiyonadi.":". $fonksiyonaciklama." ".$twAdress . "";
		twitUpdate($icerik);

		$sorgu=mysql_query("UPDATE tweets SET Durum=Durum+1 where tID=".$tID);
		echo "tamam";
	}
	else {
		echo "veri yok!!";
	}

?>