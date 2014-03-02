<?php
session_start();
		//FACEBOOK LOGIN

if (array_key_exists("login", $_GET)) 
{
$oauth_provider = $_GET['oauth_provider'];
if ($oauth_provider == 'twitter')
{
header("Location: login-twitter.php");
}
else if ($oauth_provider == 'facebook')
 {
header("Location: facebook/login-facebook.php");
}
}


?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="css/footer.css" type="text/css"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	
	<script language="JavaScript" type="text/javascript">
<!--
function checkform ( form )
{

  // ** START **
  if (form.ratingcommentapps.value == "") {
    alert( "Du har glemt at udfylde en kommentar til apps" );
    form.ratingcommentapps.focus();
    return false ;
  }
  
if (form.ratingcommentlook.value == "") {
    alert( "Du har glemt at udfylde en kommentar til udseende" );
    form.ratingcommentlook.focus();
    return false ;
  }
if (form.ratingcommenthold.value == "") {
    alert( "Du har glemt at udfylde en kommentar til holdbarhed" );
    form.ratingcommenthold.focus();
    return false ;
  }
if (form.ratingcommentspeed.value == "") {
    alert( "Du har glemt at udfylde en kommentar til hastighed" );
    form.ratingcommentspeed.focus();
    return false ;
  }
if (form.ratingcommentprice.value == "") {
    alert( "Du har glemt at udfylde en kommentar til pris" );
    form.ratingcommentprice.focus();
    return false ;
  }
if (form.ratingcommentcamera.value == "") {
    alert( "Du har glemt at udfylde en kommentar til kamera" );
    form.ratingcommentcamera.focus();
    return false ;
  }
if (form.ratingcommentgeneral.value == "") {
    alert( "Du har glemt at udfylde en kommentar til generelle fejl" );
    form.ratingcommentgeneral.focus();
    return false ;
  }
if (form.ratingcommentbatteri.value == "") {
    alert( "Du har glemt at udfylde en kommentar til batteri" );
    form.ratingcommentbatteri.focus();
    return false ;
  }
  
  // ** END **
  return true ;
}




//-->
</script>
	
	
		<meta charset="utf-8">
		<title>Phonerate</title>
		<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
	</head>
	<body>

    <style type="text/css">
   
    	body {
    		padding-top: 25px;
    	}
    	[data-href] {
    		cursor: pointer;
    	}
    	.rating-row {
    		margin-bottom: 8px;
    	}
		.rating {
		  unicode-bidi: bidi-override;
		  direction: rtl;
		  text-align: left;
		}
		.rating > span {
		  display: inline-block;
		  position: relative;
		  width: 1.1em;
		}
		.rating > span.checked:before {
			content: "\2605";
			position:absolute;
		}
    	
.star-rating {
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  width: 250px;
  height: 50px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
ul.form {
	list-style: none;
	padding: 0;
}

.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 20%;
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  width: 20%;
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}	</style>

	<div class="navbar">
        <div class="navbar-inner">
            <div class="container">
            	<div class="row">
            	
            	

            	
              		<div class="col-xs-6">
               			<a href="index.php"><img height="100" width="389"  src="img/phoneratelogo.png"/></a> 
							<br>&nbsp;  <b>BETA</b><br><br>
            		</div>
            		
            		
            		            	<div class="col-md-6">
            	<!-- Facebook top -->
            	
            	<p class="navbar-text navbar-right">     <br>    <?php 
     //Always place this code at the top of the Page


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


echo'<p style="text-align: right;" class="navbar-text navbar-right"><br> 

<a class="btn btn-primary "  data-loading-text="Logger ind..." role="button" href="?login&oauth_provider=facebook"  onclick="$(this).button(\'loading\')">Log ind med facebook </a> 


</p</>';



}
     ?>
    </p>

            	
            	
            	</div>
            	
            		
             		<div class="row">
             		               	
            </div>
      
 <div class="navbar navbar-default ">
	<div class ="container"
	<div class="row">
	
	
	
	       <div class="col-md-6"> 
              
<!-- Button trigger modal -->
  <form method="post" action="search.php" name="RatePhoneFormular">
    <div style="margin-top: 8px;" class="input-group">
      
      
      <input name="find"  id="focusedInput" type="text" class="form-control" placeholder="Her kan du søge hurtigt efter en telefon ">
    
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Søg efter telefon</button>
      </span>
      
    </div><!-- /input-group -->  
    
      
      
      </form>
 
	</div>
	
	<div class="col-md-6 ">
	<!-- <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fphonerate&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=1374799492774805" scrolling="no" frameborder="0" style="border:none; overflow; height:35px;" allowTransparency="true"></iframe>-->
	
	
   
	  <!-- Brand and toggle get grouped for better mobile display -->
  

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav ">
    
     <li >
     
     
     
     
     
     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategorier <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <?php
          require("inc/connection.php");
          //Categori menu
          $CatDataQuery = mysql_query("SELECT catid, catname FROM categories ORDER BY catid ASC");


		
		while($CatData = mysql_fetch_array($CatDataQuery))
		{
		$catmenu .="<li><a href=\"phones.php?cat=".$CatData[catid]."\">".$CatData[catname]."</a></li>";
		
		};
          
          
          echo $catmenu;
          
          
          
          ?>
          
                     </ul>
        </li>
     
     
     <!-- <a href="phones.php" >Kategorier </a> -->
             
      </li>

<li><a data-toggle="modal" data-target="#myModal" href="#">
  Kontakt
</a>
</li>

      <li><a data-toggle="modal" data-target="#myModal2" href="#">Erhverv</a></li>
         
         <li><a data-toggle="modal" data-target="#myModalguide" href="#">
 Phoneguide
</a>
</li>
<li><a  href="/mysite.php">
  Min side <span class="glyphicon glyphicon-user"></span>
</a>
</li>
  
         </ul>
              
   
         
         
         

      
      
             <ul class=" navbar-nav navbar-right">
             </ul>
  
  </div>

         </div>
         
  
         
         
         
         </div>   
         
	
	
	
		</div>
	</div>




	<div class="row">


		<div class="col-md-12">

			<h3> Min side - Ret anmeldelse</h3>
<br>

<p> </p>
<!-- Loader alle ratings -->

	<?php


//Åbner en mysql forbindelse og starter session
include("inc/connection.php");

//Tjekker om brugeren er logget ind

$HentData = mysql_query("SELECT * FROM rating WHERE ratingid = '".$_GET[id]."'");
$SideData = mysql_fetch_array($HentData);
?>


<div id=border>
<div id=indhold>
<form method="get" action="mysite.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>

<form method="post" action="retmysite-post.php" name="OpretSideFormular">
<br>

	<div class="input-group">
		<div class="input-group input-group-lg">
				
				</div>
<br> <br>
Ret kommentar til Udseende:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentlook]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointlook" value="1"><i></i>
 
				<input type="radio" name="ratingpointlook" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointlook" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointlook" value="4"><i></i>

			
				<input type="radio" name="ratingpointlook" value="5"><i></i>
</span>

				
				</li>
			
				</ul><br>
<br> <br>
Ret kommentar til Pris:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentprice]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointprice" value="1"><i></i>
 
				<input type="radio" name="ratingpointprice" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointprice" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointprice" value="4"><i></i>

			
				<input type="radio" name="ratingpointprice" value="5"><i></i>
</span>

				
				</li>
			
				</ul>
<br>

<br> <br>
Ret kommentar til Holdbarhed:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommenthold]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointhold" value="1"><i></i>
 
				<input type="radio" name="ratingpointhold" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointhold" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointhold" value="4"><i></i>

			
				<input type="radio" name="ratingpointhold" value="5"><i></i>
</span>

				
				</li>
			
				</ul>
<br>

<br> <br>
Ret kommentar til Apps:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentapps]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointapps" value="1"><i></i>
 
				<input type="radio" name="ratingpointapps" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointapps" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointapps" value="4"><i></i>

			
				<input type="radio" name="ratingpointapps" value="5"><i></i>
</span>

				
				</li>
			
				</ul><br>

<br> <br>
Ret kommentar til Hastighed:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentspeed]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointspeed" value="1"><i></i>
 
				<input type="radio" name="ratingpointspeed" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointspeed" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointspeed" value="4"><i></i>

			
				<input type="radio" name="ratingpointspeed" value="5"><i></i>
</span>

				
				</li>
			
				</ul><br>

<br> <br>
Ret kommentar til Kamera:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentcamera]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointcamera" value="1"><i></i>
 
				<input type="radio" name="ratingpointcamera" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointcamera" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointcamera" value="4"><i></i>

			
				<input type="radio" name="ratingpointcamera" value="5"><i></i>
</span>

				
				</li>
			
				</ul>
<br>

<br> <br>
Ret kommentar til Batteri:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentbatteri]?> </textarea>
<br>
<br>
 <ul class="form">
   
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointbatteri" value="1"><i></i>
 
				<input type="radio" name="ratingpointbatteri" value="2"><i></i>
 
				
				<input type="radio" name="ratingpointbatteri" value="3"><i></i>
 
				
				<input type="radio" name="ratingpointbatteri" value="4"><i></i>

			
				<input type="radio" name="ratingpointbatteri" value="5"><i></i>
</span>

				
				</li>
			
				</ul>
	</div><br>
<br> <br>
Ret kommentar til Generelle fejl:<br>
<textarea class="form-control" rows="10" cols="30" name="ratingcomment"> <?=$SideData[ratingcommentgeneral]?> </textarea>
<br>





<!--Sortering/ID:<br>
<input type="text" name="phoneid" maxlength="4" style="width:35px" value="<?=$SideData[phoneid]?>">
-->

 

<input class="form-control" type="hidden" name="ratingid" value="<?=$_GET[id]?>">
<input class="btn btn-success" type="submit" value="Ret anmeldelse">
<br>
<br>
<br><br>
</form>
</div>





		</div>


		<div class="col-md-6">
	
	
	
	
	
	
		</div>





	</div>

<br><br><br>

</div>
	<div id="wrap">

	<div class="footerclasse">

	<div class ="container" >
	<div class="row" >
	<div class="col-md-4" >
	
	<h3 style="color: white;">Find os på! </3> <a href="https://www.facebook.com/phonerate" title="Facebook" alt="Facebook"><img src="img/social/facebook-social.png"  /></a>
<a href="https://twitter.com/Phonerate" title="Følg os på twitter" alt="Twitter"><img src="img/social/twitter-social.png"  /></a>

<a href="https://plus.google.com/103053646458610513147/about" title="Google Plus" alt="Google Plus"><img src="img/social/googleplus-social.png" /></a>
<a href="http://www.youtube.com/channel/UC_8RRLtWrTapLEV0mX0E6bg" title="Youtube" alt="Youtube"><img width="32px" height="32px" src="img/social/youtube-social.png"  /></a>

	
		</div>
	<div class="col-md-2 col-md-offset-4">
	<br>
	<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fphonerate&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=1374799492774805" scrolling="no" frameborder="0" style="border:none; overflow; height:35px;" allowTransparency="true"></iframe>
	
	
	
		</div>
	


		</div>
		</div>
		</div>
		</div>



		<!-- Slut på footer -->	
	
	 <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	 <script src="js/bootstrap.js"></script>
	
	
	
	
	
	
	
		
	
	
	
	 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="z-index:100000;" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Her er lidt om os og hvordan du kan kontakte os</h4>
      </div>
      <div class="modal-body">
       
       Hos Phonerate.dk handler det ikke om os eller firmaerne! Det handler nemlig om dig og tusinder af andre i samme situation.<br>
<h4>Mission</h4>
Bedre handels oplevelser til folket!
<h4>Beskrivelse</h4>
Phonerate.dk er designet til at give dig den bedste oplevelse med telefoner, vores mission er at gøre det let for forbrugerne at få mest muligt for deres penge.
<br>
<br>
<h4>Email og adresse</h4>
<br>
<b>Email:</b> support@phonerate.dk <br>
<b>Adresse:</b> Neergårdsparken 8 1.tv 4000 Roskilde
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->        
         
         
 <!-- Modal for erhverv ->
 <!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Denne side er underopbygning</h4>
      </div>
      <div class="modal-body">
       
      UNDER OPBYGNING

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
	
	
 <!-- Modal for guide ->
 <!-- Modal -->
<div class="modal fade" id="myModalguide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Phoneguide</h4>
      </div>
      <div class="modal-body">
       
      Vi arbejder på en smart feature der gør at du kan vælge dine kriterier når du skal vælge ny telefon, og så finde vi ud af hvilken telefon der passer til dig.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
	
<!-- Modal for guide ->
 <!-- Modal -->
<div class="modal fade" id="myModalminside" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Min side</h4>
      </div>
      <div class="modal-body">
       
      Vi arbejder på en smart feature der gør at du kan redigere dine tidligere anmeldelser.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	

	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Her er lidt om os og hvordan du kan kontakte os</h4>
      </div>
      <div class="modal-body">
       
       Hos Phonerate.dk handler det ikke om os eller firmaerne! Det handler nemlig om dig og tusinder af andre i samme situation.<br>
<h4>Mission</h4>
Bedre handels oplevelser til folket!
<h4>Beskrivelse</h4>
Phonerate.dk er designet til at give dig den bedste oplevelse med telefoner, vores mission er at gøre det let for forbrugerne at få mest muligt for deres penge.
<br>
<br>
<h4>Email og adresse</h4>
<br>
<b>Email:</b> service@phonerate.dk <br>
<b>Adresse:</b> Neergårdsparken 8 1.tv 4000 Roskilde
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->        
         
 <!-- Modal for erhverv ->
 <!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Her er lidt om os og hvordan du kan kontakte os</h4>
      </div>
      <div class="modal-body">
       
      UNDER OPBYGNING

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->           
  

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<script src="http://phonerate.dk/development/js/rating.js"></script>
	</body>




</html>