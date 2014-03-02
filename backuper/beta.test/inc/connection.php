<?php

session_start();
$database = "phonerate_dk_db";
$brugernavn = "phonerate_dk";
$password = "pr4321";
$hostname = "mysql22.unoeuro.com";

mysql_connect($hostname,$brugernavn,$password);
mysql_select_db($database);



?>