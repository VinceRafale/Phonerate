<?php


//bner en mysql forbindelse og starter session
include("../inc/connection.php");

//Tjekker om brugeren er logget ind
include("../inc/tjeklogin.php");
$HentRatings = mysql_query("SELECT * FROM rating ORDER BY ratingid ASC");

$HentDataRatings = mysql_query("SELECT * FROM rating WHERE ratingid = '".$_GET[id]."'");
$SideDataRatings = mysql_fetch_array($HentDataRatings);
?>
<html>

<head>
<title></title>
	<meta charset="utf-8">
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
	         
     
     
     
     
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategorier <b class="caret"></b></a>
          <ul class="dropdown-menu">
         <li>hhh</li>
         
         
                   </ul>
     
     
     <!-- <a href="phones.php" >Kategorier </a> -->
             
      </li>

	 	</ul>
</nav>




<table  class="table-bordered" widt="600" border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td><strong>Telefon navn</strong></td>
		<td><strong>Telefon id</strong></td>
		<td><strong>Rating nr(til at identificere)</strong></td>
		<td width="50%"><strong>Bruger der har ratet</strong></td>
		<td><strong>Funktioner</strong></td>
	</tr>
	<?php
	
		while($SideDataRatings = mysql_fetch_array($HentRatings))
		{
			
			
			$phoneid = $SideDataRatings[sidesortering];
			$phonename = mysql_query("SELECT * FROM phones WHERE phoneid = ".$phoneid."");
			$phonenamefetch = mysql_fetch_array($phonename);
			
			
			
			echo '<tr><td>'.$phonenamefetch[phonename].'</td><td>'.$SideDataRatings[sidesortering].'</td><td>'.$SideDataRatings[ratingid].'</td><td>'.$SideDataRatings[facebookname].'</td><td><button type="button" class="btn btn-warning"><a style="color: white;" href="retrating.php?id='.$SideDataRatings[ratingid].'">Ret</a></button></td><td> <button type="button" class="btn btn-danger"> <a style="color: white;" href="sletrating.php?id='.$SideDataRatings[ratingid].'">Slet</a></button>  </td></tr>';
			
		}
	
	
	?>
</table>







<br>

</div>
</div>
</body>
</html>