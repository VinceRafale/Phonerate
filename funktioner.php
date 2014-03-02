<?php

//Inkluder connection string
include("inc/connection.php");


//Menustruktur

		$MenuDataQuery = mysql_query("SELECT * FROM sider ORDER BY sortering ASC");
		
		
		while($MenuData = mysql_fetch_array($MenuDataQuery))
		{
		$menu .="<li><a href=\"?side=".$MenuData[sideid]."\">".$MenuData[sidenavn]."</a></li>";
		
		}
		
		$skabelon = str_replace("%%menu%%", $menu, $skabelon);
		
//Side indhold
		//Find ud af om værdien ID er sat
	
		$id = addslashes($_GET[side]);
		
		if($id == ""){
			
			//Finde forside
			$SideDataQuery = mysql_query("SELECT * FROM sider ORDER BY sortering ASC LIMIT 0,1");
			
		}	
		
		else
		{
			
			//Hente den forspurgte side
			$SideDataQuery = mysql_query("SELECT * FROM sider WHERE sideid='$id'");
		}
		
		$SideData = mysql_fetch_array($SideDataQuery);
		
		$titel = $SideData[sidenavn];
		$html = $SideData[sideHTML];
		
		$skabelon = str_replace("%%titel%%", $titel, $skabelon);

		$skabelon = str_replace("%%indhold%%", $html, $skabelon);
		
?>		