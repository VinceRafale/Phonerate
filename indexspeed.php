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
	
	
	
	
	

	
	
	
	
	
	<script> $(':radio').change(
  function(){
    $('.choice').text( this.value + ' stars' );
  } 
)
</script>

 	<meta charset="utf-8">
	<title>Phonerate</title>
	<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
	<style type="text/css">
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
	
		
	
	
	
	
	
	
	</head>
	
	<body>
	
	<div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                <br><br>
<div >
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
  <br>
                <a href="index.php"><img height="100" width="389"  src="img/phoneratelogo.png"/></a> 
<br><br>
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse "  id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav ">
    
     <li >
        <a href="phones.php" >Telefoner </a>
             
      </li>

<!-- Button trigger modal -->


<li><a data-toggle="modal" data-target="#myModal" href="#">
  Kontakt
</a>
</li>

      <li><a data-toggle="modal" data-target="#myModal2" href="#">Erhverv</a></li>
         
         <li><a data-toggle="modal" data-target="#myModalguide" href="#">
 Phoneguide
</a>
</li>
<li><a data-toggle="modal" data-target="#myModalminside" href="#">
  Min side
</a>
</li>
         
         </ul>
              
         
         
         
         
  <form method="post" action="search.php" name="RatePhoneFormular">
    <div class="input-group navbar-form">
      
      
      <input name="find"  id="focusedInput" type="text" class="form-control" placeholder="Her kan du søge efter den telefon du vil rate">
    
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Søg efter telefon</button>
      </span>
      
    </div><!-- /input-group -->  
    
      
      
      </form>
      
      
             <ul class=" navbar-nav navbar-right">
             </ul>
  
  </div>

         
         
         
         
         
         </nav>
     <ul class="nav nav-tabs nav-justified ">
             %%menucat%%
             </ul>
<div class="row">
         <div class="col-md-2">
             <ul class="nav nav-list nav-stacked">
             %%menuphones%%
             </ul>
         </div>
         <div class="col-md-10">
           <!-- /.navbar-collapse -->
         
         <!-- Hvis telefoner ellers velkommen-->
       <?php 
       $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        
        if (false !== strpos($url,'?phone=')) {   
        
    ?>    
         <div class="col-md-5">    
   
    <h3>%%titel%%</h3>


<p>%%indhold%%</p>
<br /> 

<br /><br /><br />
         </div>
<div class="col-md-5 col-md-offset-2">         
 <?php
    require("inc/connection.php");
include("facebook/fbacces.php");
    //Overall rating

	$id = addslashes($_GET[phone]);

// Pris bliver renget i alt
$OverRatingQueryPrice = mysql_query("SELECT SUM(ratingpointprice) as value_sumprice FROM (SELECT ratingpointprice FROM rating WHERE sidesortering=".$id.") test11");		
		
		$OverRatingDataPrice = mysql_fetch_array($OverRatingQueryPrice);
		
		$OverAllPrice = $OverRatingDataPrice['value_sumprice'];
		
		$OverRatingColumnQueryPrice = mysql_query("SELECT COUNT(ratingpointprice) as value_columnprice FROM (SELECT ratingpointprice FROM rating WHERE sidesortering=".$id.") test1");		
		
		$OverRatingColumnPrice = mysql_fetch_array($OverRatingColumnQueryPrice);
		
		$OverAllColumnPrice = $OverRatingColumnPrice['value_columnprice'];
	
	
// Udseende bliver regnet i alt	
	
	$OverRatingQueryLook = mysql_query("SELECT SUM(ratingpointlook) as value_sumlook FROM (SELECT ratingpointlook FROM rating WHERE sidesortering=".$id.") test2");		
		
		$OverRatingDataLook = mysql_fetch_array($OverRatingQueryLook);
		
		$OverAllLook = $OverRatingDataLook['value_sumlook'];
		
		
		$OverRatingColumnQueryLook = mysql_query("SELECT COUNT(ratingpointlook) as value_columnlook FROM (SELECT ratingpointlook FROM rating WHERE sidesortering=".$id.") test3");		
		
		$OverRatingColumnLook = mysql_fetch_array($OverRatingColumnQueryLook);
		
		$OverAllColumnLook = $OverRatingColumnLook['value_columnlook'];
		

// Apps bliver regnet i alt	
		

	$OverRatingQueryApps = mysql_query("SELECT SUM(ratingpointapps) as value_sumapps FROM (SELECT ratingpointapps FROM rating WHERE sidesortering=".$id.") test3");		
		
		$OverRatingDataApps = mysql_fetch_array($OverRatingQueryApps);
		
		$OverAllApps = $OverRatingDataApps['value_sumapps'];
		
	
		
		$OverRatingColumnQueryApps = mysql_query("SELECT COUNT(ratingpointapps) as value_columnapps FROM (SELECT ratingpointapps FROM rating WHERE sidesortering=".$id.") test4");		
		
		$OverRatingColumnApps = mysql_fetch_array($OverRatingColumnQueryApps);
		
		$OverAllColumnApps = $OverRatingColumnApps['value_columnapps'];
		

// Hurtighed bliver regnet i alt	


$OverRatingQuerySpeed = mysql_query("SELECT SUM(ratingpointspeed) as value_sumspeed FROM (SELECT ratingpointspeed FROM rating WHERE sidesortering=".$id.") test6");		
		
		$OverRatingDataSpeed = mysql_fetch_array($OverRatingQuerySpeed);
		
		$OverAllSpeed = $OverRatingDataSpeed['value_sumspeed'];
		
		
		$OverRatingColumnQuerySpeed = mysql_query("SELECT COUNT(ratingpointspeed) as value_columnspeed FROM (SELECT ratingpointspeed FROM rating WHERE sidesortering=".$id.") test7");		
		
		$OverRatingColumnSpeed = mysql_fetch_array($OverRatingColumnQuerySpeed);
		
		$OverAllColumnSpeed = $OverRatingColumnSpeed['value_columnspeed'];
		
		
// Kamera bliver regnet i alt			
		
$OverRatingQueryCamera = mysql_query("SELECT SUM(ratingpointcamera) as value_sumcamera FROM (SELECT ratingpointcamera FROM rating WHERE sidesortering=".$id.") test8");		
		
		$OverRatingDataCamera = mysql_fetch_array($OverRatingQueryCamera);
		
		$OverAllCamera = $OverRatingDataCamera['value_sumcamera'];
		
		$OverRatingColumnQueryCamera = mysql_query("SELECT COUNT(ratingpointcamera) as value_columncamera FROM (SELECT ratingpointcamera FROM rating WHERE sidesortering=".$id.") test9");		
		
		$OverRatingColumnCamera = mysql_fetch_array($OverRatingColumnQueryCamera);
		
		$OverAllColumnCamera = $OverRatingColumnCamera['value_columncamera'];
		
		
		
// Kamera bliver regnet i alt			
		
$OverRatingQueryHold = mysql_query("SELECT SUM(ratingpointhold) as value_sumhold FROM (SELECT ratingpointhold FROM rating WHERE sidesortering=".$id.") test8");		
		
		$OverRatingDataHold = mysql_fetch_array($OverRatingQueryHold);
		
		$OverAllHold = $OverRatingDataHold['value_sumhold'];
		
		$OverRatingColumnQueryHold = mysql_query("SELECT COUNT(ratingpointhold) as value_columnhold FROM (SELECT ratingpointhold FROM rating WHERE sidesortering=".$id.") test9");		
		
		$OverRatingColumnHold = mysql_fetch_array($OverRatingColumnQueryHold);
		
		$OverAllColumnHold = $OverRatingColumnHold['value_columnhold'];		
		

// Tjekke om der er en værdi og så send til brugeren
    
     
     
     
  			
		

     
     
     
   $OverAll = ($OverAllColumnPrice + $OverAllColumnHold + $OverAllColumnLook + $OverAllColumnApps + $OverAllColumnSpeed + $OverAllColumnCamera);
    
      
 if ( empty($OverAll) || $OverAll === true ){
	     
	   
	echo "<h3> Ingen overall rating da der ingen anmeldelser er på telefonen </h3>";
	    
	 
      } 
      else {
   
       
       //Sende til brugeren
	    $OverAllCALPrice = ($OverAllPrice/$OverAllColumnPrice);
	     $OverAllCALHold = ($OverAllHold/$OverAllColumnHold);
	      $OverAllCALLook = ($OverAllLook/$OverAllColumnLook);
	       $OverAllCALApps = ($OverAllApps/$OverAllColumnApps);
	        $OverAllCALSpeed = ($OverAllSpeed/$OverAllColumnSpeed);
	         $OverAllCALCamera = ($OverAllCamera/$OverAllColumnCamera);
	         $OverAllColumn = ($OverAllColumnPrice + $OverAllColumnHold + $OverAllColumnLook + $OverAllColumnApps + $OverAllColumnSpeed + $OverAllColumnCamera);
	    $ratingscalculatetPrice = substr($OverAllCALPrice, 0, 3);
	    $ratingscalculatetHold = substr($OverAllCALHold, 0, 3);
	    $ratingscalculatetLook = substr($OverAllCALLook, 0, 3);
	    $ratingscalculatetApps = substr($OverAllCALApps, 0, 3);
	    $ratingscalculatetSpeed = substr($OverAllCALSpeed, 0, 3);
	    $ratingscalculatetCamera = substr($OverAllCALCamera, 0, 3);

	      echo "<h3>Pris: ".$ratingscalculatetPrice." <span class='glyphicon glyphicon-star'></span> </h3>";
	      echo "<h3>Holdbarhed: ".$ratingscalculatetHold." <span class='glyphicon glyphicon-star'></span> </h3>";

echo "<h3>Udseende: ".$ratingscalculatetLook." <span class='glyphicon glyphicon-star'></span> </h3>";
echo "<h3>Apps: ".$ratingscalculatetApps." <span class='glyphicon glyphicon-star'></span> </h3>";
echo "<h3>Hastighed: ".$ratingscalculatetSpeed." <span class='glyphicon glyphicon-star'></span> </h3>";
echo "<h3>Kamera: ".$ratingscalculatetCamera." <span class='glyphicon glyphicon-star'></span> </h3>";

	      echo "<br><h4>Baseret på: ".$OverAllColumn." ratings på denne telefon<br>";
	  
	      
 };
      
      ?>
         </div>
 <div class="row">
         <div class="col-md-12">
         
         <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Tryk her for at minimere de nuværende anmeldelser for at komme hurtigt ned og rate
        </a>
      </h4>
    </div>
         
          <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
         
             <h2>Anmeldelser</h2>
           <h3>
	      
	      Filter:
	      
      </h3>         
<ul class="nav nav-pills">
  <li><a href="#" onClick="return false" onmousedown="javascript:swapContent("con1");">Hurtighed</a></li>
  <li><a href="#" onclick="loadXMLDoc()">Udseende</a></li>
  <li><a href="#" onclick="loadXMLDoc()">Apps</a></li>
  <li><a href="#" onclick="loadXMLDoc()">Holdbarhed</a></li>
  <li><a href="#" onclick="loadXMLDoc()">Pris</a></li>
  <li><a href="#" onclick="loadXMLDoc()">Kamera</a></li>
</ul>
  
<div id="commentdiv">
             <table class="table table-condensed">
             %%comments%%
             
  				</table></div>
  </div>
   </div>
    </div>
         </div>
            <div class="col-md-12">
            
              <?php 
     //Always place this code at the top of the Page


if (isset($_SESSION['oauth_id'])) {



       ?>
        <h2>Her kan du rate din %%titel%%</h2>
        <br>
        
        
      
        
        
 <div class="row">
         <form method="post" action="rate-post.php" name="RatePhoneFormular">
			 <div class="input-group input-group-lg">
			
				 <input type="hidden" id="focusedInput" class="form-control" placeholder="Skriv tallet: %%phoneid%%" name="sidesortering" maxlength="100" id="sidesortering" value="<?php echo $_GET[phone] ?>" >
				 </div>
				 <input type="hidden" name="facebookname" id="facebookname" value="<?php echo htmlspecialchars($_SESSION['username'])  ?>">
				 <input type="hidden" name="fbpicture" id="fbpicture" value= '<?php echo 'https://graph.facebook.com/'.$_SESSION['oauth_id'].'/picture' ?>'>
				 
				<div class="col-md-5">
								 <br>
				 Din kommentar til udseende:<br>
				 
				 
				 
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
			
				</ul>

				 
				 
				 
				 
				 
								 <textarea placeholder="Her kan du skrive lidt om hvad du synes om designet/udseendet" class="form-control" id="focusedInput" rows="4" name="ratingcommentlook" id="ratingcomment"></textarea>
				 	
				 	 <br>
				
				 	<br>
				 	 Din kommentar til pris:<br>
				 	 
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
				 	 
				 				 <textarea placeholder="Her kan du skrive lidt om hvad du synes om prisen i forhold til hvad dy synes du får af værdi fra telefonen" class="form-control" id="focusedInput" rows="4" name="ratingcommentprice" id="ratingcomment"></textarea>
			
				 	<br>
				 	
		
				 	
				 	
				 	
				<br>
				 	 Din kommentar til holdbarhed:<br>
				 	 
				 	 
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
				 	 
				 	 
				 	 
				 	 
				 	 
				 <textarea placeholder="Her kan du skrive lidt om hvad du synes om hvordan holdbarheden er på telefonen(Ridser og lign.)" class="form-control" id="focusedInput" rows="4" name="ratingcommenthold" id="ratingcomment"></textarea>
				 	<br>
				 		
				

<br>
				 	 Din kommentar til apps:<br>
				 	 
				 	 
				 	  			<ul class="form">
    <li>				
    <span class="star-rating">
				<input  type="radio" name="ratingpointapps" value="1"><i></i>
				<input type="radio" name="ratingpointapps" value="2"> <i></i>
				
				<input type="radio" name="ratingpointapps" value="3"><i></i>
				
			<input type="radio" name="ratingpointapps" value="4"><i></i>
			
				<input type="radio" name="ratingpointapps" value="5"> <i></i>
			
				</span>
				</li>
				</ul>
				 	
				 	 
				 	 
				 <textarea  class="form-control" id="focusedInput" rows="4" name="ratingcommentapps" id="ratingcomment" placeholder="Her kan du skrive lidt om hvad du synes om de apps der er til telefonen"></textarea>
				 		 	
				
				 	
		<br><br>
				 	
				 	<button type="submit" class="btn btn-success" value="Rate telefonen">Anmeld</button>
				         
				 	<br><br>	<br><br>	<br><br>
				</div>
				
				 	<div class="col-md-5">
				 	<br>
				 	 Din kommentar til hastighed:<br>
				 	 
				 	 
				 	 
				 	 		 			<ul class="form">
    <li>
			<span class="star-rating">
				<input  type="radio" name="ratingpointspeed" value="1"> <i></i>
				<input type="radio" name="ratingpointspeed" value="2"> <i></i>
				
				<input type="radio" name="ratingpointspeed" value="3"> <i></i>
				
			<input type="radio" name="ratingpointspeed" value="4">  <i></i>
			
				<input type="radio" name="ratingpointspeed" value="5">  <i></i>
				</span>
				</li>
				</ul>
				 	
				 	 
				 	 
				 	 
				 <textarea placeholder="Her kan du skrive lidt om hvad du synes hastigheden" class="form-control" id="focusedInput" rows="4" name="ratingcommentspeed" id="ratingcomment"></textarea>
				 	 	
		
				 	
				 	
				<br>
				 
				 	<br>
				 	 Din kommentar til kamera:<br>
				 	 
				 	 	 		 	
				 			<ul class="form">
    <li>
				<span class="star-rating">
				<input  type="radio" name="ratingpointcamera" value="1"> <i></i> 
				<input type="radio" name="ratingpointcamera" value="2"> <i></i> 
				
				<input type="radio" name="ratingpointcamera" value="3"> <i></i> 
				
			<input type="radio" name="ratingpointcamera" value="4"> <i></i>
			
				<input type="radio" name="ratingpointcamera" value="5"> <i></i>
				</span>
				</li>
				</ul>
				 	
				 	 
				 	 
				 	 
				 <textarea placeholder="Her kan du skrive lidt om hvad du synes om kameraet" class="form-control" id="focusedInput" rows="4" name="ratingcommentcamera" id="ratingcomment"></textarea>
				 	
				 	
			
				 	
				 	
				<br>
				 	
				 	
				 	
				 	
				 	<br>
				 	 Her bedes du skrive de generelle fejl på telefonen:
				 <textarea class="form-control" id="focusedInput" rows="4" name="ratingcommentgeneral" id="ratingcommentgenerel"></textarea>
				 	</div>	

 
</form>


</div>
<?php

}
else
{


//echo'<h2>Du skal være logget ind for at rate</h2>';
?>
        <h2>Her kan du rate din %%titel%%</h2>

        <div class="alert alert-danger">Du kan ikke rate før du er logget ind, gå op i højre hjørne for at logge ind.</div>				
<?php

}
     ?>
            

   
  <?php    } elseif (false !== strpos($url,'?cat=')) {    
                        
            echo "
            <div class='row'>
           
            <div class='col-md-10'>
 <h3>Sådan!</h3>


<p>Du har nu valgt en telefon kategori, for at komme ind og rate skal du vælge en telefon ude til venstre</p>
<br><br>
<br><br>" ;

if (isset($_SESSION['id'])) {
echo "<div class='alert alert-success'>Sådan, du er nu logget ind via facebook og du kan nu rate en telefon. Hvis du vil logge ud kan det gøres oppe i højre hjørne.</div>";
}
else{

echo "<div class='alert alert-warning alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <strong>Vigtigt!</strong> Husk at logge ind, ellers kan du ikke rate.
  Du logger ind oppe i højre hjørne
</div>
           </div>
   </div>
  
";}


}
else
{
echo " </div>

<div class='row'>
           
            <div class='col-md-11'>
 <h3>Velkommen til Phonerate</h3>


<p>Velkommen til phonerate.dk, du kan hos os rate de telefoner du har haft, og beskrive dine oplevelser med dem. Du kan også se andres anmeldelser og deres oplevelser, så det bliver nemmere for dig at vælge telefon.
	
	Vælg en kategori for oven, for at komme igang.
</p>
<br><br>
";
if (isset($_SESSION['id'])) {
echo"<div class='alert alert-success'>Sådan, du er nu logget ind via facebook og du kan nu rate en telefon. Hvis du vil logge ud kan det gøres oppe i højre hjørne.</div>";
}
else{

echo "
<div class='alert alert-warning alert-dismissable'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  <strong>Vigtigt!</strong> Husk at logge ind, ellers kan du ikke rate.
  Du logger ind oppe i højre hjørne
</div>
           </div>
   </div>
   ";
}

}


 ?>
 
 <div class="navbar navbar-default navbar-fixed-bottom"><br>
	<div class ="container"
	<div class="row">
	<div class="col-md-5">
	<p style="color:white;"> Copyright Phonerate.dk</p>
	</div>
	<div class="col-md-2 col-md-offset-3">
	<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fphonerate&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=35&amp;appId=1374799492774805" scrolling="no" frameborder="0" style="border:none; overflow; height:35px;" allowTransparency="true"></iframe>	</div>
	</div>
	</div>
	</div>
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
	
	
	
	
	
	
	
	
	
	
	
	
	</body>


</html>