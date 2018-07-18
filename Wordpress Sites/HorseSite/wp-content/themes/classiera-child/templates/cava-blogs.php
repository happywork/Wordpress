<?php 
	global $redux_demo;
	$classieraBlogSecTitle = $redux_demo['classiera_blog_section_title'];
	$classieraBlogSecDesc = $redux_demo['classiera_blog_section_desc'];
	$classieraBlogSecCount = $redux_demo['classiera_blog_section_count'];
	$classieraBlogSecPOrder = $redux_demo['classiera_blog_section_post_order'];
	$classieraBlogPOrder = $redux_demo['classiera_blog_post_order'];
	$cavalookbookposts = $redux_demo['cava_lookbook_posts'];
	$cavalookblogAds = $redux_demo['cava_blog_adv']['url'];
?>
<?php 
	$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',
		'posts_per_page' => $classieraBlogSecCount,
		'order' => $classieraBlogPOrder,
		'orderby' => $classieraBlogSecPOrder,
		'post__not_in' => $cavalookbookposts,
	);
	$blogSecQuery = new WP_Query($args);
?>
<section class="video_sec container">
	<div class="row">
		<div class="col-md-9 col-sm-9">
			<ul>
			<?php 
			if ( $blogSecQuery->have_posts() ):
				while ( $blogSecQuery->have_posts() ) : $blogSecQuery->the_post();
				$user_ID = $post->post_author;
				$classieradateFormat = get_option( 'date_format' );
			?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php 
						if( has_post_thumbnail()){
							echo get_the_post_thumbnail();
						}	
						?>
					</a>
				</li>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			</ul>
		</div>
		<div class="col-md-3 col-sm-3">
			<img src="<?php echo $cavalookblogAds; ?>" alt="image">
		</div>
	</div>
</section>


