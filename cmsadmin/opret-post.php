<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Oprette siden
$sidenavn = addslashes($_POST[sidenavn]);
$sideHTML = addslashes($_POST[sideHTML]);
$sortering = addslashes($_POST[sortering]);

mysql_query("INSERT INTO sider(sidenavn, sideHTML, sortering) VALUES('".$sidenavn."','".$sideHTML."','".$sortering."')");

header("Location: main.php");

die();

?>
