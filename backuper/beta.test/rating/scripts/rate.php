<?php
	//Script som tilføjer den ønskede rating til databasen.
	//!! Inden disse data indsættes, check om brugeren er logget ind og check om brugeren allerede har rated. !!
	require '../assets/db-connect.php';
	$userID = 1;//Skal hentes via session f.eks.

	$phoneID = $_GET['phoneID'];
	$rating = $_POST['rating'];
	$comment = $_POST['comment'];
	$date = date("Y-m-d");

	if($rating != NULL AND $comment != NULL)
	{
		$insert = mysql_query("INSERT INTO comment VALUES (NULL, '".$userID."', '".$phoneID."', '".$rating."', '".$comment."', '".$date."')");
		if($insert)
		{
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../rate-comment.php">';    
    		exit;
		}else{
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../rate-comment.php">';    
    		exit;
		}
	}
?>