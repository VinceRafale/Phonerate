<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");

//Rette telefonen
$sidenavn = addslashes($_POST[catname]);

$sortering = addslashes($_POST[catid]);

mysql_query("UPDATE categories

set catname = '".$sidenavn."',
	
	catid = '".$sortering."'

WHERE catid = '".$_POST[catid]."'
");

header("Location: categories.php");

die();

?>
