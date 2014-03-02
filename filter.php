 <?php

	
	$CommentDataQuery = mysql_query("SELECT * FROM rating WHERE sidesortering='$id' ORDER BY ratingid ASC");

	
		while($CommentData = mysql_fetch_array($CommentDataQuery))
		{
	$ratingpointlook1 = $CommentData[ratingpointlook];
	$ratingpointprice1 = $CommentData[ratingpointprice];	
		
		
	$overallpointrating = $ratingpointlook1 + $ratingpointprice1 / 6;	
		
		/*	$OverRatingQuery1 = mysql_query ("SELECT * FROM (SELECT * FROM rating WHERE sidesortering=".$id." AND rating) test1");		
		
		$OverRatingData1 = mysql_fetch_array($OverRatingQuery1);
		
		$ratingpointlook1 = $OverRatingData1['ratingpointlook'];
		*/
$overallpointratingsub = substr($overallpointrating, 0, 1);
		
		$comments .=
		"<tr>
    <td class='field-label col-md-2 active'>
           <img src=".$CommentData['fbpicture']." class='img-thumbnail' > <br>   ". $CommentData[facebookname] . "
      <br><br> 
     Rating nr: ". $CommentData[ratingid] ."
      </label> <br> <br>
       </td>
    <td class='col-md-5'>

     <p><h4>Hurtighed</h4>".$CommentData[ratingcommentspeed]."<br><br></p>
     <p><h4>Kamera</h4>".$CommentData[ratingcommentcamera]."<br><br></p>
    </td>
    <td class='col-md-3'>
   
   <label>Udseende: ".$CommentData[ratingpointlook]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Pris: ".$CommentData[ratingpointprice]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Holdbarhed: ".$CommentData[ratingpointhold]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Apps: ".$CommentData[ratingpointapps]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label>
   <br><br>
   <label>Hurtighed: ".$CommentData[ratingpointspeed]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
    <label>Kamera: ".$CommentData[ratingpointcamera]." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br><br>
    <label>Samlet: ".$overallpointratingsub." <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   </td></tr>";
		
		}

 
  echo "<table class='table table-condensed'
 >";
             echo $comments;
             
  				echo "</table>";
 
 
  			
  				?>