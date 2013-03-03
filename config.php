<?php
/*
Yazılım : Samet ARABACIOĞLU
Mail: smt.arabacioglu@gmail.com
Tel : 0532 445 79 51
*/


//Bağlantı
$kullaniciadi="";
$sifre= "";
$host="";
$veritabani="";

//Veri Tabanı
$baglan=mysql_connect($host,$kullaniciadi,$sifre);
mysql_select_db($veritabani,$baglan);
mysql_query("SET NAMES 'utf8'");
?>