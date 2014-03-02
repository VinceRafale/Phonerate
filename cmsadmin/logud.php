<?php
include("../inc/connection.php");


$_SESSION[brugernavn] = "";
$_SESSION[password] = "";

header("Location: index.php");

die();
?>