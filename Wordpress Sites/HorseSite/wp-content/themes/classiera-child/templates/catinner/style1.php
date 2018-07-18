<?php
global $redux_demo;
global $post;
	$category = get_the_category();
	$catID = $category[0]->cat_ID;
	if ($category[0]->category_parent == 0) {
		$tag = $category[0]->cat_ID;
		$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
		if (isset($tag_extra_fields[$tag])) {
			$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
			$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
			$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
		}
	}elseif(isset($category[1]->category_parent) && $category[1]->category_parent == 0){
		$tag = $category[0]->category_parent;
		$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
		if (isset($tag_extra_fields[$tag])) {
			$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
			$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
			$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
		}
	}else{
		$tag = $category[0]->category_parent;
		$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
		if (isset($tag_extra_fields[$tag])) {
			$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
			$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
			$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
		}
	}
	if(!empty($category_icon_code)) {
		$category_icon = stripslashes($category_icon_code);
	}							
	$post_price = get_post_meta($post->ID, 'post_price', true);
	$theTitle = get_the_title();
	$postCatgory = get_the_category( $post->ID );							
	$categoryLink = get_category_link($catID);
	$classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
	$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
	
	$post_location = get_post_meta($post->ID, 'post_location', true);
	$post_state = get_post_meta($post->ID, 'post_state', true);
	$post_city = get_post_meta($post->ID, 'post_city', true);	
	$featured_post = get_post_meta($post->ID, 'featured_post', true);
	$classieraPostAuthor = $post->post_author;
	$classieraAuthorEmail = get_the_author_meta('user_email', $classieraPostAuthor);
$classieraFeaturedAdsCounter = $redux_demo['classiera_featured_ads_count'];
$classiera_pagination = $redux_demo['classiera_pagination'];
$classieraAdsView = $redux_demo['home-ads-view'];


//if ($tag == "99"){
//    
//$metas = array( 
//    'height'            => "",
//    'first_name'        => $firstname, 
//    'last_name'         => $lastname ,
//    'city'              => $city ,
//    'address'           => $address,
//    'state'             => $state,
//    'postcode'          => $postcode,
//    'phone'             => $phone,
//    'mobile'            => $mobile,
//    'business_name'     => $business_name,
//    'wp_capabilities'   => $capabilities,
//    'wp_user_level'     => $level
//);
//
//    
//}
    $aarray = array();
    $orarray1 = array();
    $orarray2 = array();
    $orarray3 = array();
    $keyword = $_POST['search'];

    if(!empty($_POST['min_height'])){
		$min_height = $_POST['min_height'];   
    }

    if(!empty($_POST['max_height'])){
		$max_height = $_POST['max_height'];
    }
	
    
    if(!empty($min_height) && !empty($max_height)){
        
        $newdata =  array('key' => 'mature_height', 'value' => array($min_height,$max_height), 'type' => 'numeric', 'compare' => 'BETWEEN');
        array_push($aarray,$newdata);	
    
    }else if(!empty($min_height) && !empty($max_height)){
         
        $newdata =  array('key' => 'mature_height', 'value' => $min_height, 'compare' => '>=');
        array_push($aarray,$newdata);
        
    }else if(!empty($min_height) && !empty($max_height)){
         
        $newdata =  array('key' => 'mature_height', 'value' => $max_height, 'compare' => '<=');
        array_push($aarray,$newdata);
    }
    
    
    if(!empty($_POST['min_age'])){
		$min_age = $_POST['min_age'];
    }

    if(!empty($_POST['max_age'])){
		$max_age = $_POST['max_age'];
    }

    if(!empty($min_age) && !empty($max_age)){
        
        $newdata =  array('key' => 'age', 'value' => array($min_age,$max_age), 'type' => 'numeric', 'compare' => 'BETWEEN');
        array_push($aarray,$newdata);	
    
    }else if(!empty($min_age) && !empty($max_age)){
         
        $newdata =  array('key' => 'age', 'value' => $min_age, 'compare' => '>=');
        array_push($aarray,$newdata);
        
    }else if(!empty($min_age) && !empty($max_age)){
         
        $newdata =  array('key' => 'age', 'value' => $max_age, 'compare' => '<=');
        array_push($aarray,$newdata);
    }

    
    

    if(!empty($_POST['min_price'])){
		$min_price = $_POST['min_price'];
    }

    if(!empty($_POST['max_price'])){
		$max_price = $_POST['max_price'];
    }


    if(!empty($min_price) && !empty($max_price)){
        
        $newdata =  array('key' => 'post_price', 'value' => array($min_price,$max_price), 'type' => 'numeric', 'compare' => 'BETWEEN');
        array_push($aarray,$newdata);	
    
    }else if(!empty($min_price) && !empty($max_price)){
         
        $newdata =  array('key' => 'post_price', 'value' => $min_price, 'compare' => '>=');
        array_push($aarray,$newdata);
        
    }else if(!empty($min_price) && !empty($max_price)){
         
        $newdata =  array('key' => 'post_price', 'value' => $max_price, 'compare' => '<=');
        array_push($aarray,$newdata);
    }
        

	if(!empty($_POST['gender'])){
		$gender = $_POST['gender'];
        
        if (!empty($gender)){
            $newdata =  array('key' => 'gender', 'value' => $gender, 'compare' => 'IN');
           array_push($aarray,$newdata);	
        }	
           
	}

	if(!empty($_POST['breed'])){
		 $breed = $_POST['breed'];
         
        if (!empty($breed)){
            
            $newdata =  array('key' => 'breed', 'value' => $breed, 'compare' => 'IN');
            array_push($aarray,$newdata);	
        }
	}

    if(!empty($_POST['disciplines'])){
            $disciplines = $_POST['disciplines'];
        
        if (!empty($disciplines)){
            $newdata1 = array('key' => 'discipline1', 'value' => $disciplines, 'compare' => 'IN');
            array_push($orarray1,$newdata1);
            
            $newdata2 = array('key' => 'discipline2', 'value' => $disciplines, 'compare' => 'IN');
            array_push($orarray2,$newdata2); 
            
            $newdata3 = array('key' => 'disciplines3', 'value' => $disciplines, 'compare' => 'IN');
            array_push($orarray3,$newdata3);
            
        }	
        
    }

    if(!empty($_POST['horse_town'])){
            $horse_town = $_POST['horse_town'];

         if (!empty($horse_town)){
            $newdata = array('key' => 'horse_town', 'value' => $horse_town,'compare' => 'IN');
           array_push($aarray,$newdata);	
        }	
    }


?>

<section class="classiera-advertisement advertisement-v1">

	<div class="tab-divs section-light-bg">
		<div class="view-head">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-6 col-xs-6">
						<div class="total-post">
							<p>
							<?php esc_html_e( 'Category', 'classiera' ); ?> : 
                            <span><?php echo $postCatgory[0]->name; ?></span>
				            
							 
<!--							   <span>-->
							   <?php// echo classiera_Cat_Ads_Count(); ?>&nbsp;<?php //esc_html_e( 'ads', 'classiera' ); ?>
							   <!--</span>-->
							   </p>
						</div><!--total-post-->
					</div><!--col-lg-6-->
					<div class="col-lg-6 col-sm-6 col-xs-6">
						
					</div>
				</div><!--row-->
			</div><!--container-->
		</div><!--view-head-->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="all">
				<div class="container">
					<div class="row">
						<!--FeaturedPosts-->
						
						<?php
                            if($keyword == "Search" && $tag == 99){
                                global $paged, $wp_query, $wp;
                                $args = wp_parse_args($wp->matched_query);
                                if ( !empty ( $args['paged'] ) && 0 == $paged ) {
                                    $wp_query->set('paged', $args['paged']);
                                    $paged = $args['paged'];
                                }							
                                $cat_id = get_queried_object_id();
                                $temp = $wp_query;
                                $featuredPosts = array();
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $classieraFeaturedAdsCounter,
                                    'paged' => $paged,								
                                    'cat' => $cat_id,
                                    'meta_query' => array(
                                        'relation' => 'AND',
                                        $aarray,
                                        array(
                                            'relation' => 'OR',
                                            $orarray1,
                                            $orarray2,
                                            $orarray3
                                        ),
                                    ),
                                                 
                                );
                                
                                
                                            
                                $wp_query= null;
                                $wp_query = new WP_Query($args);
                                if ( $wp_query->have_posts() ){
                                    while ($wp_query->have_posts()) : $wp_query->the_post();
                                    $featuredPosts[] = $post->ID;
                                    get_template_part( 'templates/classiera-loops/loop-lime');
                                    endwhile;
                                
                                }else{
                                     echo '<div class=emptySearch>no ads found</div>';
                                }
                                
                                wp_reset_postdata();
                                wp_reset_query();

                            }else{
                                //featured posts
                                global $paged, $wp_query, $wp;
                                $args = wp_parse_args($wp->matched_query);
                                if ( !empty ( $args['paged'] ) && 0 == $paged ) {
                                    $wp_query->set('paged', $args['paged']);
                                    $paged = $args['paged'];
                                }							
                                $cat_id = get_queried_object_id();
                                $temp = $wp_query;
                                $featuredPosts = array();
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $classieraFeaturedAdsCounter,
                                    'paged' => $paged,								
                                    'cat' => $cat_id,
                                    'meta_query' => array(
                                    array(
                                        'key' => 'featured_post',
                                        'value' => '1',
                                        'compare' => '=='
                                        )
                                    ),
                                );
                                $wp_query= null;
                                $wp_query = new WP_Query($args);
                                while ($wp_query->have_posts()) : $wp_query->the_post();
                                    $featuredPosts[] = $post->ID;
                                    get_template_part( 'templates/classiera-loops/loop-lime');
                                endwhile;
                                wp_reset_postdata();
                                wp_reset_query();
                           
                                //end of FeaturedPosts
                             
                                global $paged, $wp_query, $wp;
                                $args = wp_parse_args($wp->matched_query);
                                if ( !empty ( $args['paged'] ) && 0 == $paged ) {
                                    $wp_query->set('paged', $args['paged']);
                                    $paged = $args['paged'];
                                }							
                                $cat_id = get_queried_object_id();
                                $temp = $wp_query;
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 10,
                                    'paged' => $paged,
                                    'post__not_in' => $featuredPosts,
                                    'cat' => $cat_id,
                                );
                                $wp_query= null;
                                $wp_query = new WP_Query($args);
                                while ($wp_query->have_posts()) : $wp_query->the_post();
                                    get_template_part( 'templates/classiera-loops/loop-lime');
                                endwhile; 
                                wp_reset_postdata();
                                wp_reset_query();
                            }
					       $count = $wp_query->post_count;
						  ?>
					</div><!--row-->
						<?php
                            
							if($classiera_pagination == 'pagination' && $count >= 10){
								classiera_pagination();
							}
						?>
				</div><!--container-->
				<?php
					if($classiera_pagination == 'infinite'){
						echo infinite($wp_query);
					}
				?>
				<?php wp_reset_query(); ?>
			</div><!--tabpanel-->
			<div role="tabpanel" class="tab-pane fade" id="random">
				<div class="container">
					<div class="row">
						<?php 
						global $paged, $wp_query, $wp;
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ) {
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						$cat_id = get_queried_object_id();
						$popularpost = new WP_Query( array( 'posts_per_page' => '12', 'cat' => $cat_id, 'posts_type' => 'post', 'paged' => $paged, 'post_status' => 'publish', 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
						while ( $popularpost->have_posts() ) : $popularpost->the_post();
							get_template_part( 'templates/classiera-loops/loop-lime');
						endwhile;
						wp_reset_postdata();
						wp_reset_query(); 
					?>
					</div><!--row-->
				</div><!--container-->
			</div><!--tabpanel random-->
			<div role="tabpanel" class="tab-pane fade" id="popular">
				<div class="container">
					<div class="row">
						<?php 
						global $paged, $wp_query, $wp;
						$args = wp_parse_args($wp->matched_query);
						if ( !empty ( $args['paged'] ) && 0 == $paged ) {
							$wp_query->set('paged', $args['paged']);
							$paged = $args['paged'];
						}
						$cat_id = get_queried_object_id();
						$temp = $wp_query;
						$wp_query= null;
						$wp_query = new WP_Query();
						$wp_query->query('orderby=title&post_type=post&posts_per_page=12&paged='.$paged.'&cat='.$cat_id);
						while ($wp_query->have_posts()) : $wp_query->the_post();
							get_template_part( 'templates/classiera-loops/loop-lime');
						endwhile;
						wp_reset_query();
						wp_reset_postdata();
						?>
					</div><!--row-->
				</div><!--container-->
			</div><!--tabpanel popular-->
		</div><!--tab-content-->
	</div><!--tab-divs-->
</section>


<script>
    jQuery(document).ready(function() {
        //alert("style1");
    });
</script>
