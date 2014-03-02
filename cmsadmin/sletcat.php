<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");
$HentData = mysql_query("SELECT * FROM categories WHERE catid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);



mysql_query("DELETE FROM categories WHERE catid = '$_GET[id]'") or die(mysql_error());

header("Location: categories.php");

die();

?>


