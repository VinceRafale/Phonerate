<link ref="stylesheet" href="css/worstbest.css">
<link rel="stylesheet" href="css/bootstrap.css"  type="text/css"/>
<?php


function topRatings () {
$id = $_GET[cat];
	$query = mysql_query("
		SELECT * FROM (
			SELECT
			    phonename,
			    phonephoto,
			    catid,
			    phoneid,
			    (sum_rating / count_ratings) as rating_sum
			FROM phones  
			INNER JOIN (
			    SELECT
			        (SUM((ratingpointprice + ratingpointlook + ratingpointapps + ratingpointspeed + ratingpointcamera + ratingpointhold) / 6)) AS sum_rating,
			        COUNT(ratingid) as count_ratings,
			        sidesortering
			    FROM rating
			    GROUP BY sidesortering
			) ratings ON ratings.sidesortering = phones.phoneid
			ORDER BY rating_sum DESC
			LIMIT 5
		) sort
		WHERE catid = ".$id." ORDER BY rating_sum DESC

");

	$ratings = array();

	while ( $rating = mysql_fetch_array($query) ) {
		$ratings[] = $rating;
	}

	return $ratings;
}




function Best() {
	
	
		$ratings = topRatings();
		
		?>
		
		
			<div id="feed">
				<h4><b>Bedst ratede telefoner i kategorien <b></h4>
				<?php foreach ( $ratings as $rating ): ?>
					<div class="row rating-row" data-href="http://phonerate.dk/phones.php?phone=<?= $rating["phoneid"]; ?>&cat=<?= $rating["catid"] ?>">
						<div class="col-sm-3">
							<span><img class="img-circle" width="50" height="50" src="data:image/jpeg;base64,<?php echo base64_encode($rating["phonephoto"]); ?>" /></span>
						</div>
						<div class="col-sm-9 ">
							<h4><b><?= $rating["phonename"]; ?><b></h4>
							<?php
								$sum = floor($rating['rating_sum']);
								$left = 5 - $sum;
							?>
							<div class="rating">
								<?php for ( $i=0; $i < $left ; $i++ ) : ?>
									<span>☆</span>
								<?php endfor; ?>
								<?php for ( $i=0; $i < $sum ; $i++ ) : ?>
									<span class="checked">☆</span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php
		
	
	
	
	
}

$bestrating = Best();

?>
