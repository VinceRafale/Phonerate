<?php
/**
 * Header
 *
 * Displays all of the <head> section and everything up to and including <body>
 *
 * @package WordPress
 * @subpackage Launch_Effect
 */

?>
<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1.0, initial-scale=1.0">

	<?php if(ler('lefx_meta_disable') == false): ?><!-- BEGIN Meta and Open Graph Tags -->
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>
	<?php if(is_single() || (is_page() && !is_page_template( 'launch.php' ))): ?>
	<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?><meta name="description" content="<?php if(get_the_excerpt()) { echo strip_tags(get_the_excerpt()); } else if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); } ?>" />
	<meta property="og:description" content="<?php if(get_the_excerpt()) { echo strip_tags(get_the_excerpt()); } else if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); } ?>" />
	<meta property="og:type" content="article" />
	<?php if(function_exists('wp_get_attachment_url') && wp_get_attachment_url(get_post_thumbnail_id($post->ID))):
		$ogImageSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500, 500 ), false, '' ); ?><meta property="og:image" content="<?php echo $ogImageSrc[0]; ?>" />
	<?php elseif (getFirstPostImage()): ?><meta property="og:image" content="<?php echo getFirstPostImage(); ?>" />
	<?php elseif (leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options')): ?><meta property="og:image" content="<?php echo leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options'); ?>" /><?php endif; ?>
	<?php else: ?><meta name="description" content="<?php if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); }  ?>" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php if(ler('bkt_metadesc')) { echo str_replace(array("\r\n", "\r", "\t", "\n"), " ", ler('bkt_metadesc')); } else { bloginfo('description'); }  ?>" />
	<meta property="og:type" content="website"/>
	<?php if(leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options')) { ?><meta property="og:image" content="<?php echo leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options'); ?>"/><?php } ?>
	<?php endif; ?>
	<?php if (ler('lefx_description_fbadmins')) { ?><meta property="fb:admins" content="<?php le('lefx_description_fbadmins'); ?>"/><?php } ?>
	<?php if (ler('lefx_description_fbappid')) { ?><meta property="fb:app_id" content="<?php le('lefx_description_fbappid'); ?>"/><?php } ?>
	<?php endif; ?>

	<?php if(leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options')) { ?><!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options'); ?>" type="image/x-icon" />
	<?php } ?>
	

<?php wp_head(); ?>

	<!-- Mobile Stylesheets -->
	<?php if(ler('container_width') == 'large') { ?><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/launch-effect-responsive.min.css" media="only screen and (max-width: 768px)"/>
	<?php } else if(ler('container_width') == 'medium') { ?><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/launch-effect-responsive.min.css" media="only screen and (max-width: 590px)"/>
	<?php } else { ?><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ss/launch-effect-responsive.min.css" media="only screen and (max-width: 480px)"/><?php } ?>
	
	<!-- WebFonts -->
	<?php $lefx_webfonts_dups = array(ler('heading_font_goog'), ler('subheading_font_goog'), ler('label_font_goog'), ler('description_font_goog'), ler('lefx_pages_nav_font_goog'), ler('lefx_pages_textlogo_font_goog'), ler('lefx_pages_h2_font_goog'), ler('lefx_pages_h3_font_goog'), ler('lefx_pages_h4_font_goog'), ler('lefx_pages_bodytext_font_goog'), ler('lefx_pages_tab_font_goog'), ler('lefx_pages_learnmoretab_font_goog'), ler('buy_now_goog'));
	$lefx_webfonts_unique = array_filter(array_unique($lefx_webfonts_dups));
	$lefx_webfonts = implode("', '", str_replace(' ','+',$lefx_webfonts_unique));
	if($lefx_webfonts || ler('lefx_typekit') || ler('lefx_monotype')): ?><script type="text/javascript">WebFontConfig = {<?php
			if($lefx_webfonts) { ?>google: { families: [ '<?php echo $lefx_webfonts; ?>' ] }<?php }
			if(ler('lefx_typekit')) { if($lefx_webfonts) { echo ', '; } ?>typekit: { id: '<?php le('lefx_typekit'); ?>' }<?php }
            if(ler('lefx_monotype')) { if(ler('lefx_typekit') || $lefx_webfonts) { echo ', '; } ?>monotype: { projectId: '<?php le('lefx_monotype'); ?>'}<?php } ?>};(function() {var wf = document.createElement('script');wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';wf.type = 'text/javascript';wf.async = 'true';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(wf, s);})();</script><?php endif; ?>  

	<!--[if lt IE 9]>
	<style>
	#background {
		filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php
			echo leimg('supersize', 'supersize_disable', 'plugin_options');
		?>', sizingMethod='scale');

		-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php
			echo leimg('supersize', 'supersize_disable', 'plugin_options');
		?>', sizingMethod='scale')";
	}
	</style>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	
	<?php if(ler('lefx_addcsshead')) { ?><!-- Start Additional User-Defined CSS -->
	<style type="text/css">
	<?php echo ler('lefx_addcsshead'); ?>
	</style><!-- End Additional User-Defined CSS -->
	<?php } ?>
		
	<?php if(ler('lefx_addjshead')) { ?><!-- Start Additional User-Defined JavaScript -->
	<?php echo ler('lefx_addjshead'); ?><!-- End Additional User-Defined JavaScript -->
	<?php } ?>
</head>

<body <?php body_class((lefx_version() != 'premium')?"lite":""); ?>>
	<div id="background" class="<?php
		if (get_option('lefx_bg_image2')&&get_option('lefx_enable_slideshow'))
			echo "slideshow";
	?>"><?php
	$output = leimg('supersize', 'supersize_disable', 'plugin_options');
	if ( get_option('lefx_enable_slideshow') && $output ) :
		$output = "<div style='background-image: url($output);'></div>";
		$speed = get_option('lefx_slide_fx_speed');
		$duration = get_option('lefx_slide_speed');
		for ( $i=2;$i<6;$i++) {
			$img = get_option('lefx_bg_image'.$i);

			if ($img) $output .= "<div style='background-image: url($img);'></div>";
		}
		echo $output;
	endif; ?></div>
