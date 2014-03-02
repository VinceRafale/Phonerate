<?php
/**
 * Functions
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */


/* Version
================================================== */
define("LE_VERSION", "2.28");
function lefx_version() {
	include('functions/version.php');
	$lefx_version = $version;
	return $lefx_version;
}



/* Make the stats table accessible
================================================== */
global $wpdb;
$stats_table = $wpdb->prefix . "launcheffect";



/* Create/Update tables upon theme activation
================================================== */
function theme_activation(){

		global $wpdb;
		global $wordpressapi_db_version;

		$wordpressapi_db_version = "1.0";
		$launcheffect_db_version = "1.0";

		// Create stats table
		$stats_table = $wpdb->prefix . "launcheffect";

		// Check for current version
		if(get_option('launcheffect_db_version') != $launcheffect_db_version || get_option('lefx_version') != lefx_version())
		{
		    if(lefx_version() == 'premium')
			{
				$sql2 = "CREATE TABLE " . $stats_table . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time VARCHAR(19) DEFAULT '0' NOT NULL,
					email VARCHAR(55),
					code VARCHAR(6),
					referred_by VARCHAR(6),
					visits int(10),
					conversions int(10),
					ip VARCHAR(20),
					UNIQUE KEY id (id),
					custom_field1 VARCHAR(2000),
					custom_field2 VARCHAR(2000),
					custom_field3 VARCHAR(2000),
					custom_field4 VARCHAR(2000),
					custom_field5 VARCHAR(2000),
					custom_field6 VARCHAR(2000),
					custom_field7 VARCHAR(2000),
					custom_field8 VARCHAR(2000),
					custom_field9 VARCHAR(2000),
					custom_field10 VARCHAR(2000)

				);";
			}
			else
			{
				$sql2 = "CREATE TABLE " . $stats_table . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time VARCHAR(19) DEFAULT '0' NOT NULL,
					email VARCHAR(55),
					code VARCHAR(6),
					referred_by VARCHAR(6),
					visits int(10),
					conversions int(10),
					ip VARCHAR(20),
					UNIQUE KEY id (id)
				);";
			}
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql2);
			add_option("wordpressapi_db_version", $wordpressapi_db_version);
			add_option("launcheffect_db_version", $launcheffect_db_version);
			add_option('lefx_version', lefx_version());
		}
}
add_action('after_setup_theme','theme_activation');



/* Enqueue CSS
================================================== */
function lefx_css() {

	wp_register_style('lefx_css_main', get_template_directory_uri() . '/ss/launch-effect.min.css', false, '1.0.0');
	wp_enqueue_style('lefx_css_main');

	wp_register_style('lefx_css_dynamic', get_template_directory_uri() . '/ss/dynamic-css.php', false, get_theme_mod('lefx_dynamic_css_version','1.00'));
	wp_enqueue_style('lefx_css_dynamic');

}
add_action('wp_enqueue_scripts', 'lefx_css');



/* Enqueue JS
================================================== */
function lefx_js() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.8.3.min.js', false, null );
	wp_enqueue_script( 'jquery' );

	wp_register_script('lefx_js_googlewebfonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.0.22/webfont.js', array('jquery'), null );
	wp_enqueue_script('lefx_js_googlewebfonts');

	wp_register_script('lefx_js_init', get_template_directory_uri() . '/js/launch-effect.min.js', array('jquery'), '2.21', true );
	wp_enqueue_script('lefx_js_init');

}
add_action('wp_enqueue_scripts', 'lefx_js');



/* Includes
================================================== */

// Create posts upon activation
if (isset($_GET['activated']) && is_admin() && current_user_can('edit_posts')){
	require_once(TEMPLATEPATH . '/functions/activation-posts.php');
}

// Premium functions.php
if(lefx_version() == 'premium') {
	require_once(TEMPLATEPATH . '/premium/functions.php');
}

// Launch Effect functions
require_once(TEMPLATEPATH . '/functions/theme-functions.php');

// Functions to build admin options panels
require_once(TEMPLATEPATH . '/functions/optionspanel.php');

// MailChimp API
require_once(TEMPLATEPATH . '/inc/MCAPI.class.php');

// Aweber API
require_once(TEMPLATEPATH . '/inc/aweber/api/aweber_api.php');

// Campaign Monitor API
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_general.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_lists.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_clients.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_subscribers.php');

// Integrations admin options panel
require_once(TEMPLATEPATH . '/functions/integrations.php');

// Designer > Global Settings admin options panel
require_once(TEMPLATEPATH . '/functions/designer-global.php');

// Designer > Sign-Up Page admin options panel
require_once(TEMPLATEPATH . '/functions/designer-launchmodule.php');

// Designer > Theme admin options panel
require_once(TEMPLATEPATH . '/functions/designer-pages.php');

// Functions to format get_options results
require_once(TEMPLATEPATH . '/functions/designer-functions.php');

// Designer > product admin options panel
require_once(TEMPLATEPATH . '/functions/designer-product.php');

// Admin stats panel
require_once(TEMPLATEPATH . '/functions/stats.php');

// Update default sizes
if (! get_option('lefx_pages_thumbnail_override') ) {
	update_option('thumbnail_size_w', 140);
	update_option('thumbnail_size_h', 80);
	update_option('thumbnail_crop', 1);
	update_option('medium_size_w', 470);
	update_option('medium_size_h', 9999);
}
if ( ! isset( $content_width ) ) $content_width = 780;

/* Enqueue Admin CSS & JS
================================================== */
function lefx_css_js_admin($hook){
	if (!strpos($hook, "lefx")) return;

	wp_enqueue_style('thickbox');

    wp_register_style( 'lefx_css_admin_main', get_template_directory_uri() . '/functions/ss/launch-effect-admin.min.css', false, '1.0.0' );
    wp_enqueue_style( 'lefx_css_admin_main' );

	wp_register_script('lefx_js_admin_googlewebfonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.0.22/webfont.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_js_admin_googlewebfonts');

	wp_register_script('lefx_js_admin_init', get_template_directory_uri() . '/functions/js/launch-effect-admin.min.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_js_admin_init');

	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');

    wp_localize_script( 'lefx_js_admin_init', 'wp_js', array(
		'themeDir' => get_template_directory_uri(),
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'delcol' => wp_create_nonce( 'remove-col-nonce' ),
	) );

}
add_action('admin_enqueue_scripts', 'lefx_css_js_admin');



/* Build Admin Menus and Submenus
================================================== */
add_action('admin_menu', 'build_le_theme_menu');
function build_le_theme_menu() {
	global $lefx_stats;
    add_menu_page(
		__('Launch Effect','launcheffect'),
		__('Launch Effect','launcheffect'),
		'manage_options',
		'lefx_designer',
		null,
		get_template_directory_uri()."/functions/im/launch_icon_sm.png"
	);
    add_submenu_page('lefx_designer', __('Designer','launcheffect'), __('Designer','launcheffect'), 'manage_options', 'lefx_designer', 'build_le_designer_page');
	add_submenu_page('lefx_designer', __('Integrations','launcheffect'), __('Integrations','launcheffect'), 'manage_options', 'lefx_integrations', 'build_le_integrations_page');
    $lefx_stats = add_submenu_page('lefx_designer', __('Stats','launcheffect'), __('Stats','launcheffect'), 'manage_options', 'lefx_stats', 'build_le_stats_page');
    add_menu_page('Export CSV','Export CSV','manage_options', 'lefx_export', 'build_le_export_page');
	add_menu_page('Launch Module', 'Launch Module', 'manage_options', 'lefx_launchmodule', 'build_le_launchmodule_page');
	add_menu_page('Pages', 'Pages', 'manage_options', 'lefx_pages', 'build_le_pages_page');
	add_menu_page('Product', 'Product', 'manage_options', 'lefx_product', 'build_le_product_page');

	add_action("load-$lefx_stats", "stats_screen_options");
}

add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('lefx_export');
	remove_menu_page('lefx_launchmodule');
	remove_menu_page('lefx_pages');
	remove_menu_page('lefx_product');
}

function stats_screen_options() {
	global $lefx_stats;
	$screen = get_current_screen();

	// get out of here if we are not on our settings page
	if(!is_object($screen) || $screen->id != $lefx_stats) return;

	$args = array(
		'label' => __('Results per page', 'launcheffect'),
		'default' => 10,
		'option' => 'stats_per_page'
	);
	add_screen_option( 'per_page', $args );
}
function stats_set_screen_option($status, $option, $value) {
	if ( 'stats_per_page' == $option ) return $value;
}
add_filter('set-screen-option', 'stats_set_screen_option', 10, 3);

// Submenus
function lefx_tabs($currtab) { ?>

	<div class="le-icons icon32"><br /></div>
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab <?php if($currtab == 'plugin_options' || $currtab == 'launchmodule_options' || $currtab == 'pages_options') { echo ' nav-tab-active'; } ?>" href="?page=lefx_designer">Designer</a>
		<a class="nav-tab <?php if($currtab == 'integrations_options') { echo ' nav-tab-active'; } ?>" href="?page=lefx_integrations">Integrations</a>
		<a class="nav-tab <?php if($currtab == 'stats' || $currtab == 'export') { echo ' nav-tab-active'; } ?>" href="?page=lefx_stats">Stats</a>
	</h2>

<?php }

function lefx_subtabs($currtab) { ?>

<ul class='subsubsub' style="float:none;">
	<li><a <?php if($currtab == 'plugin_options') { echo 'class="current"'; } ?> href="?page=lefx_designer">Global Settings</a> |</li>
	<li><a <?php if($currtab == 'launchmodule_options') { echo 'class="current"'; } ?> href="?page=lefx_launchmodule">Sign-Up Page</a> |</li>
	<li><a <?php if($currtab == 'product_options') { echo 'class="current"'; } ?> href="?page=lefx_product">Product</a> |</li>
	<li><a <?php if($currtab == 'pages_options') { echo 'class="current"'; } ?> href="?page=lefx_pages">Theme</a></li>
</ul>

<?php }



/* Title Tag
================================================== */

function launcheffect_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'launcheffect' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'launcheffect_wp_title', 10, 2 );



/* Get First Image in a Post/Page
================================================== */

function getFirstPostImage($size = 'large') {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'DESC') );

	if ($photos) {
		$photo = array_shift($photos);
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', wp_get_attachment_image($photo->ID, $size), $matches);
		$first_img = $matches [1] [0];
		return $first_img;
	}

	return false;
}



/* Add Page Excerpt Support
================================================== */

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}



/* Re-enable mime type upload support for icons
================================================== */

class WP_MimeType_Rewrite{
	var $mimes = array(
		'ico' => 'image/vnd.microsoft.icon',
	);

	function __construct($args = null) {
		if ( is_admin() ) {
			add_filter('upload_mimes', array( &$this, 'add_custom_upload_mimes') );
		}		
	}

	function add_custom_upload_mimes($existing_mimes){
		return array_merge( $existing_mimes, $this->mimes);
	}
}
new WP_MimeType_Rewrite();
