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
	<head profile="http://www.w3.org/2005/10/profile">
	
	
<script>
$(document).ready(function() {
$('input.country').typeahead({
name: 'country',
remote : 'getautocomplete.php'
});;
})


</script>

	
	
	
	
<link rel="icon" 
      type="image/png" 
      href="img/phoneratelogo.png">
	
	<link href='http://fonts.googleapis.com/css?family=Nixie+One|Oleo+Script|Josefin+Slab|Text+Me+One|Montserrat+Subrayada' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>Phonerate</title>
		<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
		
		<link rel="stylesheet" href="css/footer.css" type="text/css"/>
		<!-- DC Social Icons CSS -->


<script type='text/javascript'>
if (screen.width <= 699) {
document.location = 'http://phonerate.dk/mobile';
}
</script>


 <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
         <script type="text/javascript"
        src="js/pinned.Jquery.js"></script>

        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
 
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>
<script type="text/javascript">
$('#nav').affix({
});</script>


	</head>
	<body>
	<style>
	


	</style>
	
	<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
	
	

    <style type="text/css">
   #footer
{
background-color: #575757;

}

    
    
html,body
{
height:100%;
}


#wrap
{
min-height: 100%;
background-color: #3E78CC;
border-radius: 5px;

}

#main
{

padding-bottom:-20px;
}
   
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
    </style>
<br><br>
	<div class="navbar" >
        <div class="navbar-inner" >
            <div class="container" >
            	<div class="row">
            	
            	

            	
              		<div class="col-xs-6">
               			<a href="index.php"><img height="100" width="389"  src="img/phoneratelogo.png"/></a> 
							<br>&nbsp;  <b>BETA</b><br><br>
            		</div>
            		
            		
            		            	<div class="col-md-6">
            	<!-- Facebook top -->
            	
            	<p class="navbar-text navbar-right" >     <br>    <?php 
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


<a class="btn btn-primary "  data-loading-text="Logger ind..." role="button" href="?login&oauth_provider=facebook"  onclick="$(this).button(\'loading\')"><img src="img/social/facebook-social.png"  /> Log ind med facebook </a> 
<br><a data-toggle="modal" data-target="#Modalfacesafe" href="#">Usikker på at logge ind med din facebook?</a>


</p</>';



}
     ?>
    </p>

            	
            	
            	</div>
            	
            		
             		<div class="row">
             		               	
            </div>
      
 <div class="navbar navbar-default" data-spy="affix" data-offset-top="207" id="nav">
	<div class = "container">
	<div class="row">
	
	
	
	       <div class="col-md-6"> 
              
<!-- Button trigger modal -->
  <form method="post" action="search.php" name="RatePhoneFormular">
    <div style="margin-top: 8px;" class="input-group">
      
      
      <input name="find" id="focusedInput"  type="text" class="form-control country" placeholder="Her kan du søge hurtigt efter en telefon "/>
    
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
  <div id="bs-example-navbar-collapse-1  ">
    <ul class="nav navbar-nav ">
    
     <li >
     
     
     
     
     
     <li class="dropdown ">
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
<li><a   href="mysite.php">
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
	</div>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="jumbotron" style="">
			<center>	<h1 >Rate din telefon her på Phonerate </h1></center>
			
		
			
			
			
			
			
				<center><p>
				
					<?php
			$Alleratings = mysql_query("SELECT COUNT(ratingid) as value_columns FROM rating");		
		
		$Alleratingsfetch = mysql_fetch_array($Alleratings);
		
		$Samletratings = $Alleratingsfetch['value_columns'];
echo $Samletratings;
			?>
				
				
				
				
				Har allerede ratet deres telefon, søg her for at læse deres ratings, eller rate din egen telefon </p></center>
				<center>
					<form method="post" action="search.php" name="RatePhoneFormular">
				    <div class="input-group navbar-form">

				    	<input name="find"  id="focusedInput" type="text" class="form-control" placeholder="Her kan du søge efter den telefon du vil anmelde, eller se andres meninger">
					    <span class="input-group-btn">
					    	<button class="btn btn-primary" type="submit">Søg efter telefon</button>
					    </span>

				    </div>
			      </form>

				</center>
				<!-- Nyeste ratings-->
				<div class="row">
					<div  class"col-md-4" >


						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="top-spacing">
				<div class="col-sm-4">
					<div style="" class="well col-sm-10"  id="top-container">

					</div>
				
				</div>
			</div>
			<div class="col-sm-4 "> 
				<div class="well col-sm-10 " id="bottom-container">

				</div>
			
			</div>
			<div class="col-sm-4"  >
		
<div id="feed-container" class="well" ">

		</div>
	</div>

		</div>
		
	<br><br><br><br>
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
	<iframe id="facebooklike" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fphonerate&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=1374799492774805" scrolling="no" frameborder="0" style="border:none; overflow; height:45px;" allowTransparency="true"></iframe>
	
	
	
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
  

	
	         
 <!-- Modal for facebooksikkerhed ->
 <!-- Modal -->
<div class="modal fade" id="Modalfacesafe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Facebook sikkerhed</h4>
      </div>
      <div class="modal-body">
       
            <?php
   $homepage = file_get_contents('modals/facebooksec.html');
echo $homepage;
       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Luk igen</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->           
  

	
	
	
	
	
	
	
	
	
	
	
	
	
	<script src="http://phonerate.dk/js/rating.js"></script>
	
	
	
	
	<!-- Preloader -->
<script type="text/javascript"">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
	
	</body>




</html>