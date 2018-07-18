<?php 
	global $redux_demo;
	$premiumSECtitle = $redux_demo['premium-sec-title'];
	$premiumSECdesc = $redux_demo['premium-sec-desc'];	
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
	$featuredCatOn = $redux_demo['featured-caton'];
	$classieraFeaturedCategories = $redux_demo['featured-ads-cat'];
	$classieraPremiumAdsCount = $redux_demo['premium-ads-counter'];
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$ads_counter = $redux_demo['home-ads-counter'];
	global $paged, $wp_query, $wp;
?>
<?php echo "ads Counter: " .$ads_counter . "<br> Premium ads Counter: " .$classieraPremiumAdsCount?>
<section class="container">
    <div class="row">
        <div class="col-md-9 tabs_sec">
            <ul class="tabs_slider">
                <li data-title="<?php echo $premiumSECtitle; ?>">
                    <div class="row fh_list fh_slider">
                        <?php 
						$temp = $wp_query;
						$wp_query= null;
						if($featuredCatOn == 1){						
							$arags = array(
								'post_type' => 'post',
								'posts_per_page' => $classieraPremiumAdsCount,
								'cat' => $classieraFeaturedCategories,
							);
						}else{
							$arags = array(
								'post_type' => 'post',
								'posts_per_page' => $classieraPremiumAdsCount,
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
						while ($wp_query->have_posts()) : $wp_query->the_post();
							$featuredMeta = get_post_meta($post->ID, 'featured_post', true);
							if($featuredCatOn == 1){
								$featured_post = "1";
							}else{
								$featured_post = "0";
							}
							$post_price_plan_activation_date = get_post_meta($post->ID, 'post_price_plan_activation_date', true);
							$post_price_plan_expiration_date = get_post_meta($post->ID, 'post_price_plan_expiration_date', true);
							$post_price_plan_expiration_date_noarmal = get_post_meta($post->ID, 'post_price_plan_expiration_date_normal', true);
							$todayDate = strtotime(date('m/d/Y h:i:s'));
							$expireDate = $post_price_plan_expiration_date;
							if(!empty($post_price_plan_activation_date) && $featuredMeta == 1) {
								if(($todayDate < $expireDate) or $post_price_plan_expiration_date == 0) {
									$featured_post = "1";
								}
							}elseif($featuredMeta == 1){
								$featured_post = "1";
							}
							if($featured_post == "1") {
								get_template_part( 'templates/cava-tab-loop' );
							}
						endwhile;
						wp_reset_query();
						?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							$templateAllPremium = 'template-all-premium.php';
							$templateAllPremiumURL = classiera_get_template_url($templateAllPremium);
							?>
                            <a href="<?php echo $templateAllPremiumURL; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                </li>
                <!--FEATURED HORSES-->
                <li data-title="NEW LISTINGS">
                    <div class="row fh_list nl_slider">
                        <?php 
					$args = wp_parse_args($wp->matched_query);
					if ( !empty ( $args['paged'] ) && 0 == $paged ){
						$wp_query->set('paged', $args['paged']);
						$paged = $args['paged'];
					}
					$arags = array(
						'post_type' => 'post',
						'posts_per_page' => $ads_counter,
						'paged' => $paged,						
					);
					$wsp_query = new WP_Query($arags);
					while ($wsp_query->have_posts()) : $wsp_query->the_post();
						get_template_part( 'templates/cava-tab-loop' );
					endwhile;
					wp_reset_postdata();
					wp_reset_query();
					?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo $templateAllPostURL; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
                <!--NEW LISTINGS-->
                <li data-title="MOST VIEWED">
                    <div class="row fh_list rv_slider">
                        <?php 
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ){
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => $ads_counter,
							'paged' => $paged,						
							'meta_key' => 'wpb_post_views_count',						
							'orderby' => 'meta_value_num',						
							'order' => 'DESC',						
						);
						$popularpost = new WP_Query($arags);
						while ($popularpost->have_posts()) : $popularpost->the_post();
							get_template_part( 'templates/cava-tab-loop' );
						endwhile;
						wp_reset_postdata();
						wp_reset_query();
						?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo $templateAllPostURL; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
                <!--RECENTLY VIEWED-->
            </ul>
            <!--tabs_slider-->
        </div>
        <!--col-md-9-->
        <?php get_template_part( 'templates/cava-events' );?>
    </div>
    <!--row-->
</section>