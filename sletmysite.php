<?php

include("inc/connection.php");

$HentData = mysql_query("SELECT * FROM rating WHERE ratingid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);



mysql_query("DELETE FROM rating WHERE ratingid = '$_GET[id]'") or die(mysql_error());

header("Location: mysite.php");

die();


?>