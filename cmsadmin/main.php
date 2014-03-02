<?php


//bner en mysql forbindelse og starter session
include("../inc/connection.php");

//Tjekker om brugeren er logget ind
include("../inc/tjeklogin.php");
$HentSider =mysql_query("SELECT * FROM sider ORDER BY sortering ASC");

$HentData = mysql_query("SELECT * FROM sider WHERE sideid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);
?>
<html>

<head>
<meta content="text/html; charset=iso-8859-1">
<title></title>
<link rel="stylesheet" href="css/maincss.css" type="text/css"/>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
</head>
<body>
<div id="border">
<div id="indhold">
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<h1> Velkommen til administrationen </h1>

<button type="button" class="btn btn-primary"><a style="color:white;" href="logud.php">Log ud </a></button>
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
<br>

		<div class="alert alert-danger">Du mŒ ikke oprette eller slette sider!</div>	



<a href="opret.php"><h4> Opret side </h4></a>

<table widt="600" border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td><strong>Sortering</strong></td>
		<td width="50%"><strong>Sidenavn</strong></td>
		<td><strong>Funktioner</strong></td>
	</tr>
	<?php
	
		while($SideData = mysql_fetch_array($HentSider))
		{
			
			echo '<tr><td>'.$SideData[sortering].'</td><td>'.$SideData[sidenavn].'</td><td><a href="ret.php?id='.$SideData[sideid].'">Ret</a></td><td> <a href="slet.php?id='.$SideData[sideid].'">Slet</a>  </td></tr>';
			
		}
	
	
	?>
</table>







<br>

</div>
</div>
</body>
</html>