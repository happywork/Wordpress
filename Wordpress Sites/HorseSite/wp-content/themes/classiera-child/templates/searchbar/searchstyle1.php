<?php 
	global $redux_demo;
	$classieraLocationName = 'post_location';
	$classieraLocationSearch = $redux_demo['classiera_search_location_on_off'];
	$classieraLocationType = $redux_demo['classiera_search_location_type'];
	$locShownBy = $redux_demo['location-shown-by'];
	if($locShownBy == 'post_location'){
		$classieraLocationName = 'post_location';
	}elseif($locShownBy == 'post_state'){
		$classieraLocationName = 'post_state';
	}elseif($locShownBy == 'post_city'){
		$classieraLocationName = 'post_city';
	}
?>
<section class="search_form"><!-- search form section -->
	<div class="container">
		<form method="get" action="<?php echo home_url(); ?>" id="cava-search-form">
			<input type="text" placeholder="<?php esc_html_e( 'I’m looking for ...', 'classiera' ); ?>" name="s">
			<div class="sel">
				<?php get_template_part( 'templates/classiera-locations-dropdown' );?>
				<!--Categories-->
				<select id="category_name" name="category_name">
					<option value="-1" selected disabled>
						<?php esc_html_e('All Categories', 'classiera'); ?>
					</option>
					<?php 
					$args = array(
						'hierarchical' => '0',
						'hide_empty' => '0'
					);
					$categories = get_categories($args);
					foreach ($categories as $cat) {
						if($cat->category_parent == 0){
							$catID = $cat->cat_ID;
							?>
						<option value="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></option>	
							<?php
							$args2 = array(
								'hide_empty' => '0',
								'parent' => $catID
							);
							$categories = get_categories($args2);
							foreach($categories as $cat){											
								?>
							<option value="<?php echo $cat->slug; ?>">- <?php echo $cat->cat_name; ?></option>	
								<?php
							}
						}
					}
					?>
				</select>
				<!--Categories-->
			</div>
			<div class="hoverable search_btn">
				<span class="h_effect"></span>
				<input type="submit" name="search" value="search">
			</div>
		</form>
	</div>
</section><!-- search form section -->