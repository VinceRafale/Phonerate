<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("inc/connection.php");
$HentData = mysql_query("SELECT * FROM phones WHERE phoneid = '"1"'");
$PhoneData = mysql_fetch_array($HentData);


?>

<!DOCTYPE html>
<html>

<head>
</head>

<body> 

<?php

 
echo $PhoneData ['phonename'];
?>


</body>



</html>
