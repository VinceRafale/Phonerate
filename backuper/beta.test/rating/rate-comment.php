<?php
//BESKRIVELSE:
// Script til kommentarer samt rating. For at rate en telefon skal brugeren indsende en kommentar.
// Brugeren har så mulighed for at vælge 1-5 stjerner.

	require 'assets/db-connect.php';

	$phoneID = '1';//Test id for en telefon.
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonerate: Comment and rate</title>
	<link rel="stylesheet" href="assets/style.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="scripts/rating-stars.js"></script>
</head>
<body>
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
			<input type="submit" value="Bedøm" class="rate"><br><br>
		</form>
	</div>
</body>
</html>