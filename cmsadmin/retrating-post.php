<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Rette telefonen
$sidenavn = addslashes($_POST[facebookname]);
$sideHTML = $_POST[ratingcomment];
$Ratingpoint = addslashes($_POST[ratingpoint]);

mysql_query("UPDATE rating

set facebookname = '".$sidenavn."',
	ratingcomment = '".$sideHTML."',
	ratingpoint = '".$Ratingpoint."'
WHERE ratingid = '".$_POST[ratingid]."'
");

header("Location: ratings.php");

die();

?>
