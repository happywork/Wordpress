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
<section class="search-section search-section-v6 search-section-v7">
	<div class="container">
	
				<form data-toggle="validator" role="form" class="search-form search-form-v2 form-inline" action="<?php echo home_url(); ?>" method="get">
					
				
						
							<div class="input-group inner-addon left-addon">
<!--								<i class="form-icon form-icon-size-small left-form-icon zmdi zmdi-border-color"></i>-->
								<input type="text" id="classieraSearchAJax" name="s" class="form-control form-control-lg" placeholder="<?php esc_html_e( 'I\'m looking for...', 'classiera' ); ?>" data-error="<?php esc_html_e( 'Please Type some words..!', 'classiera' ); ?>">
								<div class="help-block with-errors"></div>
								<span class="classieraSearchLoader"><img src="<?php echo get_template_directory_uri().'/images/loader.gif' ?>" alt="classiera loader"></span>
								<div class="classieraAjaxResult"></div>
							</div>
						
						<!--Locations-->
						<?php if($classieraLocationSearch == 1){?>
						
							<div class="input-group inner-addon left-addon">
				                <div class="loki"></div>
								<?php if($classieraLocationType == 'input'):?>
									<input type="text" id="getCity" name="<?php echo $classieraLocationName; ?>" class="form-control form-control-lg" placeholder="<?php esc_html_e('Please type your location', 'classiera'); ?>">
									<a id="getLocation" href="#" class="form-icon form-icon-size-small" title="<?php esc_html_e('Click here to get your own location', 'classiera'); ?>">
										<i class="fa fa-crosshairs"></i>
									</a>
								<?php elseif($classieraLocationType == 'dropdown'):?>
									<!--Locations dropdown-->	
										<?php get_template_part( 'templates/classiera-locations-dropdown' );?>
										<!--Locations dropdown-->
								<?php endif; ?>
							</div>
						
						<?php } ?>
						<!--Locations-->
						
							<div class="inner-addon left-addon right-addon">
								
                               <i class="icon select-down"></i>
                            
								<select class="form-control form-control-lg" data-placeholder="<?php esc_html_e('Select Category..', 'classiera'); ?>" name="category_name" id="ajaxSelectCat">
									<option value="-1" selected disabled><?php esc_html_e('All Categories', 'classiera'); ?></option>
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
							</div>
						
						
						
							<div class="hoverable search_btn"><span class="h_effect"></span><input type="submit" name="search"></div>
						
					
				</form>
	
	</div><!--container-->
</section><!--search-section-->