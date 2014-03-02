<?php //Define constants:
define('GD_FUNCTIONS', TEMPLATEPATH . '/functions/');
define('GD_WIDGETS', TEMPLATEPATH . '/widgets/');
define('GD_THEME_DIR', get_template_directory_uri());
define('GD_MAINMENU_NAME', 'general-options');
define('GD_THEME', 'landis');
define('THEME_NAME', 'landis');
define('GD_SHORT', 'landis_');
define('GD_THEME_VERSION', '1.0');

	
	//Load admin specific files:
	if (is_admin()) :
		
		require_once (GD_FUNCTIONS . 'admin-functions.php');
		require_once (GD_FUNCTIONS . 'ajax-image.php');
		require_once (GD_FUNCTIONS . 'admin-helper.php');
		
	
		
	endif;

	
	
	//Load helpers:
	require_once (GD_FUNCTIONS . 'helpers.php');
	
	//Add admin styles/scripts:
	add_action('admin_head', 'gd_admin_head');
		
	/*W3 menu*/
	add_theme_support( 'nav-menus' );
	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
		
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu')
			)
		);
	
	}


	// Include admin.css
	function my_wp_admin_css() {
		$style = get_template_directory_uri().'/include/css/admin.css';
	   echo "<link rel=\"stylesheet\" href=\"$style\" type=\"text/css\" />";
	}
	//Add admin styles/scripts:
	add_action('admin_head', 'my_wp_admin_css');
	
	
	
	// action function for above hook
	
	
	function tk_add_pages() {
	    // Add a new top-level menu (ill-advised):
	    add_menu_page(__(THEME_NAME.' Panel','admin-menu'), __(THEME_NAME.' Panel','admin-menu'), 'manage_options', 'tk-'.THEME_NAME, 'tk_'.THEME_NAME,get_template_directory_uri()."/images/favicon.ico"  );
	
	}
	// Hook for adding admin menus
	add_action('admin_menu', 'tk_add_pages');
	add_theme_support( 'automatic-feed-links' );
	
	//Tiny MCE Custom
	function do_change_mce_buttons( $initArray ) {
    //<a href="http://twitter.com/see" class="tweet-username">@see</a> <a href="http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference" rel="nofollow">http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference</a>
   // $initArray['theme_advanced_buttons1_add'] = $initArray['theme_advanced_buttons2'];
   // $initArray['theme_advanced_buttons2'] = '';
     
   // $initArray['theme_advanced_disable'] = 'forecolor';
 
    return $initArray;
}




	
 									