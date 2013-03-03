<?php
include("config.php");
$tID = addslashes(trim($_GET['id']));
$sorgu=mysql_query("UPDATE tweets SET aktive = 1 where tID=".$tID);

if($sorgu)
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}
else
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}

?>
