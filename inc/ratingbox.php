<?php
function feed () {
	$query = mysql_query('
		SELECT
		    *,
		    ((ratingpointprice + ratingpointlook + ratingpointapps + ratingpointspeed + ratingpointcamera + ratingpointhold) / 6) AS sum_rating
		FROM rating
		INNER JOIN (
		    SELECT *
		    FROM phones
		) ph ON ph.phoneid = rating.sidesortering
		ORDER BY ratingid DESC
		LIMIT 5
	');

	$ratings = array();

	while ( $rating = mysql_fetch_array($query) ) {
		$ratings[] = $rating;
	}

	return $ratings;
}

function topRatings () {
	$query = mysql_query('
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
		ORDER BY rating_sum DESC
	');

	$ratings = array();

	while ( $rating = mysql_fetch_array($query) ) {
		$ratings[] = $rating;
	}

	return $ratings;
}

function worseRatings () {
	$query = mysql_query('
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
			ORDER BY rating_sum ASC
			LIMIT 5
		) sort
		ORDER BY rating_sum ASC
	');


	$ratings = array();

	while ( $rating = mysql_fetch_array($query) ) {
		$ratings[] = $rating;
	}

	return $ratings;
}
?>