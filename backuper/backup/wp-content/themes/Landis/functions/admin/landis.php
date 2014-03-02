<?php
register_activation_hook(__FILE__,'landis_install');

// ap_landis() displays the page content for the landis menu
function tk_landis() { 
	?>
	
	<?php
	
		if(isset($_POST['save'])) {	
			$search  = array('\"', "\'" );
			$replace = array('"', "'"); 
			$copyright = str_replace($search ,$replace ,$_POST['footer_copyright']);
			$date = $_POST['date'];
			$date = explode('/',$date);
			$year = $date[2];
			$month = $date[0];
			$day = $date[1];
			update_option('timer_date',$_POST['date']);
			update_option('timer_year',$year);
			update_option('timer_month',$month);
			update_option('timer_day',$day);
			update_option('timer_hour',$_POST['hour']);
			update_option('timer_minute',$_POST['minute']);
			update_option('countdown-text',$_POST['countdown-text']);
			$footer_facebook = $_POST['footer_facebook'];
			$footer_twitter = $_POST['footer_twitter'];
			update_option('footer_copyright', $copyright);
			update_option('footer_twitter', $footer_twitter);
		
			update_option('Title_text',$_POST['Title_text']);
			update_option('Content_text',$_POST['Content_text']);
			update_option('landis_template_color',$_POST['landis_template_color']);
		} 
		?>
		
		
<form method="POST" action="">
	
		<div id="header">
			<div id="header-top">
			 	
			</div>		
			<div class="theme">Landis theme</div>
			<div class="theme-adminitration">Theme Administration</div>
		<ul id="mainmenu" class="mainmenu">
		
		</ul>
		
		</div> <!--close header-->
		<div id="container">
		
		
		
<span class="main">
		<div id="app_title_save"><input type="submit" name="save" id="save" value="Save" class="button" ></div><!--close app_title_save-->
		<div id="app_title">Chose Color Scheme</div> <!--close app_title-->
		<div id="content" style="padding:10px">
			
			<?php 
			$color = get_option('landis_template_color');
			?>
				Color:<br/><br/>
				<div class="onestyle" >
				<input type="radio" name="landis_template_color" value="default" <?php if($color == 'default'){echo ' checked ';} ?> style="float:left;"><div class="screen redscreen" ></div>
				</div>
				<div class="onestyle">
				<input type="radio" name="landis_template_color" value="blue" <?php if($color == 'blue'){echo ' checked ';} ?> style="float:left;"><div class="screen bluescreen" ></div>
				</div>
				<div class="onestyle">
				<input type="radio" name="landis_template_color" value="darkgrey" <?php if($color == 'darkgrey'){echo ' checked ';} ?> style="float:left;"><div class="screen darkgreyscreen" ></div>
				</div>
				<div class="onestyle" >
				<input type="radio" name="landis_template_color" value="green" <?php if($color == 'green'){echo ' checked ';} ?> style="float:left;"><div class="screen greenscreen" ></div>
				</div>
				<div class="onestyle">
				<input type="radio" name="landis_template_color" value="brown" <?php if($color == 'brown'){echo ' checked ';} ?> style="float:left;"><div class="screen brownscreen" ></div>
				</div>
				
				<!--<select name="landis_template_color">
					<option value="default" <?php if($color == 'default'){echo ' selected="selected" ';} ?>>Red
					<option value="blue" <?php if($color == 'blue'){echo ' selected="selected" ';} ?>>Blue
					<option value="darkgrey" <?php if($color == 'darkgrey'){echo ' selected="selected" ';} ?>>Darkgrey
					<option value="green" <?php if($color == 'green'){echo ' selected="selected" ';} ?>>Green
					<option value="brown" <?php if($color == 'brown'){echo ' selected="selected" ';} ?>>Brown
				</select>-->
				
			
		</div> <!--close content-->
		<div id="app_title">Logo</div> <!--close app_title-->
		<div id="content">
			<div class="left_content">
			
					<?php

					$logo = get_option('landis_logo'); if(empty($logo)) {$logo = GD_THEME_DIR."/images/logo.gif";}else{
						?>
							<script type="text/javascript">
								jQuery(document).ready(function() {
										jQuery('.logoupload').hide();
								});
							</script>
						<?php
					}?>		
					
					<input type="text" value="<?php echo $logo;?>" name="landis_logo"  style="width:100px;"  class="postbox small"/>
	
					<span id="landis_logo" class="button upload gd_upload logoupload show">Upload Image</span>
					<span class="button gd_remove" id="remove_landis_logo">Remove Image</span>							
					<div class="gd_image_preview">
						<img src="<?php echo $logo;?>"/>
					</div>
			</div> <!--close content-->
			<div class="right_content"> Upload Your logo or paste logo url</div><!-- close right_content-->
		</div> <!--close content-->
	
		
		<div id="app_title">Favicon</div><!--close app_title-->
		<div id="content">
			<div class="left_content">
				<?php $favicon = get_option('landis_favicon'); if(empty($favicon)) {$favicon = GD_THEME_DIR."/images/favicon.ico";}?>	
				<input type="text" value="<?php echo $favicon;?>" name="landis_favicon" style="width:100px;" class="postbox small"/>
				<span id="landis_favicon" class="button upload gd_upload">Upload Image</span>
				<?php 
				$check = get_option('landis_favicon');
				if($check <> ""){ 
									?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
							jQuery('#landis_favicon').hide();
					});
				</script>
				<?php } ?>	
				
				<span class="button gd_remove" id="remove_landis_favicon">Remove Image</span>									
				<div class="gd_image_preview">
					<img src="<?php echo $favicon;?>"/>
				</div>		
			</div> 
			<div class="right_content"> Upload Your favicon or paste favicon url (16x16px)</div>
		</div>
		<div id="app_subtitle">Page text</div>
		<div id="content">
			<div class="left_content">
				<div>Title:</div>
				<?php $Title_text = get_option('Title_text');
				if(empty($Title_text)){
					$Title_text = 'Contact from landis theme';
					update_option('Title_text',$Title_text);
				}
				?>
				<input type="text" id="" name="Title_text" class="postbox" value="<?php echo $Title_text;?>" />
				
			</div>
			<div class="right_content">This is title</div>
		</div>
		<div id="content">
			<div class="left_content">
				<div>Content:</div>
				<?php $Content_text = get_option('Content_text');
				if(empty($Content_text)){
					$Content_text = 'Content text for Landis theme';
					update_option('Content_text',$Content_text);
				}
				?>
				<textarea name="Content_text" class="postbox"><?php echo $Content_text;?></textarea>
				
				
			</div>
			<div class="right_content">This is content text</div>
		</div>
		<div id="app_title">Timer</div>
		<div id="content">
			<div class="left_content">
				<div>Countdown text:</div>
				<?php $countdowntext = get_option('countdown-text');
			if(empty($countdowntext)){
				$countdowntext = "Our amazing new site will launch in";
			}
		
				?>
				<input type="text" name="countdown-text"  value="<?php echo $countdowntext; ?>" size="50">
			</div>
			<div class="left_content">
				<div>End date:</div>
				<?php $timer = get_option('timer_date');
			
		
				?>
				<input type="text" name="date" id="to" class="to dropdown-small" value="<?php if (!empty($timer)) {
					echo $timer;
				} else {echo date('m/d/Y' ,time()); } ?>">
			</div>
			<div class="left_content">
				<div>End time:</div>
				<?php 
				
				$endhour = 23;
				$hour = 0;
				while ($hour <= $endhour) {
					if($hour < 10){
						$stringhour = '0'.$hour;
					}else{
						$stringhour = $hour;
					}
					$hourarray[$hour] = $stringhour; 
					$hour++;
				}
				$endminute = 60;
				$minute = 1;
				while ($minute <= $endminute) {
					if($minute < 10){
						$stringminute = '0'.$minute;
					}else{
						$stringminute = $minute;
					}
					$minutearray[$minute] = $stringminute; 
					$minute++;
				}
				
			$hoursaved = get_option('timer_hour');
			$minutesaved = get_option('timer_minute');
				echo "Hour: <select name='hour'>";
				foreach ($hourarray as $x => $hour){
					echo "<option value='".$x."'";
					if($x == $hoursaved){ echo " selected='selected' ";}
					echo ">".$hour."</option>";
				}
				echo "</select>";
				echo "Minute: <select name='minute'>";
				foreach ($minutearray as $x => $minute){
					echo "<option value='".$x."'";
					if($x == $minutesaved){ echo " selected='selected' ";}
					echo ">".$minute."</option>";
				}
				echo "</select>";
				$hour = get_option('hour');
				$minute = get_option('minute');
							
				?>
				
			</div>
			<div class="right_content">Set your ending date and time</div>
		</div>	
		<div id="app_title">Footer</div>				
		<div id="app_subtitle">Footer Copyright text</div>
		<div id="content">
			<div class="left_content">
			
				<?php 
				$copyright = get_option('footer_copyright');
				
				
				$search  = array('\"', "\'" ,'<','>','"');
			$replace = array('"', "'",'&lt;','&gt;',"'"); 
			$copyright = str_replace($search ,$replace ,$copyright);
		
				if(empty($copyright)) { $copyright = "© 2011 Landis. All Rights Reserved.<br/> Designed by <a href='http://www.themeskingdom.com'>Themes Kingdom</a> Powered by <a href='http://www.wordpress.org'>WordPress</a>.";}?>
				<input type="text" id="" name="footer_copyright" class="postbox" value="<?php echo $copyright;?>" />
				
			</div>
			<div class="right_content">Insert Your Copyright text</div>
		</div>
		<div id="app_subtitle">Twitter</div>
		<div id="content">
			<div class="left_content">
				<div>Your Twitter account name:</div>
				<?php $twitter = get_option('footer_twitter');?>
				<input type="text" id="" name="footer_twitter" class="postbox" value="<?php echo $twitter;?>" />
				
			</div>
			<div class="right_content">Insert account name. <b>Example: "themeskingdom"</b> (If you leave field empty the twitter icon will be removed from footer)</div>
		</div>
		
		<div id="adminfooter">
			<div id="content">
				<div class="left_content">
				<span class="brought">Brought to you by</span>
				<span class="themeskingdom"></span>
				<span class="themeskingdomabout">Kingdom of <b>Awesomeness</b></span>
						<input type="submit" name="save" id="save" value="Save" class="button">
				</div>
				<div id="right_content">
				</div>
			</div>
		</div>
		</form>
   
  
   
 
    
   
<?php } ?>
