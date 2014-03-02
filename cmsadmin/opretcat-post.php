<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Oprette siden
$sidenavn = addslashes($_POST[catname]);
$sortering = addslashes($_POST[phoneid]);


mysql_query("INSERT INTO categories(catname, catid) VALUES('".$sidenavn."','".$sortering."')");


header("Location: categories.php");

die();

?>
