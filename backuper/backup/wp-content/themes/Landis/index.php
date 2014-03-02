<?php
/**
 * The main template file.
 *
 *
 * @package WordPress
 * @subpackage Landis
 * @since Landis 1.0
 */

wp_list_comments();
the_tags();
posts_nav_link();
paginate_comments_links();
wp_head();
wp_footer();
if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
register_sidebar( 'No sidebar' ); 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <?php dynamic_sidebar( $index ); ?>


 <?php comments_template( $file, $separate_comments ); ?>

 <?php comment_form(); ?>

 <?php body_class( 'bodyclass' ); ?>
 <?php 


 $args = array(
    'before'           => '<p>' . __('Pages:'),
    'after'            => '</p>',
    'link_before'      => '',
    'link_after'       => '',
    'next_or_number'   => 'number',
    'nextpagelink'     => __('Next page'),
    'previouspagelink' => __('Previous page'),
    'pagelink'         => '%',
    'more_file'        => '',
    'echo'             => 1 );
wp_link_pages( $args ); 

the_post_thumbnail();
add_editor_style();
add_custom_image_header;
add_custom_background();

add_filter('tiny_mce_before_init', 'do_change_mce_buttons');

wp_list_comments();
the_tags();
posts_nav_link();
paginate_comments_links();
wp_head();
wp_footer();

if ( ! isset( $content_width ) ) $content_width = 900;
add_theme_support( 'post-thumbnails' );
