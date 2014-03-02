<?php

//Inkluder connection string



//Indlæse/inkluder funktioner.php filen (AI)



ob_start();

include ("skabelonphones.php");

$skabelon = ob_get_clean();
include ("funktionerphones.php");
include ("inc/connection.php");
echo $skabelon;

?>

