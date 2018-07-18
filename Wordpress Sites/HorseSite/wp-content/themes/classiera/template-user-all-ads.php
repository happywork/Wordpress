<?php
/**
 * Template name: Single User All Ads
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Classiera
 * @since Classiera
 */

if ( !is_user_logged_in() ) { 

	global $redux_demo; 
	$login = $redux_demo['login'];
	wp_redirect( $login ); exit;

}


global $redux_demo; 
$edit = $redux_demo['edit'];
$pagepermalink = get_permalink($post->ID);
if(isset($_GET['delete_id'])){
	$deleteUrl = $_GET['delete_id'];
	wp_delete_post($deleteUrl);
}
global $current_user, $user_id;
wp_get_current_user();
$user_info = get_userdata($user_ID);
$user_id = $current_user->ID; // You can set $user_id to any users, but this gets the current users ID.

get_header(); 


?>
<?php 
global $redux_demo; 
$profile = $redux_demo['profile'];
$all_adds = $redux_demo['all-ads'];
$allFavourite = $redux_demo['all-favourite'];
$newPostAds = $redux_demo['new_post'];
$bumpProductID = $redux_demo['classiera_bump_ad_woo_id'];
$classiera_cart_url = $redux_demo['classiera_cart_url'];
$caticoncolor="";
$category_icon_code ="";
$category_icon="";
$category_icon_color="";
?>
<?php 
	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	$iconClass = 'icon-left';
	if(is_rtl()){
		$iconClass = 'icon-right';
	}
?>
<!-- user pages -->
<section class="user-pages section-gray-bg">
	<div class="container">
        <div class="row">
			<div class="col-lg-3 col-md-4">
				<?php get_template_part( 'templates/profile/userabout' );?>
			</div><!--col-lg-3-->
			<div class="col-lg-9 col-md-8 user-content-height">
				<div class="user-detail-section section-bg-white">
					<!-- my ads -->
					<div class="user-ads user-my-ads">
						<h4 class="user-detail-section-heading text-uppercase">
						<?php esc_html_e("User Ads", 'classiera') ?>
						</h4>
						<?php 
							global $paged, $wp_query, $wp;
							$args = wp_parse_args($wp->matched_query);
							if ( !empty ( $args['paged'] ) && 0 == $paged ) {
								$wp_query->set('paged', $args['paged']);
								$paged = $args['paged'];
							}
							$wp_query = null;
							$kulPost = array(
								'post_type'  => 'post',
								'author' => $user_id,
								'posts_per_page' => 12,
								'paged' => $paged,
								'post_status' => array( 'publish', 'pending', 'future', 'draft', 'private' ),
							);
							$wp_query = new WP_Query($kulPost);
							while ($wp_query->have_posts()) : $wp_query->the_post();
							$title = get_the_title($post->ID); 
							$classieraPstatus = get_post_status( $post->ID );
							$dateFormat = get_option( 'date_format' );
							$postDate = get_the_date($dateFormat, $post->ID);
							$postStatus = get_post_status($post->ID);
							$productID = get_post_meta($post->ID, 'pay_per_post_product_id', true);
							$days_to_expire = get_post_meta($post->ID, 'days_to_expire', true);
						?>
						<div class="media border-bottom">
							<div class="media-left">
								<?php 
								if ( has_post_thumbnail()){								
								$imgURL = get_the_post_thumbnail_url();
								?>
                                <img class="media-object" src="<?php echo $imgURL; ?>" alt="<?php echo $title; ?>">
								<?php } ?>
                            </div><!--media-left-->
							<div class="media-body">
								<h5 class="media-heading">
									<a href="<?php echo get_permalink($post->ID);?>"><?php echo $title; ?></a>
								</h5>
								<p>
                                    <span class="published">
                                        <i class="fa fa-check-circle"></i>
                                        <?php classieraPStatusTrns($classieraPstatus); ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-eye"></i>
                                        <?php echo classiera_get_post_views($post->ID); ?>
                                    </span>
                                    <span>
                                        <i class="fa fa-clock-o"></i>
                                        <?php echo $postDate; ?>
                                    </span>
									<span>
										<i class="removeMargin fa fa-hashtag"></i>
										<?php esc_html_e( 'ID', 'classiera' ); ?> :                                        
                                        <?php echo $post->ID; ?>
                                    </span>
                                </p>
							</div><!--media-body-->
							<div class="media-right">
								<!--PayPerPostbtn-->
								<?php if(!empty($productID) && $postStatus == 'pending'){?>
								<div class="classiera_main_cart">
									<a href="#" class="btn btn-success btn-sm sharp btn-style-one classiera_ppp_btn" data-quantity="1" data-product_id="<?php echo $productID; ?>" data-product_sku="">
										<?php esc_html_e( 'Pay to Publish', 'classiera' ); ?>
									</a>
									<form method="post" class="classiera_ppp_ajax">				
										<input type="hidden" class="product_id" name="product_id" value="<?php echo $productID; ?>">
										<input type="hidden" class="post_id" name="post_id" value="<?php echo $post->ID; ?>">
										<input type="hidden" class="post_title" name="post_title" value="<?php the_title(); ?>">
										<input type="hidden" class="days_to_expire" name="days_to_expire" value="<?php echo $days_to_expire; ?>">
									</form>
									<a class="btn btn-success btn-sm classiera_ppp_cart" href="<?php echo $classiera_cart_url;?>">
										<?php esc_html_e( 'View Cart', 'classiera' ); ?>
									</a>
								</div>
								<?php } ?>
								<!--PayPerPostbtn-->
								<!--BumpAds-->
								<?php if(!empty($bumpProductID)){?>
								<div class="classiera_bump_ad">
									<a href="#" class="btn btn-success btn-sm sharp btn-style-one classiera_bump_btn" data-quantity="1" data-product_id="<?php echo $bumpProductID; ?>" data-product_sku="">
											<?php esc_html_e( 'Bump Ad', 'classiera' ); ?>
									</a>
									<form class="classiera_bump_ad_form">
										<input type="hidden" class="product_id" name="product_id" value="<?php echo $bumpProductID; ?>">
										<input type="hidden" class="post_id" name="post_id" value="<?php echo $post->ID; ?>">
										<input type="hidden" class="post_title" name="post_title" value="<?php the_title(); ?>">
									</form>
									<a class="btn btn-success btn-sm sharp btn-style-one classiera_bump_cart" href="<?php echo $classiera_cart_url;?>">
										<?php esc_html_e( 'View Cart', 'classiera' ); ?>
									</a>
								</div>
								<?php } ?>
								<!--BumpAds-->
								<?php 
									global $redux_demo;
									$edit_post_page_id = $redux_demo['edit_post'];
									$postID = $post->ID;
									global $wp_rewrite;
									if ($wp_rewrite->permalink_structure == ''){
										//we are using ?page_id
										$edit_post = $edit_post_page_id."&post=".$post->ID;
										$del_post = $pagepermalink."&delete_id=".$post->ID;
									}else{
										//we are using permalinks
										$edit_post = $edit_post_page_id."?post=".$post->ID;
										$del_post = $pagepermalink."?delete_id=".$post->ID;
									}
								if(get_post_status( $post->ID ) !== 'private'){ 	
								?>
								<a href="<?php echo $edit_post; ?>" class="btn btn-primary sharp btn-style-one btn-sm"><i class="<?php echo $iconClass; ?> fa fa-pencil-square-o"></i><?php esc_html_e("Edit", 'classiera') ?></a>
								<?php } ?>
								<a class="thickbox btn btn-primary sharp btn-style-one btn-sm" href="#TB_inline?height=150&amp;width=400&amp;inlineId=examplePopup<?php echo $post->ID; ?>"><i class="<?php echo $iconClass; ?> fa fa-trash-o"></i><?php esc_html_e("Delete", 'classiera') ?></a>
								<div class="delete-popup" id="examplePopup<?php echo $post->ID; ?>" style="display:none">
									<h4><?php esc_html_e("Are you sure you want to delete this?", 'classiera') ?></h4>
									<a class="btn btn-primary sharp btn-style-one btn-sm" href="<?php echo $del_post; ?>">
									<span class="button-inner"><?php esc_html_e("Confirm", 'classiera') ?></span>
									</a>
								</div>
							</div><!--media-right-->
						</div><!--media border-bottom-->
						<?php  endwhile; ?>
						<?php									
						  if(function_exists('classiera_pagination')){
							classiera_pagination();
						  }
						?>
						<?php wp_reset_query(); ?>	
					</div><!--user-ads user-my-ads-->
					<!-- my ads -->
				</div><!--user-detail-section-->
			</div><!--col-lg-9-->
		</div><!--row-->
	</div><!-- container-->
</section>
<!-- user pages -->
<?php get_footer(); ?>