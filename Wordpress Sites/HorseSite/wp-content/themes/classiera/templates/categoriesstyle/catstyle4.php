<?php 
	global $redux_demo;
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";	
	$classieraCatSECTitle = $redux_demo['cat-sec-title'];
	$classieraCatSECDESC = $redux_demo['cat-sec-desc'];
	$allCatURL = $redux_demo['all-cat-page-link'];	
	$cat_counter = $redux_demo['classiera_no_of_cats_all_page'];
	$primaryColor = $redux_demo['color-primary'];
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classieraPostCount = $redux_demo['classiera_cat_post_counter'];
?>
<section class="classiera-category-ads-v4 border-bottom section-pad">
	<div class="section-heading-v1 section-heading-with-icon">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 center-block">
                    <h3 class="text-capitalize"><?php echo $classieraCatSECTitle; ?><i class="fa fa-star"></i></h3>
                    <p><?php echo $classieraCatSECDESC; ?></p>
                </div><!--col-lg-7-->
            </div><!--row-->
        </div><!--container-->
    </div><!--section-heading-v1-->
	<div class="container">
		<div class="row">
			<?php 
			$categories = get_terms('category', array(
					'hide_empty' => 0,
					'parent' => 0,
					'number' => $cat_counter,
					'order'=> 'ASC'
				)	
			);
			$current = -1;
			foreach ($categories as $category) {
				$tag = $category->term_id;
				$classieraCatFields = get_option(MY_CATEGORY_FIELDS);
				//print_r($classieraCatFields);
				if (isset($classieraCatFields[$tag])){
					$classieraCatIconCode = $classieraCatFields[$tag]['category_icon_code'];
					$classieraCatIcoIMG = $classieraCatFields[$tag]['your_image_url'];
					$classieraCatIconClr = $classieraCatFields[$tag]['category_icon_color'];
					$categoryIMG = $classieraCatFields[$tag]['category_image'];
				}
				$cat = $category->count;
				$catName = $category->term_id;
				$mainID = $catName;
				if(empty($classieraCatIconClr)){
					$iconColor = $primaryColor;
				}else{
					$iconColor = $classieraCatIconClr;
				}
				if(empty($categoryIMG)){
					$classieracatIMG = get_template_directory_uri().'/images/category.png';
				}else{
					$classieracatIMG = $categoryIMG;
				}	
				$current++;
				$allPosts = 0;
				$categoryLink = get_category_link( $category->term_id );
				$categories = get_categories('child_of='.$catName);
				foreach ($categories as $category) {
					$allPosts += $category->category_count;
				}
				$classieraTotalPosts = $allPosts + $cat;
				$category_icon = stripslashes($classieraCatIconCode);
				?>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="category-box">
					<img class="img-rounded" src="<?php echo $classieracatIMG; ?>" alt="<?php echo get_cat_name( $catName ); ?>">
					<div class="category-box-over">
						<div class="category-box-content text-center">
							<span style="background:<?php echo $iconColor; ?>;">								
								<?php if($classieraIconsStyle == 'icon'){ ?>
									<i class="<?php echo $category_icon; ?>"></i>
								<?php }elseif($classieraIconsStyle == 'img'){?>
									<img src="<?php echo $classieraCatIcoIMG; ?>" alt="<?php echo get_cat_name( $catName ); ?>">
								<?php } ?>	
							</span>
							<h3><a href="<?php echo $categoryLink; ?>"><?php echo get_cat_name( $catName ); ?></a></h3>
							<p>
							<?php if($classieraPostCount == 1){?>
							<?php echo $classieraTotalPosts; ?> <?php esc_html_e( 'ads posted in this category', 'classiera' ); ?>
							<?php }else{ ?>
							&nbsp;
							<?php } ?>
							</p>
						</div>
					</div>		
				</div><!--category-box-->
			</div><!--col-lg-4-->
			<?php } ?>			
		</div>
	</div>
</section>