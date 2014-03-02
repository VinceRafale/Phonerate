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
<title></title>
<link rel="stylesheet" href="css/maincss.css" type="text/css"/>
</head>
<body>
<div id="border">
<div id="indhold">
<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<h1> Velkommen til administrationen </h1>
<br>
<br>
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
<a href="logud.php">Log ud </a>
</div>
</div>
</body>
</html>