<?php
	session_start();
?>
<center>
	<form method="post" action="">
	<table>
	<tr>
		<td>Kullanıcı Adı:</td>
		<td><input type="text" name="kadi"></td>
	</tr>
	<tr>
		<td>şifreniz</td>
		<td><input type="password" name="sifre"></td>

	</tr>
	<tr>
		<td colspan='2'><input type="submit" value="gonder" style='float:right;'></td>

	</tr>
	</table>
	</form>
</center>

<?php
if(!empty($_POST)){
	$kullanici = "admin";
	$sifre = "admin";
	$fkullanici = $_POST["kadi"];
	$fsifre =  $_POST["sifre"];
	if($fkullanici == $kullanici and $fsifre == $sifre)
	{
		$_SESSION['oturumkontrol'] = "yonetici";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
	}
	else
	{
		echo "Kullanıcı adınızda veya şifrenizde hata var tekrar deneyin.";
	}
}
?>