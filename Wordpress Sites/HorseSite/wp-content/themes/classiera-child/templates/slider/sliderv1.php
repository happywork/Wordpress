<?php 
	global $redux_demo;
	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	$page_slider = get_post_meta($current_page_id, 'page_slider', true);
?>
<!-- layer slider -->
<section id="slider">
	<div id="full-slider-wrapper">
	    <div id="HeroAd">
		<?php 
                echo adrotate_group(3);
            
               // echo do_shortcode('[layerslider id="1"]');		
		?>
		</div>
	</div>
</section>
<!-- layer slider -->