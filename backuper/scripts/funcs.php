<?php
	//Henter kommentarer og ratings i forhold til hvilken telefon er valgt. Henter også den samlede rating for telefonen.
	include '../assets/db-connect.php';

	class ratingandcomments
	{
		public function getComments($phoneID)
		{
			//Hent infoen
			$commentQuery = mysql_query("SELECT * FROM comment WHERE phone_id='".$phoneID."' ORDER BY id ASC");
			while($comment = mysql_fetch_array($commentQuery))
			{
				$comments[$comment['id']]['id'] = $comment['id'];//Kommentarens id
				$comments[$comment['id']]['user_id'] = $comment['user_id'];//Brugerens id
				$comments[$comment['id']]['phone_id'] = $comment['user_id'];//Telefonens id
				$comments[$comment['id']]['rating'] = $comment['rating'];//Ratingen i tal
				$comments[$comment['id']]['comment'] = $comment['comment'];//Selve kommentaren
				$comments[$comment['id']]['date'] = $comment['date'];//Datoen
			}
			return $comments;
			
			//Sådan kaldes kommentarene:
			//$getComments = new ratingandcomments;//Forbered et object til at hente kommentarere
			//$comments = $getComments->getComments(1);//Gem kommentarerne i en to dimensionel variable.
			//echo $comments[1]['id'];
		}

		public function getRating($phoneID)
		{
			$ratingQuery = mysql_query("SELECT rating FROM comment WHERE phone_id='".$phoneID."' ORDER BY id ASC");
			$ratings = mysql_num_rows($ratingQuery);

			while($rating = mysql_fetch_row($ratingQuery))
			{
				$calRating += $rating[0];
			}

			$rated = $calRating/$ratings;
			return $rated;
			
			//Sådan kaldes ratingen.
			//$getRating = new ratingandcomments;//Forbered et object til at hente kommentarere
			//$rating = $getRating->getRating(1);//Gem kommentarerne i en to dimensionel variable.
			//echo $rating;
		}
	}
?>