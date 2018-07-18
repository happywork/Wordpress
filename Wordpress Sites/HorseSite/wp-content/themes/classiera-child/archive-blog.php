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
	$count = 1;
	global $redux_demo;
	$cavalookbookposts = $redux_demo['cava_blog_slider_posts'];
	$cavaCatsForBlog = $redux_demo['cava_cats_blog_page'];	
?>
<section class="inner-page-content border-bottom">
	<div class="container cava_container">
		<!-- breadcrumb -->
			<?php classiera_breadcrumbs();?>
		<!-- breadcrumb -->
		<!-- cava blog carousel slider -->
		<?php 
		$args = array (
			'post_type' => array('blog'),
			'post_status' => 'publish',
			'post__in' => $cavalookbookposts,
		);
		$blogSecQuery = new WP_Query($args);
		if ($blogSecQuery->have_posts() ):
		?>
		<div class="row">
			<div class="col-lg-12 cava__blog_slider">
				<div class="owl-carousel" data-car-length="1" data-items="1" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="4000" data-dots="false" data-auto-width="false" data-auto-height="true" data-right="false" data-responsive-small="1" data-autoplay-hover="true" data-responsive-medium="1" data-responsive-xlarge="1" data-margin="15">					
					<?php while ( $blogSecQuery->have_posts() ) : $blogSecQuery->the_post(); ?>
						<div class="item">
							<div class="cava_carousel">
								<?php if ( has_post_thumbnail() ){?>
								<?php 
								$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								?>
								<img class="cava_carousel_img" src="<?php echo $imageurl[0]; ?>" alt="<?php the_title(); ?>">
								<?php } ?>
								<div class="cava_carousel_inner">
									<?php 
									$blog_category = get_the_terms( $post->ID, 'blog_category' );
									if(!empty($blog_category)){
										foreach($blog_category as $category){
											?>
											<a href="<?php echo get_category_link( $category->term_id )?>" class="cava_carousel_category text-uppercase">
												<?php echo $category->name; ?>
											</a>
											<?php
										}
									}
									?>									
									<a href="<?php the_permalink(); ?>" class="cava_carousel_heading">
										<h3 class="text-uppercase"><?php the_title(); ?></h3>
									</a>
									<a href="<?php the_permalink(); ?>" class="cava_carousel_btn cava_carousel_btn_outline text-uppercase"><?php esc_html_e( 'Read More', 'classiera' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="navText cava__slider_btn">
					<!--button one-->
					<?php if(is_rtl()){?>
						<a class="next">
							<i class="icon-right fa fa-chevron-right"></i>							
						</a>
					<?php }else{ ?>
					<a class="prev">
						<i class="icon-left fa fa-chevron-left"></i>						
					</a>
					<?php } ?>
					<!--button two-->
					<?php if(is_rtl()){?>
						<a class="prev">							
							<i class="icon-left fa fa-chevron-left"></i>
						</a>
					<?php }else{ ?>
					<a class="next">						
						<i class="icon-right fa fa-chevron-right"></i>
					</a>
					<?php } ?>
				</div>
			</div><!--col-lg-12-->
		</div><!--row-->
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<!-- cava blog carousel slider -->
		<!--contentrow-->
		<!--Boxes Row-->
		<?php 
		$catsArags = array(
			'order' => 'ASC',
			'pad_counts' =>true,
			'number' => 3,
			'hide_empty' => false,
			'include'=> $cavaCatsForBlog,
		);
		$blogcats = get_terms('blog_category', $catsArags);
		$current = 1;
		?>
		<div class="row">
			<?php 
			foreach ($blogcats as $category) {				
				$tag = $category->term_id;
				$tag_extra_fields = get_option(BLOG_CATEGORY_FIELDS);
				if (isset($tag_extra_fields[$tag])) {
					$category_image = $tag_extra_fields[$tag]['category_image'];
					
				}
			?>
			<div class="col-lg-4">
				<a href="<?php echo get_category_link( $category->term_id )?>" class="cat_blog_category">
					<img src="<?php echo $category_image; ?>" alt="<?php echo $category->name ?>">
					<span class="cat_blog_category_span"><?php echo $category->name ?></span>
				</a>
			</div>
			<?php } ?>
		</div>
		<!--Boxes Row-->
		<div class="row top-pad-50">
			<div class="col-md-8 col-lg-9 col-md-push-4 col-lg-push-3">
				<?php if ( have_posts() ): ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article class="cava-blog article-content <?php if($count != 1){echo "cava-blog-list"; }?>">
							<div class="cava_blog_header">
								<p class="text-center text-uppercase cava_blog_cat">
									<?php 
									$catcount = 1;
									$blog_category = get_the_terms( $post->ID, 'blog_category' );
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
									<?php //echo substr(get_the_excerpt(), 0,300); ?>
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
						<?php $count++; ?>
					<?php endwhile; ?>
					<?php classiera_pagination();?>
					<?php 
					else :
						$classieraNotFound =  esc_html__( 'Sorry Nothing Found', 'classiera' );
						echo $classieraNotFound;
					endif;
					wp_reset_postdata(); 
					?>
			</div><!--col-md-8-->

			<button class="btn btn-topics hidden visible-xs" type="button" data-toggle="collapse" data-target="#collapse-topics" aria-expanded="false" aria-controls="collapseExample">Topics and ADS</button>

			<div class="col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9">
				<aside class="sidebar collapse dont-collapse-sm" id="collapse-topics">
					<div class="row">
						<?php dynamic_sidebar('blog'); ?>
					</div>
				</aside>
			</div>
		</div><!--row-->
		<!--contentrow-->		
	</div>
</section>
<script>
   jQuery(document).ready(function() {
   
       if (jQuery(window).width() < 651) {
           jQuery(".match-height").hide();
           jQuery(".match-height:nth-child(2)").show();
           jQuery(".match-height:nth-child(3)").show();
       }
       
       $(window).on('resize', function(){
           var win = $(this);
           
           if (win.height() > 650) {
                jQuery(".match-height").show();
           }
           if (win.width() <= 650) {
               jQuery(".match-height").hide();
               jQuery(".match-height:nth-child(2)").show();
               jQuery(".match-height:nth-child(3)").show();
           }
       });
});
</script>
<?php get_footer(); ?>