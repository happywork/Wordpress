<?php
/**
 * Template name: Homepage Cavalletti
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */
get_header(); ?>

<?php 

	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	$page_slider = get_post_meta($current_page_id, 'page_slider', true); 
	global $redux_demo; 
	$homeLayout = $redux_demo['opt-homepage-layout']['enabled'];	

?>

<?php 
get_template_part( 'templates/slider/sliderv1' );
//get_template_part( 'templates/search-cava' );
get_template_part( 'templates/searchbar/searchstyle7' );

if(dynamic_sidebar('homepage_widget_area')) : else : endif;

//get_template_part( 'templates/cava-tabs-new' );
//get_template_part( 'templates/cava-featured' );
//get_template_part( 'templates/cava-blogs' );
//get_template_part( 'templates/cava-cats' );
//get_template_part( 'templates/cava-lookbook' );
//get_template_part( 'templates/customads' );
?>
<script>
jQuery(document).ready(function(){
    jQuery("#ubermenu-nav-main-490-primary li").eq(0).addClass("ubermenu-current-menu-item");
});
</script>
<?php get_footer(); ?>