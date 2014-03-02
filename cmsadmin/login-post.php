<?php

include("../inc/connection.php");

 

$brugernavn = addslashes( $_POST[brugernavn]);
$password = addslashes($_POST[password]);

if($brugernavn != "" && $password != "")

{
	//1. tjek om det er korrekt med vores database
		$tjekUserQuery = mysql_query("SELECT * FROM brugere WHERE brugernavn = '".$brugernavn."' AND password = '".$password."'");
		if(mysql_num_rows($tjekUserQuery) != 1)
		{
		
		
			header("Location: login.php");
			
			die();
		}
	//2. lave en session
	$_SESSION[brugernavn] = $brugernavn;
	$_SESSION[password] = $password;
	//3. viderestille til main.php
	header("Location: main.php");

} else {
	
	
	
	//header("Location: login.php");
	echo "Dine oplysninger passede ikke";
	die();
}

?>