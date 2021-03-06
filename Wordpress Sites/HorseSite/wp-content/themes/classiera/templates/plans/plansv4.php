<?php
	global $redux_demo;
	$plans_Title = $redux_demo['plans-title'];
	$plans_desc = $redux_demo['plans-desc'];
	$classiera_plans_bg = $redux_demo['classiera_plans_bg']['url'];
	$classieraCartURL = $redux_demo['classiera_cart_url'];
	$currencyLeftRight = $redux_demo['classiera_currency_left_right'];
	$login = $redux_demo['login'];
	$current_user = wp_get_current_user();
	$user_ID = $current_user->ID;
?>
<section class="pricing-plan-v4 section-pad border-bottom">
	<div class="section-heading-v1 section-heading-with-icon">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 center-block">
                    <h3 class="text-capitalize"><?php echo $plans_Title; ?><i class="fa fa-dollar"></i></h3>
                    <p><?php echo $plans_desc; ?></p>
                </div><!--col-lg-8-->
            </div><!--row-->
        </div><!--container-->
    </div><!--section-heading-v1-->
	<div class="pricing-plan-content">
		<div class="container">
			<div class="row">
				<?php
					global $redux_demo;
					$classieraPlansType = "";
					global $paged, $wp_query, $wp;
					$args = wp_parse_args($wp->matched_query);
					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('post_type=price_plan&posts_per_page=-1');
					$current = -1;
					$current2 = 0;
				while ($wp_query->have_posts()) : $wp_query->the_post(); $current++; $current2++;
				$popular_plan = get_post_meta($post->ID, 'popular_plan', true);
				$free_plans = get_post_meta($post->ID, 'free_plans', true);
				$wooID = get_post_meta($post->ID, 'woo_id', true);
				$post_price = get_post_meta($post->ID, 'plan_price', true);
				$plan_text = get_post_meta($post->ID, 'plan_text', true);
				$plan_days = get_post_meta($post->ID, 'plan_time', true);
				$planFeaturedTXT = get_post_meta($post->ID, 'plan_free_text', true);
				$planSecureTXT = get_post_meta($post->ID, 'plan_secure_text', true);
				$plan_ads = get_post_meta($post->ID, 'featured_ads', true);
				$regular_ads = get_post_meta($post->ID, 'regular_ads', true);
				if($free_plans == 1){
					$classieraPlansType =  esc_html__( 'Free', 'classiera' );
				}else{
					$classieraPlansType =  esc_html__( 'Featured', 'classiera' );
				}
				$redirect = classiera_Plans_URL($free_plans);
				//echo $popular_plan."shabir";
				?>
				<div class="col-lg-3 col-md-3 col-sm-6 match-height">
					<div class="pricing-plan-box <?php if($popular_plan == 'true'){echo "popular";} ?>">
						<?php if($popular_plan == 'true'){?>
							<p class="popular-text text-center"><?php esc_html_e('Recomended', 'classiera') ?></p>
						<?php } ?>
						<div class="pricing-plan-heading text-center clearfix">
							<p class="price-title"><?php the_title(); ?></p>
							<span class="separator"></span>
							<h1>
								<span>
								<?php 
									if($free_plans == 1){
										echo $classieraPlansType;										
									}else{										
										if($currencyLeftRight == 'left'){
											echo classiera_currency_sign().$post_price;
										}else{
											echo $post_price.classiera_currency_sign();
										}
									}
								?>	
								</span>
							</h1>
							<span class="separator"></span>
						</div>
						<div class="pricing-plan-text-head text-center">
							<p><?php echo $plan_text; ?></p>
						</div>
						<div class="pricing-plan-text text-center">
							<ul>
                                <li><?php echo $planFeaturedTXT; ?></li>
                                <li>
									<?php echo $plan_ads ?>&nbsp;
									<?php esc_html_e( 'Featured ads availability', 'classiera' ); ?>
								</li>
								<li>
									<?php echo $regular_ads ?>&nbsp;
									<?php esc_html_e( 'Regular ads availability', 'classiera' ); ?>
								</li>
                                <li>
									<?php esc_html_e( 'For', 'classiera' ); ?>&nbsp;
									<?php echo $plan_days ?>&nbsp;
									<?php esc_html_e( 'days', 'classiera' ); ?>
								</li>
                                <li><?php echo $planSecureTXT; ?></li>
                            </ul>
						</div>
						<!--FormSection-->
						<form method="post" class="planForm">
							<input type="hidden" class="AMT" name="AMT" value="<?php echo $post_price; ?>" />
							
							<input type="hidden" class="wooID" name="id" value="<?php echo $wooID; ?>" />
							<input type="hidden" class="plan_id" name="plan_id" value="<?php echo $post->ID; ?>" />
							
							<input type="hidden" class="CURRENCYCODE" name="CURRENCYCODE" value="<?php echo classiera_currency_sign(); ?>">
							
							<input type="hidden" class="user_ID" name="user_ID" value="<?php echo $user_ID; ?>">
							
							<input type="hidden" class="plan_name" name="plan_name" value="<?php the_title(); ?>">
							
							<?php $plan_ads = get_post_meta($post->ID, 'featured_ads', true); ?>
							<input type="hidden" class="plan_ads" name="plan_ads" value="<?php echo $plan_ads; ?>">
							<input type="hidden" class="regular_ads" name="regular_ads" value="<?php echo $regular_ads; ?>">
							
							<?php $plan_time = get_post_meta($post->ID, 'plan_time', true); ?>
							<input type="hidden" class="plan_time" name="plan_time" value="<?php echo $plan_time; ?>">
							<div class="pricing-plan-button text-center">
							<?php 
							if($free_plans == 1){
								$link = classiera_Plans_URL();
								?>
							<a class="btn btn-primary btn-md btn-style-four" href="<?php echo $link; ?>">
								<?php esc_html_e( 'Post Ad', 'classiera' ); ?>
							</a>	
								<?php
							}else{
								if (is_user_logged_in()){
								?>
							<a rel="nofollow" href="#" data-quantity="1" data-product_id="<?php echo $wooID; ?>" data-product_sku="" class="classiera_plan_add_to_cart btn btn-primary btn-md btn-style-four">
							<?php esc_html_e( 'Purchase Now', 'classiera' ); ?>
							</a>
								<?php
								}else{
									?>
									<a rel="nofollow" href="<?php echo $login; ?>" class="btn btn-primary btn-md btn-style-four">
									<?php esc_html_e( 'Purchase Now', 'classiera' ); ?>
									</a>
									<?php
								}
							}
							?>
							</div>							
						</form>
						<div class="viewcart text-center">
							<a class="btn btn-primary btn-md btn-style-four" href="<?php echo $classieraCartURL; ?>">
							<?php esc_html_e( 'View Cart', 'classiera' ); ?>
							</a>
						</div>
						<!--FormSection-->
					</div><!--pricing-plan-box-->
				</div><!--col-lg-3-->
				<?php endwhile; ?>
				<?php $wp_query = null; $wp_query = $temp;?>
			</div><!--row no-gutter-->
		</div><!--container-->
	</div><!--pricing-plan-content-->
</section>