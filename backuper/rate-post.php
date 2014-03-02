<?php

include("inc/connection.php");

mysql_select_db("phonerate_dk_db") or die(mysql_error());



//Oprette siden
$HentData = mysql_query("SELECT * FROM rating")
or die(mysql_error());  
$SideData = mysql_fetch_array($HentData);

$sidenavn = addslashes($_POST[ratingtitle]);
$sideHTML = addslashes($_POST[ratingcomment]);
$sidesortering = addslashes($_POST[sidesortering]);
$ratingpoint = addslashes($_POST[ratingpoint]);




mysql_query("INSERT INTO rating(ratingtitle, ratingcomment, sidesortering, ratingpoint) VALUES('".$sidenavn."','".$sideHTML."','".$sidesortering."','".$ratingpoint."')");


header("Location: phones.php");

die();

?>
