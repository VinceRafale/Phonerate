<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");

?>

<html>
<head>
<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<meta charset="utf-8">
</head>
<body>
<div id="border">
<div id="indhold">
<form method="get" action="categories.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>

<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<br><br>
<form method="post" action="opretcat-post.php" name="OpretCatFormular">

<div class="input-group">
<div class="input-group input-group-lg">


<span class="input-group-addon">Kategorinavn</span>
<input class="form-control" type="text" name="catname" maxlength="100">


</div>
<br>
<br>
<input class="btn btn-success" type="submit" value="Opret kategori">
</form>
</div>
</div>
</body>
</html>
