<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");



$HentData = mysql_query("SELECT * FROM rating WHERE ratingid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);


?>
<html>
<head>
	
	<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>



</head>
<body>

<div id=border>
<div id=indhold>
<form method="get" action="ratings.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<form method="post" action="retrating-post.php" name="OpretSideFormular">
<br>

	<div class="input-group">
		<div class="input-group input-group-lg">
				
				<span class="input-group-addon">Facebook/Anmelder navn</span>

		<input class="form-control" type="text" name="facebookname" maxlength="300" value="<?=$SideData[facebookname]?>">
	</div>
<br> <br>
Kommentar:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcomment]?> </textarea>
<br>
<br>
<div class="input-group">
		<div class="input-group input-group-lg">
				
				<span class="input-group-addon">Stjerne(r)</span>

		<input class="form-control" type="text" name="ratingpoint" maxlength="300" value="<?=$SideData[ratingpoint]?>">
	</div>
<br>

<!--Sortering/ID:<br>
<input type="text" name="phoneid" maxlength="4" style="width:35px" value="<?=$SideData[phoneid]?>">
-->
<br>
 
<br>
<br>
<input class="form-control" type="hidden" name="ratingid" value="<?=$_GET[id]?>">
<input class="btn btn-success" type="submit" value="Ret anmeldelse">
</form>
</div>
</div>
</body>
</html>

