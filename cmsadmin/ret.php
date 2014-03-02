<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");

$HentData = mysql_query("SELECT * FROM sider WHERE sideid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);
?>
<html>
<head>
		<meta charset="utf-8">
	<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
	
</head>
<body>

<div id=border>
<div id=indhold>
<form method="get" action="main.php">
    <button type="submit">Tilbage</button>
</form>
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<form method="post" action="ret-post.php" name="OpretSideFormular">
<br>
Sidenavn:<input type="text" name="sidenavn" maxlength="100" value="<?=$SideData[sidenavn]?>">
<br> <br>
Indhold:<br>
<textarea rows="10" cols="30" name="sideHTML"> <?=$SideData[sideHTML]?> </textarea>
<br>
<br>

Sortering/ID:<br>
<input type="text" name="sortering" maxlength="4" style="width:35px" value="<?=$SideData[sortering]?>">

<br>

<br>
<input type="hidden" name="sideid" value="<?=$_GET[id]?>">
<input type="submit" value="Ret side">
</form>
</div>
</div>
</body>
</html>

