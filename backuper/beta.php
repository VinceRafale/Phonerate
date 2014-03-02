<?php
include("inc/connection.php");
mysql_connect($hostname,$brugernavn,$password);
mysql_select_db("phonerate_dk_db") or die(mysql_error()); 
$data = mysql_query("SELECT * FROM phones") 
 or die(mysql_error()); 

//$info = mysql_fetch_array($data); 
?>

<html>


<head>
<!-- Rating system -->
<meta charset="UTF-8">
	<title>Phonerate: Comment and rate</title>
	<link rel="stylesheet" href="assets/style.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="scripts/rating-stars.js"></script>
<!-- Rating system -->

<link rel="stylesheet" href="css/beta.css" type="text/css" media="screen" />

</head>



<body>
<!-- Hoved div på siden -->	
<div class="wrapper1">


<div class="phonemenu">
<?php


 ?> 



</div>

<!-- Telefon info boks(inklusiv overall) -->


<div class="phoneinfobox">


<div class="phoneinfo">
<div class="user">
		<?php include 'scripts/fbaccess.php'; ?>
	</div>
<div class="phonedata">
	<h1> <?php echo $info ['phonename']; ?> </h1>
	<?php echo $info ['phoneinfo']; ?>
</div>
	<div class="wrapper">
		<h2>Bedøm Telefon</h2>	
		<?php echo "<form method='POST' action='scripts/rate.php?phoneID=".$phoneID."'>"; ?>
			<div class="radios">
			<p class="info">Bedømmelse:</p>
			<input type="radio" id="star1" name="rating" value="1">
			<label for="star1" class="radio" id="label-star1">
		
			<input type="radio" id="star2" name="rating" value="2">
			<label for="star2" class="radio" id="label-star2">

			<input type="radio" id="star3" name="rating" value="3">
			<label for="star3" class="radio" id="label-star3">

			<input type="radio" id="star4" name="rating" value="4">
			<label for="star4" class="radio" id="label-star4">

			<input type="radio" id="star5" name="rating" value="5">
			<label for="star5" class="radio" id="label-star5">
			</div>
			<textarea cols="40" name="comment" rows="10" placeholder="Kommentar"></textarea><br>
			<?php if($user_id){ ?>
			<input type="submit" value="Bedøm" class="rate"><br><br>
			<?php }else{ echo "Log ind for at bedømme telefon."; } ?>
		</form>
	</div>
</div>
<div  class= "comment">

<?php

//class ratingandcomments


?>


</div>

</div>








</div>




</body>





</html>
<?php


?>