<?php 

/*************************************************************
* Do not modify unless you know what you're doing, SERIOUSLY!
*************************************************************/
error_reporting(E_ERROR);
global $blog_id;
if(get_option('upload_path') && !strstr(get_option('upload_path'),'wp-content/uploads'))
{
	$upload_folder_path = "wp-content/blogs.dir/$blog_id/files/";
}else
{
	$upload_folder_path = "wp-content/uploads/";
}
global $blog_id;
if($blog_id){ $thumb_url = "&amp;bid=$blog_id";}

if ( function_exists( 'add_theme_support' ) ){
	add_theme_support( 'post-thumbnails' );
	}

// Theme variables
require_once (TEMPLATEPATH . '/library/functions/theme_variables.php');

//** ADMINISTRATION FILES **//

    // Theme admin functions
    require_once ($functions_path . 'admin_functions.php');

    // Theme admin options
    require_once ($functions_path . 'admin_options.php');

    // Theme admin Settings
    require_once ($functions_path . 'admin_settings.php');

   
   if(isset($_REQUEST['dummy_insert']) && $_REQUEST['dummy_insert'] == 1){
		global $kampylefeedback, $themename, $shortname, $options;
		foreach ($options as $value){
			if($value['id'] == 'ptthemes_main_content'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_background'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_background_repeat'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_color'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_fonts_family'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_fonts_size'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_fonts_color'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_fonts_link_color'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_fonts_link_hover_color'){
				update_option( $value['id'], $value['std'] ); 
			}elseif($value['id'] == 'ptthemes_main_img'){
				update_option( $value['id'], $value['std'] ); 
			}
		}
		header("Location: themes.php");
		die;
   }
   
//** FRONT-END FILES **//

    // Widgets
   // require_once ($functions_path . 'widgets_functions.php');

    // Custom
   //  require_once ($functions_path . 'custom_functions.php');


    // Comments
 //   require_once ($functions_path . 'comments_functions.php');
	
 //	require_once ($functions_path . 'yoast-canonical.php');

	// require_once ($functions_path . 'yoast-breadcrumbs.php');
	
	//require_once ($functions_path . 'most-popular.php');
	

?>