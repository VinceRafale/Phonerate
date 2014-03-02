<?php


//bner en mysql forbindelse og starter session
include("../inc/connection.php");

//Tjekker om brugeren er logget ind
include("../inc/tjeklogin.php");
$HentPhones = mysql_query("SELECT * FROM phones ORDER BY phoneid ASC");

$HentDataPhones = mysql_query("SELECT * FROM phones WHERE phoneid = '".$_GET[id]."'");
$SideDataPhones = mysql_fetch_array($HentDataPhones);
?>
<html>

<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/maincss.css" type="text/css"/>
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
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
<button type="button" class="btn btn-success"><a style="color: white;" href="opretphone.php"> Opret telefon </a></button>
<br>
<div id="telefoner">
<br>
<table class="table table-bordered" widt="600" border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td><strong>Telefon id:</strong></td>
		<td ><strong>Kategori</strong></td>
		<td width="50%"><strong>Telefon navn</strong></td>
		<td class="success"><strong>Funktioner</strong></td>
	</tr>
	<?php
	
		while($SideDataPhones = mysql_fetch_array($HentPhones))
		{
			
			echo '<tr><td>'.$SideDataPhones[phoneid].'</td><td>ID: '.$SideDataPhones[catid].' </td><td>'.$SideDataPhones[phonename].'</td><td><button type="button" class="btn btn-warning"><a style="color: white;" href="retphone.php?id='.$SideDataPhones[phoneid].'">Ret</a></button</td><td><button type="button" class="btn btn-danger"> <a style="color: white;" href="sletphone.php?id='.$SideDataPhones[phoneid].'">Slet</a></button>  </td></tr>';
			
		}
	
	
	?>
</table>







<br>
</div>
</div>
</div>
</body>
</html>