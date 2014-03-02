<?php

//Inkluder connection string

//Indlæse/inkluder funktioner.php filen (AI)



ob_start();

include ("indexspeed.php");

$skabelon = ob_get_clean();
include ("speedfunktioner.php");
include ("inc/connection.php");
echo $skabelon;

?>

