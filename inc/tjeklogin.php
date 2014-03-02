<?php

//1. tjek om man har et gyldigt login
$tjekUserQuery = mysql_query("SELECT * FROM brugere WHERE brugernavn = '".$_SESSION[brugernavn]."' AND password = '".$_SESSION[password]."'");
		if(mysql_num_rows($tjekUserQuery) != 1)
		{
		
		
			header("Location: login.php");
			
			die();
		}



?>