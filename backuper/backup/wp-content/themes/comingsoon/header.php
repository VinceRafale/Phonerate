<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title>
<?php if ( is_home() ) { ?><?php bloginfo('description'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?>Search Results&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_author() ) { ?>Author Archives&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php single_tag_title("", true); } } ?>
</title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_home()) { ?>
<?php if ( get_option('ptthemes_meta_description') <> "" ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('ptthemes_meta_description')); ?>" />
<?php } ?>
<?php if ( get_option('ptthemes_meta_keywords') <> "" ) { ?>
<meta name="keywords" content="<?php echo stripslashes(get_option('ptthemes_meta_keywords')); ?>" />
<?php } ?>
<?php if ( get_option('ptthemes_meta_author') <> "" ) { ?>
<meta name="author" content="<?php echo stripslashes(get_option('ptthemes_meta_author')); ?>" />
<?php } ?>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<?php if ( get_option('ptthemes_favicon') <> "" ) { ?>
<link rel="shortcut icon" type="image/png" href="<?php echo get_option('ptthemes_favicon'); ?>" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('ptthemes_feedburner_url') <> "" ) { echo get_option('ptthemes_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( get_option('ptthemes_scripts_header') <> "" ) { echo stripslashes(get_option('ptthemes_scripts_header')); } ?>
<?php wp_head(); ?>
<style type="text/css"> 
html, body { background:#<?php if ( get_option('ptthemes_color') != "") { ?><?php echo stripslashes(get_option('ptthemes_color'));  ?><?php } ?><?php if ( get_option('ptthemes_background') != "") { ?> url(<?php echo stripslashes(get_option('ptthemes_background'));  ?>) <?php } ?>  <?php if ( get_option('ptthemes_background_repeat') != "") { ?><?php echo stripslashes(get_option('ptthemes_background_repeat'));  ?> <?php } ?>; 
font-size:  <?php if ( get_option('ptthemes_fonts_size') != "") { ?> <?php echo stripslashes(get_option('ptthemes_fonts_size'));  ?>px <?php } ?>;
font-family:  <?php if ( get_option('ptthemes_fonts_family') != "") { ?> <?php echo stripslashes(get_option('ptthemes_fonts_family'));  ?><?php } ?>;
color: #<?php if ( get_option('ptthemes_fonts_color') != "") { ?><?php echo stripslashes(get_option('ptthemes_fonts_color'));  ?><?php } ?>;
}
p, #sidebar p.copy { color: #<?php if ( get_option('ptthemes_fonts_color') != "") { ?><?php echo stripslashes(get_option('ptthemes_fonts_color'));  ?><?php } ?>; }
a, #content p.highlight { text-decoration:none; color:#<?php if ( get_option('ptthemes_fonts_link_color') != "") { ?><?php echo stripslashes(get_option('ptthemes_fonts_link_color'));  ?><?php } ?>; }
a:hover { text-decoration:none; color:#<?php if ( get_option('ptthemes_fonts_link_hover_color') != "") { ?><?php echo stripslashes(get_option('ptthemes_fonts_link_hover_color'));  ?><?php } ?>; }

</style>
<?php if ( get_option('ptthemes_customcss') ) { ?>
<link href="<?php bloginfo('template_directory'); ?>/custom.css" rel="stylesheet" type="text/css" />
<?php } ?>
</head>

<body <?php body_class(); ?>>