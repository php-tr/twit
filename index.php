<?php
session_start();
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Her gün bir Fonksiyon.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />

	<script>
	function sinirhesap(form)
	{
	var aciklama =  document.getElementById('Message');
	var tadi =  document.getElementById('tadi');
	var fadi =  document.getElementById('fadi');
	var sinir = aciklama.value.length + fadi.value.length +  tadi.value.length;
	if ( sinir > 135 )
	{
	alert("Tweeter Name + Fonksiyon Adı + Fonksiyon Açılması = 135 karakter olmalıdır. Bu sınırı aştınız");
    return false;
	}
	else
	{
	form.submit();
    return false;
	}
	}
	</script>
</head>

<body>

<div id="page-wrap">
	<p>Her gün bir PHP Fonksiyonu Twitter'da. Sen de ekle !</p>

	<?php
	if(!empty($_POST))
	{
		$twitteradi = addslashes(trim($_POST['tadi']));
		if (!empty($twitteradi) && substr($twitteradi,0,1)!='@') {
			$twitteradi = '@'.$twitteradi;
		}

		$fonksiyonadi = addslashes(trim($_POST['fadi']));
		$fonkaciklama = addslashes(trim($_POST['faciklama']));
		$ktop = addslashes(trim($_POST['top']));
		$stop = addslashes(trim($_SESSION['toplam']));
		if ( $ktop == $stop)
		{
			$sorgu = "INSERT INTO tweets (Durum,aktive,twAdress,fAd,fText) values
				('0','0','$twitteradi','$fonksiyonadi','$fonkaciklama')";
			$kaydet = mysql_query($sorgu);

			if ($kaydet)
			{
			echo "<span style='color:red'>Kayıt alınmıştır, onaydan sonra twit listemize geçecektir...</span>";
			}
			else
			{
				echo "<span style='color:red'>Kayıt başarısız.</span>";
			}
		}
		else
		{
			echo "<span style='color:red'>Güvenlik Kodu Hatası!</span>";
		}
	}
	?>

	<div id="contact-area">
		<form method="post" onsubmit="return sinirhesap(this); return false;">
			<label for="tadi">Twitter Adınız: </label>
			<input type="text" name="tadi" id="tadi" placeholder="@kullaniciadi" />

			<label for="fonksiyonadi">Fonksiyon Adı :</label>
			<input type="text" name="fadi" id="fadi" placeholder="echo" />

			<label for="aciklamasi">Fonksiyon Açıklaması</label><br />
			<textarea name="faciklama" rows="20" cols="20" id="Message"></textarea>
			<?php
				$ilksayi =  rand (0,10);
				$ikincisayi =  rand (0,10);
				$toplam = $ilksayi + $ikincisayi;
				$_SESSION['toplam'] = $toplam;
			?>
			<label for="guvenlik"><?php echo $ilksayi."+".$ikincisayi."= ?"?> </label>
			<input type="text" name="top" id="top" />
			<br />
			<input type="submit" name="submit" value="Submit" class="submit-button"/>
		</form>
		php-tr.com | samet a
	</div>
</div>
</body>
</html>
