<?php
include("../inc/connection.php");
include("../inc/tjeklogin.php");


$HentData = mysql_query("SELECT * FROM categories ");
$SideData = mysql_fetch_array($HentData);

$HentDataPhones = mysql_query("SELECT * FROM phones ");
$PhoneData = mysql_fetch_array($HentDataPhones);
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="css/retcss.css" type="text/css"/>
</head>
<body>
<div id="border">
<div id="indhold">

<form method="get" action="phones.php">
    <button type="submit" class="btn btn-info">Tilbage</button>
</form>

<img src="images/phoneratelogo.png"/ width="200px" height="50px">
<br>
<form method="post" action="opretphone-post.php" name="OpretSideFormular" enctype="multipart/form-data">

<br>
<div class="input-group">
<div class="input-group input-group-lg">
<span class="input-group-addon">Telefonnavn</span>

<input class="form-control" type="text" name="phonename" maxlength="100" style="width: 300px;">


</div>
Beskrivelse:<br>




<textarea class="form-control" rows="10" cols="80" name="phoneinfo"> </textarea>
<br>
<br>


	
   
   
 
 
 
   <select class="form-control" name="cat">
<?php

		$HentCatDataQuery = mysql_query("SELECT * FROM categories ORDER BY catid ASC");
		
while($CatData = mysql_fetch_array($HentCatDataQuery))
		{

			$cats .=
			"<option  name='cat' value=".$CatData[catid].">".$CatData[catname]."</option>";


}

echo $cats;
var_dump($CatData[catid]);

		

?>
</select>

<br><br><br>

<legend>Billede af telefonen</legend>
<label for="userFile">Vælg et billede af telefonen på din pc:SKAL VÆRE 180x190 </label>
<input type="file" size="40" name="image" id="userFile"/><br />

</fieldset>
<br>
<input  type='hidden' name='phoneid' maxlength='4' style='width:35px' >


        
    
              
          
       <!--   <label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>          
 -->
            
       <br>             
           
        


<input data-loading-text='Opretter telefon...' class="btn btn-success" type="submit" value="Opret telefon" >
</form>
</div>
</div>
</div>
</body>
</html>
