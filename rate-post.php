<?php

include("inc/connection.php");

mysql_select_db("phonerate_dk_db") or die(mysql_error());



//Oprette siden
$HentData = mysql_query("SELECT * FROM rating")
or die(mysql_error());  
$SideData = mysql_fetch_array($HentData);

$sidenavn = addslashes($_POST[facebookname]);
$fbpicture = addslashes($_POST[fbpicture]);
$sidesortering = addslashes($_POST[sidesortering]);

$sideHTML = addslashes($_POST[ratingcommentgeneral]);
$ratingcommentlook = addslashes($_POST[ratingcommentlook]);
$ratingcommentprice = addslashes($_POST[ratingcommentprice]);
$ratingcommenthold = addslashes($_POST[ratingcommenthold]);
$ratingcommentapps = addslashes($_POST[ratingcommentapps]);
$ratingcommentspeed = addslashes($_POST[ratingcommentspeed]);
$ratingcommentcamera = addslashes($_POST[ratingcommentcamera]);
$ratingcommentbatteri = addslashes($_POST[ratingcommentbatteri]);

$ratingpointlook = addslashes($_POST[ratingpointlook]);
$ratingpointprice = addslashes($_POST[ratingpointprice]);
$ratingpointhold = addslashes($_POST[ratingpointhold]);
$ratingpointapps = addslashes($_POST[ratingpointapps]);
$ratingpointspeed = addslashes($_POST[ratingpointspeed]);
$ratingpointcamera = addslashes($_POST[ratingpointcamera]);
$ratingpointbatteri = addslashes($_POST[ratingpointbatteri]);


$phoneid = $_GET[phone];
$facebookid = "https://graph.facebook.com/".$_SESSION['oauth_id']."/picture";



$query = mysql_query("SELECT * FROM rating WHERE sidesortering = '". $phoneid ."' AND fbpicture = '". $facebookid ."'"); 
/*
if (mysql_num_rows($query) == 0) 
{ 
    $backButton = $_SERVER['HTTP_REFERER'];
     echo '
     
     <head>
     <link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
     </head>
     <body>
     <br>
     <form method="get" action='.$backButton.'>
    <button type="submit" class="btn btn-info">Tilbage</button>
</form><br><p> Du har allerede anmeldt denne telefon, du kan rette anmeldesen under Min Side.</p>

</body>

'; 
}

else
{
*/
mysql_query("INSERT INTO rating (facebookname, fbpicture, sidesortering,  ratingcommentgeneral, ratingcommentlook, ratingcommentprice, ratingcommenthold, ratingcommentapps, ratingcommentspeed, ratingcommentcamera, ratingcommentbatteri, ratingpointlook, ratingpointprice, ratingpointhold, ratingpointapps, ratingpointspeed, ratingpointcamera, ratingpointbatteri) VALUES ('".$sidenavn."','".$fbpicture."','".$sidesortering."','".$sideHTML."','".$ratingcommentlook."','".$ratingcommentprice."','".$ratingcommenthold."','".$ratingcommentapps."','".$ratingcommentspeed."','".$ratingcommentcamera."','".$ratingcommentbatteri."','".$ratingpointlook."','".$ratingpointprice."','".$ratingpointhold."','".$ratingpointapps."','".$ratingpointspeed."','".$ratingpointcamera."','".$ratingpointbatteri."')");


header("Location:" . $_SERVER['HTTP_REFERER']);
die();



?>
