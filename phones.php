<?php

//Inkluder connection string

//Indlæse/inkluder funktioner.php filen (AI)



ob_start();

include ("indexphones.php");

$skabelon = ob_get_clean();
include ("funktionerphones.php");
include ("inc/connection.php");
echo $skabelon;
?>

<style>.navbar-default
{
background-color: #2A5B7C;

}
.btn-primary{
	
	background-color: #2A5B7C;
	
}</style>	

