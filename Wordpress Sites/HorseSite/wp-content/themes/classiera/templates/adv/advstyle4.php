<?php 
	global $redux_demo;	
	$classieraAdsSecDesc = $redux_demo['ad-desc'];
	$ads_counter = $redux_demo['home-ads-counter'];
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
	$classieraFeaturedAdsCounter = $redux_demo['classiera_featured_ads_count'];
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classieraAdsView = $redux_demo['home-ads-view'];
	$classieraItemClass = "item-masonry";
	if($classieraAdsView == 'list'){
		$classieraItemClass = "item-list";
	}
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";
?>
<section class="classiera-advertisement advertisement-v4 section-pad-top-100">
	<div class="section-heading-v1 section-heading-with-icon">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 center-block">
                    <h3 class="text-capitalize"><?php esc_html_e( 'ADVERTISEMENTS', 'classiera' ); ?><i class="fa fa-briefcase"></i></h3>
                    <p><?php echo $classieraAdsSecDesc; ?></p>
                </div>
            </div>
        </div>
    </div>
	<div class="tab-divs">
		<div class="view-head">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-8 col-xs-12">
                        <div class="tab-button">
                            <ul class="nav nav-tabs" role="tablist">
								<li><span><?php esc_html_e( 'Filter By', 'classiera' ); ?></span></li>
                                <li role="presentation" class="active">
									<a href="#all" aria-controls="all" role="tab" data-toggle="tab">
										<?php esc_html_e( 'All Ads', 'classiera' ); ?>
										<span class="arrow-down"></span>
									</a>
                                </li>
                                <li role="presentation">                                    
									<a href="#random" aria-controls="random" role="tab" data-toggle="tab">
										<?php esc_html_e( 'Random Ads', 'classiera' ); ?>
										<span class="arrow-down"></span>
									</a>
                                </li>
                                <li role="presentation">                                   
									<a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">
										<?php esc_html_e( 'Popular Ads', 'classiera' ); ?>
										<span class="arrow-down"></span>
									</a>
                                </li>
                            </ul><!--nav nav-tabs-->
                        </div><!--tab-button-->
                    </div><!--col-lg-6 col-sm-8-->
					<div class="col-lg-6 col-sm-4 col-xs-12">
						<div class="view-as tab-button">
							<ul class="nav nav-tabs pull-right flip" role="tablist">
								<li><span><?php esc_html_e( 'View as', 'classiera' ); ?></span></li>
								<li role="presentation" class="<?php if($classieraAdsView == 'grid'){ echo "active"; }?>">
                                    <a id="grid" class="masonry" href="#">
                                        <i class="zmdi zmdi-view-dashboard"></i>
                                        <span class="arrow-down"></span>
                                    </a>
                                </li>
                                <li role="presentation" class="<?php if($classieraAdsView == 'list'){ echo "active"; }?>">
                                    <a id="list" class="list" href="#">
                                        <i class="zmdi zmdi-view-list"></i>
                                        <span class="arrow-down"></span>
                                    </a>
                                </li>
							</ul>
                        </div><!--view-as tab-button-->
					</div><!--col-lg-6 col-sm-4 col-xs-12-->
				</div><!--row-->
			</div><!--container-->
		</div><!--view-head-->
		<div class="tab-content section-gray-bg">
			<div role="tabpanel" class="tab-pane fade in active" id="all">
				<div class="container">
					<div class="row masonry-content">
					<!--FeaturedAds-->
					<?php 
						global $paged, $wp_query, $wp;
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ){
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						$featuredPosts = array();
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => $classieraFeaturedAdsCounter,
							'paged' => $paged,
							'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
								)
							),
						);
						$wsp_query = new WP_Query($arags);
						while ($wsp_query->have_posts()) : $wsp_query->the_post();
							$featuredPosts[] = $post->ID;
							get_template_part( 'templates/classiera-loops/loop-canary');
						endwhile;
						wp_reset_postdata();
						wp_reset_query(); ?>
					<!--FeaturedAds-->
					<?php 
						global $paged, $wp_query, $wp;
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ){
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						$arags = array(
							'post_type' => 'post',
							'posts_per_page' => $ads_counter,
							'paged' => $paged,
							'post__not_in' => $featuredPosts,
						);
						$wsp_query = new WP_Query($arags);
						while ($wsp_query->have_posts()) : $wsp_query->the_post();
							get_template_part( 'templates/classiera-loops/loop-canary');
						endwhile;
						wp_reset_postdata(); ?>
					</div><!--row-->
				</div><!--container-->
			</div><!--tabpanel-->
			<div role="tabpanel" class="tab-pane fade" id="random">
				<div class="container">
					<div class="row masonry-content">
						<?php 
							global $paged, $wp_query, $wp;
							$args = wp_parse_args($wp->matched_query);
							if ( !empty ( $args['paged'] ) && 0 == $paged ) {
								$wp_query->set('paged', $args['paged']);
								$paged = $args['paged'];
							}
							$argas = array(
								'orderby' => 'title',
								'post_type' => 'post',
								'posts_per_page' => $ads_counter,
								'paged' => $paged
							);
							$wdp_query = new WP_Query($argas);
						while ($wdp_query->have_posts()) : $wdp_query->the_post();	
							get_template_part( 'templates/classiera-loops/loop-canary');
						endwhile;
						wp_reset_postdata(); ?>
					</div><!--row-->
				</div><!--container-->
			</div><!--tabpanel Random-->
			<div role="tabpanel" class="tab-pane fade" id="popular">
				<div class="container">
					<div class="row masonry-content">
						<?php 
						global $paged, $wp_query, $wp;
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ) {
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						global $cat_id;
						$popularpost = new WP_Query( array( 'posts_per_page' => $ads_counter, 'cat' => $cat_id, 'posts_type' => 'post', 'paged' => $paged, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
						while ( $popularpost->have_posts() ) : $popularpost->the_post();
							get_template_part( 'templates/classiera-loops/loop-canary');
						endwhile; 
						wp_reset_postdata(); ?>
					</div><!--row-->
				</div><!--container-->
			</div><!--tabpanel popular-->
			<?php $viewAllAds = $redux_demo['all-ads-page-link']; ?>
			<div class="view-all text-center">               
				<a href="<?php echo $viewAllAds; ?>" class="btn btn-primary radius btn-md btn-style-four">
					<?php esc_html_e('View All Ads', 'classiera'); ?>
				</a>
            </div>
		</div><!--tab-content-->
	</div><!--tab-divs-->
</section>