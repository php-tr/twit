<?php
include("config.php");
$tID = addslashes(trim($_GET['id']));
$sorgu=mysql_query("UPDATE tweets SET aktive = 1 where tID=".$tID);

header('Location: admin.php');

?>
