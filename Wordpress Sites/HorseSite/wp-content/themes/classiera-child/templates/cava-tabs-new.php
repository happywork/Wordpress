<?php 

	global $paged, $wp_query, $wp;
?>

<section class="container">
    <div class="row">
        <div class="col-md-9 tabs_sec">
            <ul class="tabs_slider">
              <!--featured listing-->
               <li data-title="FEATURED HORSES">
                    <div class="row fh_list nl_slider">
                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = 
                                array( 
                                'post_type' => 'post', 
                                'posts_per_page' => 12 , 
                                'paged' => $paged, 
                                'cat' => 491,
                                'orderby' => 'date',
                                'order' => 'ASC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>
                                
                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/classifieds/horses-ponies/horses-for-sale/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
               <!--New listing-->
                <li data-title="NEW LISTINGS">
                    <div class="row fh_list nl_slider">
                   
                        
                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = 
                                array( 
                                'post_type' => 'post', 
                                'posts_per_page' => 12 , 
                                'paged' => $paged, 
                                'cat' => 491,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>
                                
                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/classifieds/horses-ponies/horses-for-sale/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
                <!--Most viewed-->
                 <li data-title="RECENTLY VIEWED">
                    <div class="row fh_list nl_slider">
                   
                        
                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = 
                                array( 
                                'post_type' => 'post', 
                                'posts_per_page' => 6, 
                                'paged' => $paged, 
                                'cat' => 491,
                                'meta_key' => 'wpb_post_views_count',			
							    'orderby' => 'meta_value_num',	
                                'order' => 'DESC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>
                                
                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/classifieds/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
            </ul>
            <!--tabs_slider-->
        </div>
        <!--col-md-9-->
        <?php get_template_part( 'templates/cava-events' );?>
    </div>
    <!--row-->
</section>