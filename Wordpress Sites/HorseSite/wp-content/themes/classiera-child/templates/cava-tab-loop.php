<?php 
global $redux_demo;
$category_icon_code = "";
$category_icon_color = "";
$catIcon = "";
global $post;
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
<div class="col-md-4">
	<a href="<?php the_permalink(); ?>">
		<figure>
			<?php
		
				$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'classiera-370');
				$thumb_id = get_post_thumbnail_id($post->ID);
				?>
				<img class="img-responsive" src="<?php echo $imageurl[0]; ?>" alt="<?php echo $theTitle; ?>">
				<?php
			?>	
		</figure>
		<p>
            <span class="thetitle"><?php echo $theTitle; ?></span><br>
			<div class="theprice">
			<?php 
			if(is_numeric($post_price)){
				echo classiera_post_price_display($post_currency_tag, $post_price);
			}else{ 
				echo $post_price; 
			}
			?>
            </div>
			
		</p>
	</a>
</div>