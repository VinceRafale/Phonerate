

<html>
<head>
<meta charset="UTF-8">
<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Delius+Swash+Caps' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
      <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
      <link rel="stylesheet" href="css/nivo-slider.css" media="screen" />
      <link href="http://fonts.googleapis.com/css?family=Economica" rel="stylesheet" type="text/css" />
      
<link rel="stylesheet" type="text/css" href="css/css.css">

<title> %%titel%% </title>

</head>


<body>


<div id="container">	
	<!-- Hoved div -->
<div id="hoved">
		
	
		
		<div id="menu">


	

<div id="logobillede">
<a href="/betatest"><img src="images/phoneratelogo.png"/ width="200px" height="50px"> </a>
</div>
	
	
	<ul id=menuul>
	<li class="list_horizontal"><a href="http://phonerate.dk/betatest/?side=1">Forside</a>
	<li class="list_horizontal"><a href="http://phonerate.dk/betatest/?side=2">Om os</a>
	<li class="list_horizontal"><a href="phones.php"> Telefoner</a></li>
	
	</ul>
	<?php
//Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
  echo '<h1>Velkommen til Phonerate</h1>';
//echo 'id : ' . $_SESSION['id'];
echo '<br/>' . $_SESSION['username'];
echo '<br/>Email : ' . $_SESSION['email'];
echo '<br/>Du er logget ind via : ' . $_SESSION['oauth_provider'];
echo '<br/>Log ud: <a href="logout.php?logout">' . $_SESSION['oauth_provider'] . '</a>';

   // Redirection to login page twitter or facebook
 
}
else
{

echo '<div id="facebooklogin">';
echo'<a href="?login&oauth_provider=facebook"><img src="facebook/images/fb_login.png" /img></a>';
echo '</div>';


}

?>


		</div>


	
<!--SØG--->


	
	
	<div id="telefonerwrap">
	<div id="telefonermenu"
	<ul><li>&nbsp; %%menuphones%%</li></ul>
	</div>
	
	</div>
	
	<div id="indhold">
	
	
	
	<div id="telefoninfo">
		<div id="telefonnavn">
		%%titel%% 
		</div>
		<div id="telefonbeskrivelse">
		%%indhold%%
		<br><br>
		</div>
		<br>
		<br>
			<div id="rating">
			<form method="post" action="rate-post.php" name="RatePhoneFormular">
			<br>Titel:<input type="text" name="ratingtitle" maxlength="100" id="ratingtitle">
			
				<br>Telefon ID: %%phoneid%% (OBS:Indtast i n&#230;ste felt):<input type="text" name="sidesortering" maxlength="100" id="sidesortering">
 <br>
				Kommentar(Maks 200 karaktere):<br>




				<textarea rows="10" cols="30" name="ratingcomment"id="ratingcomment"> </textarea>
					<br>
				<input type="radio" name="ratingpoint" value="1">1
				<input type="radio" name="ratingpoint" value="2">2
				
				<input type="radio" name="ratingpoint" value="3">3
				
			<input type="radio" name="ratingpoint" value="4">4
			
				<input type="radio" name="ratingpoint" value="5">5
		<br>
	
		<br>
<input type="submit" value="Rate telefonen">
</form>

				<br>
				<br>
			
			</div>
	<div id="comments">
	<br>
	%%comments%%
	
	</div>
	</div>
		
	</div>
	

	


</div>
</body>




<!-- <a href="/costum"> <img src="pictures/prfinal.png" alt="Det din mening der tæller" height="150" width="700"> </a> -->
		


</html>





