<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");

?>

<html>
<head>
<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
</head>
<body>
<div id="border">
<div id="indhold">
<form method="get" action="main.php">
    <button type="submit">Tilbage</button>
</form>

<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<br>
<form method="post" action="opret-post.php" name="OpretSideFormular">

Sidenavn:<input type="text" name="sidenavn" maxlength="100">
<br> <br>
Indhold:<br>




<textarea rows="10" cols="30" name="sideHTML"> </textarea>
<br>
<br>

Sortering/ID:<br>
<input type="text" name="sortering" maxlength="4" style="width:35px">

<br>

<br>

<input type="submit" value="Opret side">
</form>
</div>
</div>
</body>
</html>
