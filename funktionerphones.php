<?php

//Inkluder connection string
require("inc/connection.php");
include("facebook/fbacces.php");


//Telefon rating kategori struktur

/*
	$MenuDataQuery = mysql_query("SELECT * FROM phones WHERE phoneid = '".$_GET[phone]."'  OR catid = '".$_GET[cat]."' AND ratecat = '".$_GET[ratecat]."'  ORDER BY phoneid ASC");
				
		while($MenuData = mysql_fetch_array($MenuDataQuery))
		{
		$menu .="<li><a href=\"?phone=".$MenuData[phoneid]."&cat=".$MenuData[catid]."\">".$MenuData[phonename]."</a></li>";
		
		}
		


		$skabelon = str_replace("%%ratingcats%%", $menu, $skabelon);






*/







//Telefon menu struktur




		$MenuDataQuery = mysql_query("SELECT phoneid, catid, phonename FROM phones WHERE phoneid = '".$_GET[phone]."'  OR catid = '".$_GET[cat]."'  ORDER BY phoneid ASC");
				
		while($MenuData = mysql_fetch_array($MenuDataQuery))
		{
		$menu .="<li style='font-size: small;'><a href=\"?phone=".$MenuData[phoneid]."&cat=".$MenuData[catid]."\">".$MenuData[phonename]."</a></li>";
		
		}
		


		$skabelon = str_replace("%%menuphones%%", $menu, $skabelon);
		
//Categori menu struktur

$CatDataQuery = mysql_query("SELECT catid, catname FROM categories ORDER BY catid ASC");

		
		while($CatData = mysql_fetch_array($CatDataQuery))
		{
		$catmenu .="<li><a href=\"?cat=".$CatData[catid]."\">".$CatData[catname]."</a></li>";
		
		}
		


		$skabelon = str_replace("%%menucat%%", $catmenu, $skabelon);
		

		
//Side indhold
		//Find ud af om v¾rdien ID er sat
	
		$id = addslashes($_GET[phone]);
		
		if($id == ""){
			
			//Finde forside
			$SideDataQuery = mysql_query("SELECT * FROM sider ORDER BY sortering ASC LIMIT 0,1");
			
		}	
		
		else
		{
			
			//Hente den forspurgte side
			$SideDataQuery = mysql_query("SELECT * FROM phones WHERE phoneid='$id'");
			
		}
		
		$SideData = mysql_fetch_array($SideDataQuery);
				
		$titel = $SideData[phonename];
		$html = $SideData[phoneinfo];
		$phoneid = $SideData[phoneid];
		$phonename = $SideDataRating[phonename];
		$fbpicture = $SideDataRating[fbpicture];
		$ratingcomment = $SideDataRating[ratingcomment];
		$ratingpoint = $SideDataRating[ratingpoint];
		
		$skabelon = str_replace("%%titel%%", $titel, $skabelon);
		$skabelon = str_replace("%%indhold%%", $html, $skabelon);
		$skabelon = str_replace("%%phonename%%", $ratingtitle, $skabelon);
		$skabelon = str_replace("%%ratingcomment%%", $ratingcomment, $skabelon);
		
		 
		$skabelon = str_replace("%%facebookname%%", $facebookname, $skabelon);
		$skabelon = str_replace("%%ratingcomment%%", $ratingcomment, $skabelon);
		$skabelon = str_replace("%%phoneid%%", $phoneid, $skabelon);

		
		$CommentDataQuery = mysql_query("SELECT * FROM rating WHERE sidesortering='$id' ORDER BY ratingid DESC");
		
		
	

		
		
		while($CommentData = mysql_fetch_array($CommentDataQuery))
		{
	$ratingpointlook1 = $CommentData[ratingpointlook];
	$ratingpointprice1 = $CommentData[ratingpointprice];
	$ratingpointhold1 = $CommentData[ratingpointhold];
	$ratingpointapps1 = $CommentData[ratingpointapps];	
	$ratingpointspeed1 = $CommentData[ratingpointspeed];
	$ratingpointcamera1 = $CommentData[ratingpointcamera];
	$ratingpointbatteri1 = $CommentData[ratingpointbatteri];		
		
		
	$overallpointrating = ($ratingpointlook1 + $ratingpointprice1 + $ratingpointapps1 + $ratingpointhold1 + $ratingpointspeed1 + $ratingpointcamera1 + $ratingpointbatteri1) / 7;	
		
		/*	$OverRatingQuery1 = mysql_query ("SELECT * FROM (SELECT * FROM rating WHERE sidesortering=".$id." AND rating) test1");		
		
		$OverRatingData1 = mysql_fetch_array($OverRatingQuery1);
		
		$ratingpointlook1 = $OverRatingData1['ratingpointlook'];
		*/
$overallpointratingsub = substr($overallpointrating, 0, 1);
		
		$comments .=
		"<tr>
    <td class='field-label col-md-2 active'>
          <center> <br><img src=".$CommentData['fbpicture']." class='img-thumbnail' > <br>   ". $CommentData[facebookname] . "
      <br><br> 
     Rating nr: ". $CommentData[ratingid] ."
      </label> <br> <br>
       <center></td>
    <td class='col-md-5'>
	<p><h4>Udseende</h4>".$CommentData[ratingcommentlook]."<br><br></p>
     <p><h4>Pris</h4>".$CommentData[ratingcommentprice]."<br><br></p>
     <p><h4>Holdbarhed</h4>".$CommentData[ratingcommenthold]."<br><br></p>
     <p><h4>Apps</h4>".$CommentData[ratingcommentapps]."<br><br></p>
     <p><h4>Hastighed</h4>".$CommentData[ratingcommentspeed]."<br><br></p>
     <p><h4>Kamera</h4>".$CommentData[ratingcommentcamera]."<br><br></p>
     <p><h4>Batteri</h4>".$CommentData[ratingcommentbatteri]."<br><br></p>
    </td>
    <td class='col-md-3'>
   <div class='well'>
   <label>Udseende: ".$CommentData[ratingpointlook]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Pris: ".$CommentData[ratingpointprice]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Holdbarhed: ".$CommentData[ratingpointhold]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
   <label>Apps: ".$CommentData[ratingpointapps]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label>
   <br><br>
   <label>Hastighed: ".$CommentData[ratingpointspeed]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
    <label>Kamera: ".$CommentData[ratingpointcamera]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
    <label>Batteri: ".$CommentData[ratingpointbatteri]." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br></div>
    <label>Samlet: ".$overallpointratingsub." af 5 <span class='glyphicon glyphicon-star'></span> Stjerne(r) </label><br><br>
  
   <label><h3>Fejl:</h3><br>".$CommentData[ratingcommentgeneral]." </label>
   </td></tr>";
		
		}
		    

		$skabelon = str_replace("%%comments%%", $comments, $skabelon);
		
		



//Kategori valg

?>		
