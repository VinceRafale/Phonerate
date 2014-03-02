<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");

$HentData = mysql_query("SELECT * FROM phones WHERE phoneid = '".$_GET[id]."'");
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
<form method="get" action="phones.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<form method="post" action="retphone-post.php" name="OpretSideFormular">
<br>

	<div class="input-group">
		<div class="input-group input-group-lg">
				
				<span class="input-group-addon">Telefonnavn</span>

		<input class="form-control" type="text" name="phonename" maxlength="100" value="<?=$SideData[phonename]?>">
	</div>
<br> <br>
Beskrivelse:<br>
<textarea class="form-control" rows="10" cols="30" name="phoneinfo"><?=$SideData[phoneinfo]?></textarea>
<br>
<br>

<!--Sortering/ID:<br>
<input type="text" name="phoneid" maxlength="4" style="width:35px" value="<?=$SideData[phoneid]?>">
-->
<br>
  <select class="form-control" name="cat">
<?php

		$HentCatDataQuery = mysql_query("SELECT * FROM categories ORDER BY catid ASC");
		
while($CatData = mysql_fetch_array($HentCatDataQuery))
		{

			$cats .=
			"<option  name='cat' value=".$CatData[catid].">".$CatData[catname]."</option>";


}

echo $cats;
var_dump($CatData[catid]);

		

?>
</select>
<br><br><br>

<legend>Billede af telefonen</legend>
<?php
   $id = addslashes($_GET[id]);
   $phonephotoquery = mysql_query("SELECT phonephoto FROM phones WHERE phoneid='$id'");
   $phonephotofetch = mysql_fetch_array($phonephotoquery);
   $phonephotofetchcontent = $phonephotofetch['phonephoto'];
    echo "<br>";
   
echo '<img width="180" height="190" src="data:image/jpeg;base64,' . base64_encode($phonephotofetchcontent) .'"  />';   
   ?>

<!--
<label for="userFile">Vælg et billede af telefonen på din pc:SKAL VÆRE 180x190 </label>
<input type="file" size="40" name="image1" id="userFile"/><br />
-->
</fieldset>

<br>
<br>
<input class="form-control" type="hidden" name="phoneid" value="<?=$_GET[id]?>">
<input class="btn btn-success" type="submit" value="Ret telefon">
</form>
</div>
</div>
</body>
</html>

