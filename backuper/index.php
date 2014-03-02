<?php

//Inkluder connection string
include("inc/connection.php");

//Indlæse min HTML-Skabelon fil
$skabelon = file_get_contents("skabelon.html", true);

//Indlæse/inkluder funktioner.php filen (AI)
include("funktioner.php");


//Outputtet skabelonen
echo $skabelon;
?>