<?php

//Always place this code at the top of the Page
session_start();

if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}


?>

<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
</head>

<body>

	<div class="alert alert-success"><h3>Du har nu tilladt at vi bruger dit profil billede og brugernavn fra facebook til at identificere dig 			når du laver en anmeldelse</h3>
	
		Du vil om få sekunder blive sendt tilbage til forsiden
		
	</div>
		<center>
	<a href="/index.php">Du kan også trykke her for at vende tilbage til forsiden for at rate</a>
	<br>
<br><br>
	<b>Du er logget ind som</b> <br>
	
	<?php
if (isset($_SESSION['id'])) {
 // echo ' <span class="glyphicon glyphicon-user"></span>   ';
  //echo 'id : ' . $_SESSION['id'];

  echo '<img class="img-circle" src="https://graph.facebook.com/'.$_SESSION['oauth_id'].'/picture" />';
 
  
echo ' ' . $_SESSION['username'];

//echo '<br/>Email : ' . $_SESSION['email'];
//echo '<br/>Du er logget ind via : ' . $_SESSION['oauth_provider'];
echo ' <a class="btn btn-primary" role="button" href="logout.php?logout" data-loading-text="Logger ud..." onclick="$(this).button(\'loading\')">Log ud</a>';

   // Redirection to login page twitter or facebook
 
}
else
{


echo'
Der må være sket en fejl, tryk her for at logget ind igen
<p style="text-align: right;" class="navbar-text navbar-right"><br> 

<a class="btn btn-primary "  data-loading-text="Logger ind..." role="button" href="?login&oauth_provider=facebook"  onclick="$(this).button(\'loading\')">Log ind med facebook </a> 


</p</>';



}
     ?>
	</center>
	
	
	<form name="redirect">
<center>
<font face="Arial"><b>Du vil blive ført til forsiden om<br><br>
<form>
<input type="text" size="3" name="redirect2">
</form>
sekunder</b></font>
</center>

<script>
<!--

/*
Count down then redirect script
By JavaScript Kit (http://javascriptkit.com)
Over 400+ free scripts here!
*/

//change below target URL to your own
var targetURL="http://phonerate.dk"
//change the second to start counting down from
var countdownfrom=6


var currentsecond=document.redirect.redirect2.value=countdownfrom+1
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.redirect.redirect2.value=currentsecond
}
else{
window.location=targetURL
return
}
setTimeout("countredirect()",1000)
}

countredirect()
//-->
</script>
	
	
	
</body>

</html>