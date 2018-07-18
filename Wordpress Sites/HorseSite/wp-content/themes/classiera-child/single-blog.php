<?php
/**
 * The template for displaying the single blog posts.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Classiera
 * @since Classiera 1.0
 */

get_header();

 ?>
<?php 
	$page = get_page($post->ID);
	$current_page_id = $page->ID;
	global $post;	
?>
<section class="inner-page-content">
	<div class="container">
		<!-- breadcrumb -->
		<?php classiera_breadcrumbs();?>
		<!-- breadcrumb -->
		<div class="row top-pad-50">
			<div class="col-md-8 col-lg-9 col-md-push-4 col-lg-push-3">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="cava-blog article-content">
					<div class="cava_blog_header">
						<p class="text-center text-uppercase cava_blog_cat">
							<?php 
							$blog_category = get_the_terms( $post->ID, 'blog_category' );
							$catcount = 1;
							if(!empty($blog_category)){
								foreach($blog_category as $category){
									if($catcount > 1){
										?>
										,&nbsp;
										<?php
									}
									?>
									<a href="<?php echo get_category_link( $category->term_id )?>">
										<?php echo $category->name; ?>
									</a>
									<?php
									$catcount++;
                                    $mycat = $category->name;
								}
							}
                            
							?>
						</p>
						<h3 class="cava_blog_heading text-uppercase">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p class="cava_blog_date text-center text-uppercase">
                           <?php $dateFormat = get_option( 'date_format' );?>
						   <?php echo get_the_date($dateFormat, $post->ID); ?>
                        </p>
					</div><!--cava_blog_header-->
					<?php if ( has_post_thumbnail() ){?>
					<?php 
					$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
					?>
					
					<?php if ($mycat != "Lookbooks"):?>
					<img class="cava_blog_img img-responsive" src="<?php echo $imageurl[0]; ?>" alt="<?php the_title(); ?>">
					
					<?php endif;?>
					
					<?php } ?>	
									
					<p class="cava_blog_description">
						<?php the_content(); ?>
					</p>
					<div class="cava_blog_footer">
						<p>
							<?php 
							$commentarags = array(
								'post_id' => get_the_ID(),
								'type' => 'blog'
							);
							$commentCount = count(get_comments($commentarags));
							?>
                            <a href="#"><?php echo $commentCount; ?>&nbsp;<?php esc_html_e( 'Comments', 'classiera' ); ?></a>
                        </p>
						<?php 
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						if(is_plugin_active( "accesspress-social-share/accesspress-social-share.php")){
							echo do_shortcode('[apss-share]');
						}
						?>
						<p>
                            <a href="#" class="text-uppercase">
                                <?php esc_html_e( 'By', 'classiera' ); ?> <?php the_author(); ?>
                            </a>
                        </p>
					</div><!--cava_blog_footer-->
					<div class="cava_post_author">
						<?php 
						$postAuthorID = $post->post_author;
						$user_info = get_userdata($postAuthorID);
						$authorName = get_the_author_meta('display_name', $postAuthorID );
						if(empty($authorName)){
							$authorName = get_the_author_meta('user_nicename', $postAuthorID );
						}
						if(empty($authorName)){
							$authorName = get_the_author_meta('user_login', $postAuthorID );
						}
						$author_avatar_url = get_user_meta($postAuthorID, "classify_author_avatar_url", true);
						$author_avatar_url = classiera_get_profile_img($author_avatar_url);
						if(empty($author_avatar_url)){										
							$author_avatar_url = classiera_get_avatar_url ($authorEmail, $size = '150' );
						}
						$userFacebook = $user_info->facebook;
						$usertwitter = $user_info->twitter;
						$usergoogleplus = $user_info->googleplus;
						$userpinterest = $user_info->pinterest; 
						$userlinkedin = $user_info->linkedin;
						$userEmail = $user_info->user_email; 
						$userInsta = $user_info->instagram;
						?>
						<img class="cava_post_author_img" src="<?php echo $author_avatar_url; ?>" alt="<?php echo $authorName; ?>">
						<div class="cava_post_author_content">
							<h4>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="post by solopine">
									<?php echo $authorName; ?>
								</a>
							</h4>
							<p>
							<?php $author_desc = get_the_author_meta('description', $user_ID); echo $author_desc; ?>
							</p>
							<?php if(!empty($userFacebook)){?>
							<a href="<?php echo $userFacebook; ?>" target="_blank" class="cava_post_author_social">
                                <i class="fa fa-facebook"></i>
                            </a>
							<?php } ?>
							<?php if(!empty($usertwitter)){?>
                            <a href="<?php echo $usertwitter; ?>" target="_blank" class="cava_post_author_social">
                                <i class="fa fa-twitter"></i>
                            </a>
							<?php } ?>
							<?php if(!empty($userpinterest)){?>
                            <a href="<?php echo $userpinterest; ?>" target="_blank" class="cava_post_author_social">
                                <i class="fa fa-pinterest"></i>
                            </a>
							<?php } ?>
							<?php if(!empty($usergoogleplus)){?>
                            <a href="<?php echo $usergoogleplus; ?>" target="_blank" class="cava_post_author_social">
                                <i class="fa fa-google-plus"></i>
                            </a>
							<?php } ?>
						</div>
					</div><!--cava_post_author-->					
				</article>
				<?php endwhile; endif; ?>
				<section class="border-section border comments">
					<?php 
					$file ='';
					$separate_comments ='';
					comments_template( $file, $separate_comments ); 
					?>
				</section>
			</div><!--col-md-8-->

			<button class="btn btn-topics hidden visible-xs" type="button" data-toggle="collapse" data-target="#collapse-topics" aria-expanded="false" aria-controls="collapseExample">Topics and ADS</button>

			<div class="col-md-4 col-lg-3 col-md-pull-8 col-lg-pull-9">
				<aside class="sidebar collapse dont-collapse-sm" id="collapse-topics"" >
					<div class="row">
						<?php dynamic_sidebar('blog'); ?>
						<!--Social Widget-->
						<?php 
						include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						if(is_plugin_active( "accesspress-social-share/accesspress-social-share.php")){
						?>
						<div class="col-lg-12 col-md-12 col-sm-6 match-height">
							<div class="widget-box">
								<div class="widget-title">
									<h4><?php esc_html_e( 'Share', 'classiera' ); ?>:</h4>
								</div>								
								<div class="widget-content widget-content-post">
                                    <div class="share border-bottom widget-content-post-area">
                                        <!--AccessPress Socil Login-->
										<?php echo do_shortcode('[apss-share]'); ?>
										<!--AccessPress Socil Login-->
                                    </div>
                                </div>								
							</div><!--widget-box-->
						</div><!--col-lg-12 col-md-12 col-sm-6 match-height-->
						<?php } ?>
						<!--Social Widget-->
					</div>
				</aside>
			</div>
		</div><!--row-->
	</div><!--container-->
</section><!--inner-page-content-->
<script>
   jQuery(document).ready(function() {
   
       if (jQuery(window).width() < 651) {
           jQuery(".match-height").hide();
           jQuery(".match-height:nth-child(2)").show();
           jQuery(".match-height:nth-child(3)").show();
       }
       
       $(window).on('resize', function(){
           var win = $(this);
           
           if (win.height() > 650) {
                jQuery(".match-height").show();
           }
           if (win.width() <= 650) {
               jQuery(".match-height").hide();
               jQuery(".match-height:nth-child(2)").show();
               jQuery(".match-height:nth-child(3)").show();
           }
       });
});
</script>
<?php get_footer(); ?>

