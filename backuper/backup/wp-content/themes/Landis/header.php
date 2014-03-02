<?php
/**
 * @package WordPress
 * @subpackage landis
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<?php //SEO 
		 	if(!empty($_GET['page_id'])) {$post_id = $_GET['page_id'];}else{$post_id = $post->ID;}
		 	if(!empty($_GET['p'])) {$post_id = $_GET['p'];}else{$post_id = $post->ID;}
		 	
			$data = get_post_meta( $post_id, GD_THEME, true ); 
			
			
			?>
	<title><?php  wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script src="<?php echo  get_template_directory_uri().'/js/jquery.1.4.2.min.js';?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo  get_template_directory_uri().'/js/jquery.countdown.js';?>"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'>
	
	<?php $favicon = get_option('landis_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/images/favicon.ico"; }?>
	<link rel="shortcut icon" href="<?php echo $favicon;?>" />
	
	<?php $theme_color = get_option('landis_template_color');
	
			if(!empty($theme_color) or $theme_color!="default") { ?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri()."/style/$theme_color.css"; ?>" type="text/css" media="screen" />
		<?php } 
		
		
	
			$year = get_option('timer_year');
			$month = get_option('timer_month');
			$day = get_option('timer_day');
			$hour = get_option('timer_hour');
			$minutes = get_option('timer_minute');
	
	?>
	<script type="text/javascript">
			
				$(document).ready(function(){
				
				      var time = new Date();
						time = new Date(<?php echo $year; ?>,<?php echo $month; ?>-1,<?php echo $day; ?>,<?php echo $hour; ?>,<?php echo $minutes; ?>);
						$('#defaultCountdown').countdown({until: time});
						
						$('#removeCountdown').toggle(function() {
								$(this).text('Re-attach');
								$('#defaultCountdown').countdown('destroy');
							},
							function() {
								$(this).text('Remove');
								$('#defaultCountdown').countdown({until: time});
							}
						);
				      

					$('.show').fadeIn(600);
			  
				});
			</script>
</head>
<body <?php body_class(); ?>>
	<div id="header-holder">
	<div id="header" class="show">
		
			
				<div id="logo"><?php $logo = get_option('landis_logo'); if(empty($logo)) { $logo = get_template_directory_uri()."/images/logo.png"; }?>
					<a href="<?php home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name');?>" /></a>
				</div><!--close logo-->	
				
				<div class="Page_title"><?php $title = get_option('Title_text'); echo $title; ?></div>
				<div class="Page_content"><?php $cont = get_option('Content_text'); echo $cont; ?></div>
		
	
	</div><!--close header-->
	</div><!-- close header-holder -->
	
	
	
	