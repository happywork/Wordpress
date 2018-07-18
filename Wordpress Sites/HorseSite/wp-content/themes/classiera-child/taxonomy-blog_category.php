<?php
/**
 * The template for displaying archives of blog categories
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 2.0.6
 */
 ?>
<?php get_header();?>
<?php 
	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	$wp_query->get_queried_object();
?>
<section class="inner-page-content border-bottom">
	<div class="container cava_container">
		<!-- breadcrumb -->
			<?php classiera_breadcrumbs();?>
		<!-- breadcrumb -->
		<div class="row top-pad-50">			
			<div class="col-md-8 col-lg-9 col-md-push-4 col-lg-push-3">
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php //get_template_part( 'templates/blog-loop' ); ?>
					<article class="cava-blog article-content cava-blog-list">
						<div class="cava_blog_header">
							<p class="text-center text-uppercase cava_blog_cat">
								<?php 
								$blog_category = get_the_terms( $post->ID, 'blog_category' );
								$catcount = 1;
								if(!empty($blog_category)){
									foreach($blog_category as $category){
										if($catcount > 1){
												?>
												,&nbsp;
												<?php
											}
										?>
										<a href="<?php echo get_category_link( $category->term_id )?>">
											<?php echo $category->name; ?>
										</a>
										<?php
										$catcount++;
									}
								}
								?>
							</p>
							<h3 class="cava_blog_heading text-uppercase">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<p class="cava_blog_description">
								<?php echo substr(get_the_excerpt(), 0,300) . '...'; ?>
							</p>
							<?php $dateFormat = get_option( 'date_format' );?>
							<p class="cava_blog_date text-center text-uppercase">
								<?php echo get_the_date($dateFormat, $post->ID); ?>
							</p>
						</div><!--cava_blog_header-->
						<?php if ( has_post_thumbnail() ){?>
						<?php 
						$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						?>
						<img class="cava_blog_img img-responsive" src="<?php echo $imageurl[0]; ?>" alt="<?php the_title(); ?>">
						<?php } ?>
						<p class="cava_blog_description">
							<?php echo substr(get_the_excerpt(), 0,300) . '...'; ?>							
						</p>
						<p class="cava_blog_btn text-center">
							<a href="<?php the_permalink(); ?>" class="cava_post_btn text-uppercase">
								<?php esc_html_e( 'Read More', 'classiera' ); ?>
								<i class="fa fa-long-arrow-right"></i>
							</a>
						</p>
						<div class="cava_blog_footer">
							<?php 
							$commentarags = array(
								'post_id' => get_the_ID(),
								'type' => 'blog'
							);
							$commentCount = count(get_comments($commentarags));
							?>
							<p>
								<a href="<?php the_permalink(); ?>">
									<?php echo $commentCount; ?>&nbsp;<?php esc_html_e( 'Comments', 'classiera' ); ?>
								</a>
							</p>								
							<?php 
							include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
							if(is_plugin_active( "accesspress-social-share/accesspress-social-share.php")){
								echo do_shortcode('[apss-share]');
							}
							?>
							<p>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="text-uppercase">
									<?php esc_html_e( 'By', 'classiera' ); ?> <?php the_author(); ?>
								</a>
							</p>
						</div>
					</article>
				<?php endwhile; ?>
				<div class="classiera-pagination">
					<nav aria-label="Page navigation">
						<?php 
						//pagination
						$big = 999999999; // need an unlikely integer		
						echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );                        
						?>
					</nav>
				</div><!--classiera-pagination-->
				<?php 
				else :
					$classieraNotFound =  esc_html__( 'Sorry Nothing Found', 'classiera' );
					echo $classieraNotFound;
				endif;
				wp_reset_postdata(); 
				?>
			</div><!--col-md-8 col-lg-9-->
			<div class="col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9">
				<aside class="sidebar">
					<div class="row">
						<?php dynamic_sidebar('blog'); ?>
					</div>
				</aside>
			</div>
		</div><!--row top-pad-50-->
	</div><!--container-->
</section>
<?php get_footer(); ?>