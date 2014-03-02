 <?php

 $host = "localhost";
 $database = "phonerate";
 $user = "root";
 $pass = "pr4321";

 $maindb = mysql_connect($host, $user, $pass) or die(mysql_error()); 
 mysql_select_db($database, $maindb) or die(mysql_error("Could not connect to main database. Check you settings file.")); 
 ?> 