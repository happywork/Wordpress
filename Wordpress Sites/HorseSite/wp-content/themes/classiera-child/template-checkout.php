<?php
/**
 * Template name: Checkout Page
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

get_header();
 ?>
<!--PageContent-->
<!--- why are you giving margin-bottom to the nav-bar ?? -->
<section class="banner-cont chkout-banner" style="margin-top: -30px;">
    <div class="container">
      	<h2><?php the_title(); ?></h2>
    </div>
</section>
<section class="inner-page-content border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div><!--col-md-8 col-lg-9-->
		</div><!--row-->
	</div>
</section>
<!--PageContent-->
<?php get_footer(); ?>
