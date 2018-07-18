<?php 
	global $redux_demo;
	$premiumSECtitle = $redux_demo['premium-sec-title'];
	$classieraFeaturedCategories = $redux_demo['featured-ads-cat'];
	$classieraPremiumAdsCount = $redux_demo['premium-ads-counter'];
	global $paged, $wp_query, $wp;
	$temp = $wp_query;
	$wp_query= null;
	if($featuredCatOn == 1){						
		$arags = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
            'category__not_in' => array( 491 ),
            'orderby' => 'date',
            'order' => 'DESC',
		);
	}else{
		$arags = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
            'category__not_in' => array( 491 ),
            'orderby' => 'date',
            'order' => 'DESC',
			'meta_query' => array(
			array(
				'key' => 'featured_post',
				'value' => '1',
				'compare' => '=='
				)
			),
		);
	}
	$wp_query = new WP_Query($arags);
	
?>
<section class="featured_list">
	<div class="container">
		<h2><?php echo "Featured Listings"; ?></h2>
		<ul>
			<?php 
			while ($wp_query->have_posts()) : $wp_query->the_post();
			$post_price = get_post_meta($post->ID, 'post_price', true);
			$post_phone = get_post_meta($post->ID, 'post_phone', true);
			$theTitle = get_the_title();
			$postCatgory = get_the_category( $post->ID );
			$categoryLink = get_category_link($catID);
			$classieraPostAuthor = $post->post_author;
			$classieraAuthorEmail = get_the_author_meta('user_email', $classieraPostAuthor);
			$classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
			$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<figure>
						<?php
						if( has_post_thumbnail()){
							$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'classiera-370');
							$thumb_id = get_post_thumbnail_id($post->ID);
							?>
							<img class="img-responsive" src="<?php echo $imageurl[0]; ?>" alt="<?php echo $theTitle; ?>">
							<?php
						}else{
							?>
							<img class="img-responsive" src="<?php echo get_template_directory_uri() . '/images/nothumb.png' ?>" alt="No Thumb"/>
							<?php
						}?>
						<p class="arrow-btn1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/next_disabled-btn.png" alt="image"></p>
					</figure>
					<div class="featured-title">
						<span class="thetitle"><?php echo $theTitle; ?></span>
						<div class="theprice featured">
						<?php 
						if(is_numeric($post_price)){
							echo classiera_post_price_display($post_currency_tag, $post_price);
						}else{ 
							echo $post_price; 
						}
						?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile;?>
			<?php wp_reset_query();?>
		</ul>
	</div><!--container-->
</section><!--featured_list-->