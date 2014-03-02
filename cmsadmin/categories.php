<?php


//bner en mysql forbindelse og starter session
include("../inc/connection.php");

//Tjekker om brugeren er logget ind
include("../inc/tjeklogin.php");
$HentCat = mysql_query("SELECT * FROM categories ORDER BY catid ASC");

$HentDataCat = mysql_query("SELECT * FROM categories WHERE catid = '".$_GET[id]."'");
$SideDataCat = mysql_fetch_array($HentDataCat);
?>
<html>

<head>
<title></title>
<link rel="stylesheet" href="css/maincss.css" type="text/css"/>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<meta charset="utf-8">
</head>
<body>
<div id="border">
<div id="indhold">
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<h1> Velkommen til administrationen </h1>

<button type="button" class="btn btn-primary"> <a style="color:white;" href="logud.php">Log ud </a></button>
<br>
<br>
<nav class="navbar navbar-default" role="navigation">

	<ul class="nav navbar-nav">
      <li ><a href="main.php">Sider</a></li>
      <li><a href="phones.php">Telefoner</a></li>
	  <li><a href="ratings.php">Ratings</a></li>
	   <li><a href="categories.php">Kategorier</a></li>
	  <li><a href="users.php">Brugere</a></li>
	</ul>


</nav>


<button type="button" class="btn btn-success"><a style="color: white;"href="opretcat.php">Opret kategori</a></button>
<br><br>
<table class="table table-bordered" widt="600" border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td><strong>Sortering</strong></td>
		<td width="50%"><strong>Kategori navn</strong></td>
		<td class="success"><strong>Funktioner</strong></td>
	</tr>
	<?php
	
		while($SideDataCat = mysql_fetch_array($HentCat))
		{
			
			echo '<tr><td>'.$SideDataCat[catid].'</td><td>'.$SideDataCat[catname].'</td><td><button type="button" class="btn btn-warning"><a style="color: white;" href="retcat.php?id='.$SideDataCat[catid].'">Ret</a></button></td><td><button type="button" class="btn btn-danger"><a style="color: white;" href="sletcat.php?id='.$SideDataCat[catid].'">Slet</a> </button> </td></tr>';
			
		}
	
	
	?>
</table>







<br>

</div>
</div>
</body>
</html>