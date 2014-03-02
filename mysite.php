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
		<meta charset="utf-8">
		<title>Phonerate</title>
		<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
		<link rel="stylesheet" href="css/footer.css" type="text/css"/>
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
			color: rgba(252,252,252,1);
			border-radius: 27px
		}
		
    </style>

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
<li><a  href="mysite.php">
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
		
		
		<?php
if (isset($_SESSION['id'])) {
echo"


";
}
else{

echo "
<div class='alert alert-warning alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <strong>Vigtigt!</strong> Hov! du har glemt at logge ind, Derfor ser du ingen telefoner nedenfor, du logger ind oppe i højre hjørne
</div>
           </div>
   </div>
   ";
}




 ?>

		
		
		
			<h3>Velkommen til din side <?php echo $_SESSION['username'];?> </h3>
<br>
<p>Her kan du rette dine nuværende anmeldelser. </p>
<!-- Loader alle ratings -->

	<?php


//Åbner en mysql forbindelse og starter session
include("inc/connection.php");

//Tjekker om brugeren er logget ind

$HentRatings = mysql_query("SELECT * FROM rating ORDER BY ratingid ASC");
$oauth_id = $_SESSION['oauth_id'];
$HentDataRatings = mysql_query("SELECT * FROM rating WHERE fbpicture = 'https://graph.facebook.com/".$oauth_id."/picture' ORDER BY ratingid ASC");
$SideDataRatings = mysql_fetch_array($HentDataRatings);
?>


<table  class="table-bordered" widt="600" border="0" cellspacing="0" cellpadding="5">

	<tr>
		<td><strong>Telefon navn</strong></td>
		
		<td><strong>Dit rating nr(Bruges til support)</strong></td>
		<td width="50%"><strong>Din samlede score</strong></td>
		<td><strong>Funktioner</strong></td>
	</tr>
	<?php
	
		while($SideDataRatings = mysql_fetch_array($HentDataRatings))
		{
			$phoneid = $SideDataRatings[sidesortering];
			$phonename = mysql_query("SELECT * FROM phones WHERE phoneid = ".$phoneid."");
			$phonenamefetch = mysql_fetch_array($phonename);
			
			
		
$ratingpointlook1 = $SideDataRatings[ratingpointlook];
	$ratingpointprice1 = $SideDataRatings[ratingpointprice];
	$ratingpointhold1 = $SideDataRatings[ratingpointhold];
	$ratingpointapps1 = $SideDataRatings[ratingpointapps];	
	$ratingpointspeed1 = $SideDataRatings[ratingpointspeed];
	$ratingpointcamera1 = $SideDataRatings[ratingpointcamera];
	$ratingpointbatteri1 = $SideDataRatings[ratingpointbatteri];
			
			$samletscoreudregn = ($ratingpointlook1 + $ratingpointprice1 + $ratingpointapps1 + $ratingpointhold1 + $ratingpointspeed1 + $ratingpointcamera1 + $ratingpointbatteri1) / 7;
			
			$samletscore = substr($samletscoreudregn, 0, 1);
			
			
			echo '<tr><td>'.$phonenamefetch[phonename].'</td><td>'.$SideDataRatings[ratingid].'</td><td>'.$samletscore.'</td><td><button type="button" class="btn btn-warning"><a style="color: white;" href="retmysite.php?id='.$SideDataRatings[ratingid].'"><span class="glyphicon glyphicon-pencil"></span></a></button></td><td> <button type="button" class="btn btn-danger"> <a style="color: white;" href="sletmysite.php?id='.$SideDataRatings[ratingid].'"><span class="glyphicon glyphicon-trash"></span></a></button>  </td></tr>';
			
		}
	
	
	?>
</table>




	


		<div class="col-md-6">
	
	
	
	
	
	
		</div>





	


<br><br><br><br><br><br>
	<div id="wrap" >

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
	
<?php/*
require("inc/connection.php");

	
		$CommentDataQuery = mysql_query("SELECT * FROM rating WHERE sidesortering='$id' ORDER BY ratingid ASC");
		
		
	

		
		
		while($CommentData = mysql_fetch_array($CommentDataQuery))
		{
	
		
		/*	$OverRatingQuery1 = mysql_query ("SELECT * FROM (SELECT * FROM rating WHERE sidesortering=".$id." AND rating) test1");		
		
		$OverRatingData1 = mysql_fetch_array($OverRatingQuery1);
		
		$ratingpointlook1 = $OverRatingData1['ratingpointlook'];
	
$overallpointratingsub = substr($overallpointrating, 0, 1);
		
	
		"<tr>
    <td class='field-label col-md-2 active'>
           <img src=".$CommentData['fbpicture']." class='img-thumbnail' > <br>   ". $CommentData[facebookname] . "
      <br><br> 
     Rating nr: ". $CommentData[ratingid] ."
      <
    <label>Samlet: ".$overallpointratingsub." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   </td></tr>";
		
		}
		
		echo $comments;
*/?>
	
	
	
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