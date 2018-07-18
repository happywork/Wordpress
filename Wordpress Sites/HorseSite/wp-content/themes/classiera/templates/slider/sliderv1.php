<?php 
	global $redux_demo;
	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	$page_slider = get_post_meta($current_page_id, 'page_slider', true);
?>
<!-- layer slider -->
<section id="slider">
	<div id="full-slider-wrapper">
		<?php 
			
                echo do_shortcode('[layerslider id="1"]');		
			
		?>
	</div>
</section>
<!-- layer slider -->