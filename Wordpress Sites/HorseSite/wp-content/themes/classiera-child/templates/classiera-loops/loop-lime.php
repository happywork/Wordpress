<?php 
	global $redux_demo;
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
	$classieraAdsView = $redux_demo['home-ads-view'];
	$classieraItemClass = "item-grid";
	if($classieraAdsView == 'list'){
		$classieraItemClass = "item-list";
	}
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";
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
	//$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
	
	$post_location = get_post_meta($post->ID, 'post_location', true);
//	$post_state = get_post_meta($post->ID, 'post_state', true);
//	$post_city = get_post_meta($post->ID, 'post_city', true);	
//	$featured_post = get_post_meta($post->ID, 'featured_post', true);
//	$classieraPostAuthor = $post->post_author;
//	$classieraAuthorEmail = get_the_author_meta('user_email', $classieraPostAuthor);
    
  
    $postVideo = get_post_meta($post->ID, 'post_video', true);
    $dateFormat = get_option( 'date_format' );
    $postDate = get_the_date($dateFormat, $post->ID);
//    $itemCondition = get_post_meta($post->ID, 'item-condition', true); 
//    
//    $post_phone = get_post_meta($post->ID, 'post_phone', true);
//    $post_latitude = get_post_meta($post->ID, 'post_latitude', true);
//    $post_longitude = get_post_meta($post->ID, 'post_longitude', true);
//    $post_address = get_post_meta($post->ID, 'post_address', true);
//    $classieraCustomFields = get_post_meta($post->ID, 'custom_field', true);					
//    $post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
//    $classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
//    $hp_discipline = get_post_meta($post->ID, 'hp_discipline', true);
//    $saddle_type = get_post_meta($post->ID, 'saddle_type', true);
//    $saddle_size = get_post_meta($post->ID, 'saddle_size', true);

    $myDateTime = DateTime::createFromFormat($dateFormat, $postDate);
    $postD = $myDateTime->format('d/m/Y');

    $post_height = get_post_meta($post->ID, 'post_height', true);
    $post_gender = get_post_meta($post->ID, 'post_gender', true);
    $post_age = get_post_meta($post->ID, 'post_age', true);
    //$post_breed = get_post_meta($post->ID, 'post_breed', true);
    
$attachments = get_children(array('post_parent' => $post->ID,
	'post_status' => 'inherit',
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'order' => 'ASC',
	'orderby' => 'menu_order ID'
	)
);
$totalImages = count($attachments);
if($totalImages == 0 || empty($totalImages) && has_post_thumbnail()){
	$totalImages = 1;
}



?>
<div class="col-lg-4 col-md-4 col-sm-6 match-height item <?php echo $classieraItemClass; ?>">
	<div class="classiera-box-div classiera-box-div-v1">
		<figure class="clearfix">
			
			<figcaption>
			<div class="premium-img">
			<?php 
			$classieraFeaturedPost = get_post_meta($post->ID, 'featured_post', true);
			if($classieraFeaturedPost == 1){
				?>
				<div class="featured-tag">
					<span class="left-corner"></span>
					<span class="right-corner"></span>
					<div class="featured">
						<p><?php esc_html_e( 'Featured', 'classiera' ); ?></p>
					</div>
				</div>
				<?php
			}
			if( has_post_thumbnail()){
				$imageurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'classiera-370');
				$thumb_id = get_post_thumbnail_id($post->ID);
				?>
				<img class="img-responsive" src="<?php echo $imageurl[0]; ?>" alt="<?php echo $theTitle; ?>">
				<?php
			}else{
				?>
				<img class="img-responsive" src="<?php echo get_template_directory_uri() . '/images/nothumb.png' ?>" alt="No Thumb"/>
				<?php
			}
			?>
				<span class="hover-posts">
					<a href="<?php the_permalink(); ?>" class="btn btn-primary outline btn-sm active"><?php esc_html_e( 'view ad', 'classiera' ); ?></a>
				</span>
				<?php if(!empty($classiera_ads_type)){?>
				<span class="classiera-buy-sel">
					<?php classiera_buy_sell($classiera_ads_type); ?>
				</span>
				<?php } ?>
			</div>
			<?php if(!empty($post_price)){?>
			<span class="classiera-price-tag" style="background-color:<?php echo $category_icon_color; ?>; color:<?php echo $category_icon_color; ?>;">
				<span class="price-text">
					<?php 
					if(is_numeric($post_price)){
						echo classiera_post_price_display($post_currency_tag, $post_price);
                       
					}else{ 
						echo $post_price;
					}
					?>
				</span>
			</span>
			<?php } ?>
			
				<h4><a href="<?php the_permalink(); ?>"><?php echo $theTitle; ?></a></h4>
				
				<span class="category-icon-box" style=" background:<?php echo $category_icon_color; ?>; color:<?php echo $category_icon_color; ?>; ">
					<?php 
					if($classieraIconsStyle == 'icon'){
						?>
						<i class="<?php echo $category_icon_code;?>"></i>
						<?php
					}elseif($classieraIconsStyle == 'img'){
						?>
						<img src="<?php echo $classieraCatIcoIMG; ?>" alt="<?php echo $postCatgory[0]->name; ?>">
						<?php
					}
					?>
				</span>
				<div class="category-description">
                <ul>
                    <li>
                        Discipline: 
                        
                        <span>
                            <?php
                            
                           $discipline1 =  get_field( "discipline1", $post->ID );
                           $discipline2 =  get_field( "discipline2", $post->ID );
                           $discipline3 =  get_field( "disciplines3", $post->ID );
                            
                           $discipline = $discipline1;
                            
                           if(!empty($discipline2)){
                
                                $discipline .= ", " . $discipline2;
                            }
                            
                            if(!empty($discipline3)){
                
                                $discipline .= ", " . $discipline3;
                            }
                            
                            echo $discipline;

                            ?>
                        </span>
                    </li>
                    <li>
                        Breed: 
                        <span><?php echo the_field( "breed", $post->ID );?> - </span>
                        <span class="bold">Height: </span>
                        <span><?php echo the_field( "mature_height", $post->ID )."<span class=low> hh</span>";?> - </span>
                        <span class="bold">Age: </span>
                        <span> <?php echo the_field( "age", $post->ID );?> - </span>
                        <span class="bold">Gender: </span>
                        <span> <?php the_field( "gender", $post->ID );?></span>
                    </li>
                    <li>
                        Horse town: 
                        <span><?php echo the_field( "horse_town", $post->ID );?></span>
                    </li>
                    <li>
                        Date Posted: 
                        <span><?php echo $postD;?></span>
                    </li>
                </ul>
				</div>
				<div class="post-tags">
                
                    
                    <?php if(!empty($totalImages)){ ?>
                    <div class="archive-image-ico camera">
                        <div><?php echo $totalImages; ?></div>
                    </div>
                    <?php } ?>
                    
                    <?php if(!empty($postVideo)){ ?>
                    <div class="archive-image-ico video"></div>
                    <?php } ?>
				    
				    <div class="archive-view-ad">
				        <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'view', 'classiera' ); ?></a>
                    </div>
                    
                    <div class="archive-image-ico heart">
                       
                       <?php 
                        if ( is_user_logged_in()){ 
                            $current_user = wp_get_current_user();
                            $currentuserID = $current_user->ID;
                            echo classierachild_authors_favorite_check($currentuserID,$post->ID); 
                        }else{
                            ?>
                            <a href="<?php echo $login; ?>" class="classiera_search_adv__inner__footer_like">
                                <i class="fa fa-heart-o"></i>
                            </a>
                            <?php
                        }
                        ?>
                        
                    </div>
                    
                    
				    
				</div>
			</figcaption>
		</figure>
	</div>
</div>
<script>
    jQuery(document).ready(function() {
        //alert("loop-lime");
    });
</script>
