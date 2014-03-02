<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Rette telefonen



$sidenavn = addslashes($_POST[phonename]);
$sideHTML = $_POST[phoneinfo];
$sortering = addslashes($_POST[phoneid]);
$categori = addslashes($_POST[cat]);



$tmpName = $_FILES['image1']['tmp_name'];
$fp = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));
$data = addslashes($data);
fclose($fp);


mysql_query("UPDATE phones

set phonename = '".$sidenavn."',
	phoneinfo = '".$sideHTML."',
	phoneid = '".$sortering."',
	catid = '".$categori."',
	phonephoto = '".$data."'
WHERE phoneid = '".$_POST[phoneid]."'
");

header("Location: phones.php");

die();

?>
