<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");
$HentData = mysql_query("SELECT * FROM phones WHERE phoneid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);



mysql_query("DELETE FROM phones WHERE phoneid = '$_GET[id]'") or die(mysql_error());

header("Location: phones.php");

die();

?>


