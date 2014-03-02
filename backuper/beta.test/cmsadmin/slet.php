<?php

include("../inc/connection.php");
include("../inc/tjeklogin.php");
$HentData = mysql_query("SELECT * FROM sider WHERE sideid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);



mysql_query("DELETE FROM sider WHERE sideid = '$_GET[id]'") or die(mysql_error());

header("Location: main.php");

die();

?>


