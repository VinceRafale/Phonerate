<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");




//Fil oplysninger

// Read the file


//Oprette siden
$tmpName = $_FILES['image']['tmp_name'];
$fp = fopen($tmpName, 'r');
$data1 = fread($fp, filesize($tmpName));
$data = addslashes($data1);
fclose($fp);



$sidenavn = addslashes($_POST[phonename]);
$sideHTML = addslashes($_POST[phoneinfo]);
$sortering = addslashes($_POST[phoneid]);
$categori = addslashes($_POST[cat]);


mysql_query("INSERT INTO phones (phonename, phoneinfo, phoneid, catid, phonephoto) VALUES('".$sidenavn."','".$sideHTML."','".$sortering."','".$categori."','".$data."')");


  
header("Location: phones.php");

die();

?>
