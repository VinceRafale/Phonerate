<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Oprette siden
$sidenavn = addslashes($_POST[sidenavn]);
$sideHTML = addslashes($_POST[sideHTML]);
$sortering = addslashes($_POST[sortering]);

mysql_query("UPDATE sider

set sidenavn = '".$sidenavn."',
	sideHTML = '".$sideHTML."',
	sortering = '".$sortering."'

WHERE sideid = '".$_POST[sideid]."'
");

header("Location: main.php");

die();

?>
