<?php 
	global $redux_demo;
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";	
	$classieraCatSECTitle = $redux_demo['cat-sec-title'];
	$classieraCatSECDESC = $redux_demo['cat-sec-desc'];
	$allCatURL = $redux_demo['all-cat-page-link'];
	$cat_counter = $redux_demo['home-cat-counter'];
	$primaryColor = $redux_demo['color-primary'];
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classieraPostCount = $redux_demo['classiera_cat_post_counter'];
	$cavacatsinclude = $redux_demo['cava_home_cats'];
?>
<section class="catg_sec">
	<div class="container">
		<h2><?php echo $classieraCatSECTitle; ?></h2>
		<ul>
			<?php 
			$categories = get_terms('category', array(
					'hide_empty' => 0,
					'parent' => 0,
					'number' => 5,
					'order'=> 'ASC',
					'include'=> $cavacatsinclude
				)	
			);
			foreach ($categories as $category) {
				$tag = $category->term_id;
				$classieraCatFields = get_option(MY_CATEGORY_FIELDS);
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
				$allPosts = 0;
				$categoryLink = get_category_link( $category->term_id );
				$categories = get_categories('child_of='.$catName);
				foreach ($categories as $category) {
					$allPosts += $category->category_count;
				}
				$classieraTotalPosts = $allPosts + $cat;
				$category_icon = stripslashes($classieraCatIconCode);			
			?>
			<li>
				<a href="<?php echo $categoryLink; ?>">
					<figure>
						<img src="<?php echo $classieracatIMG; ?>" alt="<?php echo get_cat_name( $catName ); ?>">
					</figure>
					<div>
						<h4><?php echo get_cat_name( $catName ); ?></h4>
						<p><strong class="hoverable"><span class="h_effect"></span><?php echo $classieraTotalPosts;?> <?php esc_html_e( 'Ads posted', 'classiera' ); ?></strong></p>
					</div>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div><!--container-->
</section>