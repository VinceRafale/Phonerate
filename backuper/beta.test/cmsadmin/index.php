<?php
include("../inc/connection.php");

//Hvis logget p�, send til main.php

if($_SESSION[brugernavn] != "" && $_SESSION[password] != "")
{
header("location: main.php");
die();

}
//Hvis ikke logget p�, send til login.php
else
{
header("Location: login.php");
die();
}


?>