<?php
session_start();

if (!isset ($_SESSION['oturumkontrol']))
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	die();
}

include ("config.php");

echo "
<html>
<head>
<title>Yönetim Paneli</title>
<link rel='stylesheet' type='text/css' media='all' href='admin.css' />
</head>
<body>
<p style='float:right;'><a href='cikis.php'> <img src='images/cikis.png' title='çıkış'> </a><p>
<center><table id='rounded-corner' summary='bomba'>
    <thead>
    	<tr>
            <th scope='col' class='rounded'>iD</th>
            <th scope='col' class='rounded'>Gönderilme Durumu</th>
            <th scope='col' class='rounded'>Yönetici Onayı</th>
            <th scope='col' class='rounded'>Twitter Adresi</th>
            <th scope='col' class='rounded'>Fonksiyon Adı</th>
            <th scope='col' class='rounded'>Fonksiyon Açıklaması</th>
			<th scope='col' class='rounded'>Onay</th>
        </tr>
    </thead>
";

$sayfa = intval($_GET['sayfa']);
if(!$sayfa) $sayfa = 1;
$toplam =  mysql_num_rows(mysql_query("Select * from tweets"));
$limit = 10;
$goster = $sayfa * $limit - $limit;
$sorgu = mysql_query("select * from tweets limit $goster,$limit");

while ($listele = mysql_fetch_array($sorgu)) {

$id   = $listele['tID'];
$durum = $listele['Durum'];
$aktive = $listele['aktive'];
$twAdress = $listele['twAdress'];
$fAd = $listele['fAd'];
$fText = $listele['fText'];
    if ( $durum >0)
	{
		$durum = "<center><img src='images/check.png' title='gönderilmiş'></center>";
	}
	else
	{
		$durum = "<center><img src='images/none.png' title='beklemede'></center>";
	}

	if ($aktive == 1)
	{
		$aktive="<center><img src='images/check.png' title='onaylı'></center>";
	}
	else
	{
		$aktive= "<center><a href='onayla.php?id=$id'><img src='images/none.png' title='onay ver'></a></center>";
	}


echo "
    <tbody>
    	<tr>
<td>$id</td>
<td>$durum</td>
<td>$aktive</td>
<td>$twAdress</td>
<td>$fAd</td>
<td>$fText</td>

        </tr>
    </tbody>
";

}

echo "
</table>
";
$topsayfa = ceil($toplam/$limit);
$fflimit = 2;
echo '<div class="sayfalama">';
if ($sayfa > 1)
{
	$onceki = $sayfa - 1 ;
	echo '<a class="sayfa" href="admin.php?sayfa=1">ilk</a><a class="sayfa" href="admin.php?sayfa='.$onceki.'">Önceki</a>';
}
for ($i = $sayfa - $fflimit; $i < $sayfa + $fflimit + 1; $i++){
	if($i>0 && $i <= $topsayfa)
	{
		if ( $i == $sayfa){
			echo '<span class="aktif">'.$i.'</span>';
		}
		else {
			echo '<a class="sayfa" href="admin.php?sayfa='.$i.'">'.$i.'</a>';
		}

	}
}
if ($sayfa != $topsayfa)
{
	echo '<a  class="sayfa" href="admin.php?sayfa='.($sayfa+1).'">Sonraki</a><a class="sayfa" href="admin.php?sayfa='.$topsayfa.'">Son</a>';
}

echo"</div></center>
</body>
</html>";
?>