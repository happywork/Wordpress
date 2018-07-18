<?php 
	global $redux_demo;
	$cavalookbooktitle = $redux_demo['cava_lookbook_title'];
	$cavalookbookposts = $redux_demo['cava_lookbook_posts'];
	/*$tax_query = array();
	foreach($cavalookbookposts as $key => $catID){		
		$tax_query .= array(
			'taxonomy' => 'blog_category',
			'field' => 'term_id',
			'terms' => $catID,
		);
	}
	//print_r($tax_query);*/
?>
<?php 
	/*$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',	
		'posts_per_page' => 5,
		'tax_query' => array($tax_query)
	);*/
	$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',
		'post__in' => $cavalookbookposts,
	);
	$blogSecQuery = new WP_Query($args);
	//print_r($args);
?>
<section class="lookbooks">
	<h2><?php echo $cavalookbooktitle; ?></h2>
	<ul class="lookbooks-slider">
		<?php 
		if ( $blogSecQuery->have_posts() ):
			while ( $blogSecQuery->have_posts() ) : $blogSecQuery->the_post();
			$user_ID = $post->post_author;
			$classieradateFormat = get_option( 'date_format' );
		?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<figure>
					<?php 
					if( has_post_thumbnail()){
						echo get_the_post_thumbnail();
					}	
					?>
				</figure>
				<div>
					<h3><?php the_title(); ?></h3>
					<p><?php echo get_the_date($classieradateFormat, $post->ID); ?></p>
					<p class="lb_btn hoverable">
						<span class="h_effect"></span>
						<?php esc_html_e( 'Lookbook', 'classiera' ); ?>
					</p>
				</div>
			</a>
		</li>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</section>