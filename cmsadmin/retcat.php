<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");

$HentData = mysql_query("SELECT * FROM categories WHERE catid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);

$HentPhones = mysql_query("SELECT * FROM phones WHERE catid = '".$_GET[id]."'");


?>
<html>
<head>
	
	<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
</head>
<body>

<div id="border">
<div id="indhold">
<form method="get" action="categories.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<form method="post" action="retcat-post.php" name="OpretSideFormular">
<br><br>
<div class="input-group">
		<div class="input-group input-group-lg">
				
				<span class="input-group-addon">Kategori navn</span>
				<input class="form-control" type="text" name="catname" maxlength="100" value="<?=$SideData[catname]?>">
</div>
<br> <br>

<br>
<input type="hidden" name="catid" maxlength="4" style="width:35px" value="<?=$SideData[catid]?>">

<input type="hidden" name="catid" value="<?=$_GET[id]?>">
<input class="btn btn-success" type="submit" value="Ret Kategori">
</form>
</div>

Telefoner i denne kategori:
<br>
<br>
<?php
while($SideDataPhones = mysql_fetch_array($HentPhones))
		{
			
			echo '<ul ><li>'.$SideDataPhones[phonename].'</il></ul>';
			
		}





?>






</div>
</body>
</html>

