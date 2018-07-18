<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Classiera
 * @since Classiera 1.0
 */

get_header(); ?>
<?php 
// Retrieve the URL variables (using PHP).
	$category_name = $_GET['category_name'];	
	global $redux_demo;
	$catSearchID = "";
	
	$search_state = "";
	$search_country = "";
	$search_city = "";
	$main_cat = "";
	$price_range = "";
	$searchQueryCountry = "";
	$searchQueryState = "";
	$classieraAdsTypeSearch = "";
	$searchCondition = "";
	$searchQueryCustomFields = "";
	$emptyPost = 0;
	$featuredPosts = array();
	$classieraSearchStyle = $redux_demo['classiera_search_style'];	
	$classieraGoogleMAP = $redux_demo['classiera_map_on_search'];
	$classieraMAPPostType = $redux_demo['classiera_map_post_type'];	
	$classieraMAPStyle = $redux_demo['map-style'];	
	$locShownBy = $redux_demo['location-shown-by'];		
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classieraCategoriesStyle = $redux_demo['classiera_cat_style'];	
	$classieraAdsView = $redux_demo['home-ads-view'];
	$classiera_pagination = $redux_demo['classiera_pagination'];
	$classieraTagDefault = $redux_demo['classiera_multi_currency_default'];
	$classieraMultiCurrency = $redux_demo['classiera_multi_currency'];
	$postCurrency = $redux_demo['classierapostcurrency'];
    
    //Horse & ponies search fields
    $minHeight = "";
    $maxHeight = "";
    $minAge = "";
    $maxAge = "";
    $minPrice = "";
	$maxPrice = "";
    $discipline = array();
    $breed = array();
    $sex = array();
    $estate = array();
    
    //echo $category_name."shabir";

	//echo $category_name."shabir";
	if($classieraMultiCurrency == 'multi'){
		$classieraPriceTagForSearch = classiera_Display_currency_sign($classieraTagDefault);
	}elseif(!empty($postCurrency) && $classieraMultiCurrency == 'single'){
		$classieraPriceTagForSearch = $postCurrency;
	}
	$classieraItemClass = "item-grid";
	if($classieraAdsView == 'list'){
		$classieraItemClass = "item-list";
	}	
	$keyword = $_GET['s'];
	if(isset($_GET['custom_fields'])){
		$custom_fields = $_GET['custom_fields'];
		$searchQueryCustomFields = classiera_CF_search_Query($custom_fields);
	}
	if(isset($_GET['search_min_price'])){
		$minPrice = $_GET['search_min_price'];
	}
	if(isset($_GET['search_max_price'])){
		$maxPrice = $_GET['search_max_price'];
	}
	if(isset($_GET['price_range'])){
		$price_range = $_GET['price_range'];
	}	
	if(empty($maxPrice)){
		$string = $price_range;
	}else{
		$string = $minPrice.','.$maxPrice;
	}	
	$priceArray = explode(',', $string);
	if(!empty($priceArray)){		
		$searchQueryPrice = classiera_Price_search_Query($priceArray);
	}
	if(isset($_GET['post_location'])){
		$country = $_GET['post_location'];		
		$searchQueryCountry = classiera_Country_search_Query($country);		
	}	
	if(isset($_GET['post_state'])){
		$state = $_GET['post_state'];
		$searchQueryState = classiera_State_search_Query($state);		
	}	
	if(isset($_GET['post_city'])){
		$city = $_GET['post_city'];
		$searchQueryCity = classiera_City_search_Query($city);
	}
	if(isset($_GET['item-condition'])){
		$search_condition = $_GET['item-condition'];		
		$searchCondition = classiera_Condition_search_Query($search_condition);
	}
	if(isset($_GET['classiera_ads_type'])){
		$classieraAdsType = $_GET['classiera_ads_type'];		
		$classieraAdsTypeSearch = classiera_adstype_search_Query($classieraAdsType);
	}	
	
	if(!empty($category_name)){
		if($category_name != "All" && $category_name != -1) {
			$catSearchID = $category_name;				
		} else {
			$catSearchID = '';
		}
	}	
	$iconPath = '';
	if(isset($_POST['favorite'])){
		$author_id = $_POST['author_id'];
		$post_id = $_POST['post_id'];
		echo classiera_favorite_insert($author_id, $post_id);
	}
	//Google MAP
	$classieraGoogleMAP = false;
	if($classieraGoogleMAP == true){
?>
<section id="classiera_map">
	<div id="log" style="display:none;"></div>
	<input id="latitude" type="hidden" value="">
	<input id="longitude" type="hidden" value="">
	<!--Search on MAP-->
	<div class="classiera_map_search">
        <div class="classiera_map_search_btn"><i class="fa fa-caret-right"></i></div>
        <form method="get">
            <div class="classiera_map_input-group">
                <input id="classiera_map_address" type="text" placeholder="<?php esc_html_e('Search ads by your Location', 'classiera'); ?>">
            </div>    
        </form>
    </div>	
	<!--Search on MAP-->
	<div id="classiera_main_map" style="width:100%; height:600px;">
		<script type="text/javascript">			
			jQuery(document).ready(function(){
				var addressPoints = [
					<?php 
					global $paged, $wp_query, $wp;										
					$args = wp_parse_args($wp->matched_query);
					$temp = $wp_query;
					if($classieraMAPPostType == 'featured'){
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							's'   => $keyword,
							'posts_per_page' => -1,											
							'category_name' => $catSearchID,
							'meta_query' => array(
								'relation' => 'AND',
								$searchQueryPrice,
								$searchQueryCountry,											
								$searchQueryState,											
								$searchQueryCity,
								$searchCondition,
								$classieraAdsTypeSearch,
								$searchQueryCustomFields,
								array(
									'key' => 'featured_post',
									'value' => '1',
									'compare' => '=='
								),
								
							),
						);
					}else{
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							's'   => $keyword,
							'posts_per_page' => -1,											
							'category_name' => $catSearchID,
							'meta_query' => array(
								'relation' => 'AND',
								$searchQueryPrice,
								$searchQueryCountry,											
								$searchQueryState,											
								$searchQueryCity,
								$searchCondition,
								$classieraAdsTypeSearch,
								$searchQueryCustomFields,
							),
						);
					}					
					$wp_query= null;
					$wp_query = new WP_Query($args);
					while ($wp_query->have_posts()) : $wp_query->the_post();
						$category = get_the_category();
						$catID = $category[0]->cat_ID;
						if ($category[0]->category_parent == 0){
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
						if(!empty($category_icon_code)){
							$category_icon = stripslashes($category_icon_code);
						}						
						$post_latitude = get_post_meta($post->ID, 'post_latitude', true);
						$post_longitude = get_post_meta($post->ID, 'post_longitude', true);
						$post_price = get_post_meta($post->ID, 'post_price', true);
						$post_phone = get_post_meta($post->ID, 'post_phone', true);
						$theTitle = get_the_title();
						$postCatgory = get_the_category( $post->ID );
						$postCurCat = $postCatgory[0]->name;
						$categoryLink = get_category_link($catID);
						$classieraPostAuthor = $post->post_author;
						$classieraAuthorEmail = get_the_author_meta('user_email', $classieraPostAuthor);
						$classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
						$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
						if(is_numeric($post_price)){
							$classieraPostPrice =  classiera_post_price_display($post_currency_tag, $post_price);
						}else{ 
							$classieraPostPrice =  $post_price; 
						}
						if( has_post_thumbnail()){
							$classieraIMG = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'classiera-370');
							$classieraIMGURL = $classieraIMG[0];
						}else{
							$classieraIMGURL = get_template_directory_uri() . '/images/nothumb.png';
						}
						if(empty($classieraCatIcoIMG)){
							$iconPath = get_template_directory_uri() .'/images/icon-services.png';
						}else{
							$iconPath = $classieraCatIcoIMG;
						}
						
						
					if(!empty($post_latitude)){	
					$content = '<a class="classiera_map_div" href="'.get_the_permalink().'"><img class="classiera_map_div__img" src="'.$classieraIMGURL.'" alt="images"><div class="classiera_map_div__body"><p class="classiera_map_div__price">'.__( "Price", 'classiera').' : <span>'.$classieraPostPrice.'</span></p><h5 class="classiera_map_div__heading">'.get_the_title().'</h5><p class="classiera_map_div__cat">'.__( "Category", 'classiera').' : '.$postCurCat.'</p></div></a>';
					?>
					
					[<?php echo $post_latitude; ?>, <?php echo $post_longitude; ?>, '<?php echo $content; ?>', "<?php echo $iconPath; ?>"],
					
					<?php 
					}
					endwhile;
					wp_reset_query();
					?>
				];
				var mapopts;
				if(window.matchMedia("(max-width: 1024px)").matches){
					var mapopts =  {
						dragging:false,
						tap:false,
					};					
				};
				var map = L.map('classiera_main_map', mapopts).setView([0,0],1);
				map.dragging.disable;
				map.scrollWheelZoom.disable();
				var roadMutant = L.gridLayer.googleMutant({
				<?php if($classieraMAPStyle){?>styles: <?php echo $classieraMAPStyle; ?>,<?php }?>
					maxZoom: 13,
					type:'roadmap'
				}).addTo(map);
				var markers = L.markerClusterGroup({
					spiderfyOnMaxZoom: true,
					showCoverageOnHover: true,
					zoomToBoundsOnClick: true,
					maxClusterRadius: 10
				});
				markers.on('clusterclick', function(e) {
					map.setView(e.latlng, 13);				
				});			
				var markerArray = [];
				for (var i = 0; i < addressPoints.length; i++){
					var a = addressPoints[i];
					var newicon = new L.Icon({iconUrl: a[3],
						iconSize: [36, 51], // size of the icon
						iconAnchor: [20, 10], // point of the icon which will correspond to marker's location
						popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor                                 
					});
					var title = a[2];
					var marker = L.marker(new L.LatLng(a[0], a[1]));
					marker.setIcon(newicon);
					marker.bindPopup(title, {minWidth:"400"});
					marker.title = title;
					//marker.on('click', function(e) {
						//map.setView(e.latlng, 13);
						
					//});				
					markers.addLayer(marker);
					markerArray.push(marker);
					if(i==addressPoints.length-1){//this is the case when all the markers would be added to array
						var group = L.featureGroup(markerArray); //add markers array to featureGroup
						map.fitBounds(group.getBounds());   
					}
				}
				var circle;
				map.addLayer(markers);
				function getLocation(){
					if(navigator.geolocation){
						navigator.geolocation.getCurrentPosition(showPosition);
					}else{
						x.innerHTML = "Geolocation is not supported by this browser.";
					}
				}
				function showPosition(position){					
					jQuery('#latitude').val(position.coords.latitude);
					jQuery('#longitude').val(position.coords.longitude);
					var latitude = jQuery('#latitude').val();
					var longitude = jQuery('#longitude').val();
					map.setView([latitude,longitude],13);
					circle = new L.circle([latitude, longitude], {radius: 2500}).addTo(map);
				}
				jQuery('#getLocation').on('click', function(e){
					e.preventDefault();
					getLocation();
				});
				//Search on MAP//
				var geocoder;
				function initialize(){
					geocoder = new google.maps.Geocoder();     
				}				
				jQuery("#classiera_map_address").autocomplete({
					  //This bit uses the geocoder to fetch address values					  
					source: function(request, response){
						geocoder = new google.maps.Geocoder();
						geocoder.geocode( {'address': request.term }, function(results, status) {
							response(jQuery.map(results, function(item) {
								return {
								  label:  item.formatted_address,
								  value: item.formatted_address,
								  latitude: item.geometry.location.lat(),
								  longitude: item.geometry.location.lng()
								}
							}));
						})
					},
					  //This bit is executed upon selection of an address
					select: function(event, ui) {
						jQuery("#latitude").val(ui.item.latitude);
						jQuery("#longitude").val(ui.item.longitude);
						var latitude = jQuery('#latitude').val();
						var longitude = jQuery('#longitude').val();
						map.setView([latitude,longitude],10);						
					}
				});
				//Search on MAP//
			});
		</script>
	</div>
</section>

<?php 
	}
	//Google MAP
	//Search Styles//
?>
<section class="pricing-advert">
<?php
	if($classieraSearchStyle == 1){
		get_template_part( 'templates/searchbar/searchstyle1' );
	}elseif($classieraSearchStyle == 2){
		get_template_part( 'templates/searchbar/searchstyle2' );
	}elseif($classieraSearchStyle == 3){
		get_template_part( 'templates/searchbar/searchstyle3' );
	}elseif($classieraSearchStyle == 4){
		get_template_part( 'templates/searchbar/searchstyle4' );
	}elseif($classieraSearchStyle == 5){
		get_template_part( 'templates/searchbar/searchstyle5' );
	}elseif($classieraSearchStyle == 6){
		get_template_part( 'templates/searchbar/searchstyle6' );
	}elseif($classieraSearchStyle == 7){
		get_template_part( 'templates/searchbar/searchstyle7' );
	}
?>
</section>
<section class="inner-page-content border-bottom top-pad-50">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
				<?php get_template_part( 'templates/classiera-adv-search' );?>
			</div><!--col-lg-3 col-md-4-->
			<!--EndSidebar-->
			<!--ContentArea-->
			<div class="col-lg-9 col-md-8">
				<?php if($classieraCategoriesStyle == 1){?>
				<!--show Total Ads-->
					<?php
						global $paged, $wp_query, $wp;								
						$args = wp_parse_args($wp->matched_query);
						$temp = $wp_query;								
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							's'   => $keyword,
							'posts_per_page' => -1,
							'category_name' => $catSearchID,
							'meta_query' => array(
								'relation' => 'AND',
								$searchQueryPrice,
								$searchQueryCountry,											
								$searchQueryState,											
								$searchQueryCity,
								$searchCondition,
								$classieraAdsTypeSearch,
								$searchQueryCustomFields,
							),
						);
						$wp_query= null;
						$wp_query = new WP_Query($args);
						$count = $wp_query->post_count;
					?>
					<h5 class="cava_search_result"> <?php echo $count; ?>
					<?php esc_html_e( 'Ads Found related to your search', 'classiera') ?> 
					</h5>
					<?php wp_reset_query(); ?>
					<?php wp_reset_postdata(); ?>
					<!--show Total Ads-->
				<section class="classiera-advertisement advertisement-v1 cava-advertisement">
					<div class="tab-divs">
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="all">
								<div class="container cava-container">
                                    <div class="row">
									<?php
										global $paged, $wp_query, $wp;										
										$args = wp_parse_args($wp->matched_query);
										$temp = $wp_query;										
										$args = array(
											'post_type' => 'post',
											'post_status' => 'publish',
											's'   => $keyword,
											'posts_per_page' => -1,											
											'category_name' => $catSearchID,
											'meta_query' => array(
												'relation' => 'AND',
												$searchQueryPrice,
												$searchQueryCountry,											
												$searchQueryState,											
												$searchQueryCity,
												$searchCondition,
												$classieraAdsTypeSearch,
												$searchQueryCustomFields,
												array(
													'key' => 'featured_post',
													'value' => '1',
													'compare' => '=='
												),
												
											),
										);
										$wp_query= null;
										$wp_query = new WP_Query($args);
										while ($wp_query->have_posts()) : $wp_query->the_post();
											$emptyPost++;
											$featuredPosts[] = $post->ID;
											?>
											
											<?php
											get_template_part( 'templates/cava-search-loop');
											?>
											
											<?php
										endwhile;
										wp_reset_query();
										wp_reset_postdata();
									?>
									<!--RegularAds-->
									<?php
										global $paged, $wp_query, $wp;
										$args = wp_parse_args($wp->matched_query);
										if ( !empty ( $args['paged'] ) && 0 == $paged ){
											$wp_query->set('paged', $args['paged']);
											$paged = $args['paged'];
										}
										$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
										$args = wp_parse_args($wp->matched_query);
										$temp = $wp_query;										
										$args = array(
											'post_type' => 'post',
											'post_status' => 'publish',
											'paged' => $paged,
											'post__not_in' => $featuredPosts,
											's'   => $keyword,
											'posts_per_page' => 10,
											'category_name' => $catSearchID,
											'meta_query' => array(
												'relation' => 'AND',
												$searchQueryPrice,
												$searchQueryCountry,											
												$searchQueryState,											
												$searchQueryCity,
												$searchCondition,
												$classieraAdsTypeSearch,
												$searchQueryCustomFields,
											),
										);										
										$wp_query = new WP_Query($args);										
										while ($wp_query->have_posts()) : $wp_query->the_post();
											$emptyPost++;
											?>
											<div class="classiera_search_adv">
											<?php
											get_template_part( 'templates/cava-search-loop');
											?>
											</div>
											<?php
										endwhile;
										wp_reset_postdata();
									//wp_reset_query();
									?>
									<!--RegularAds-->
									<?php if(empty($emptyPost) || $emptyPost == 0){ ?>
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
										<h5><?php esc_html_e( 'No results found for the selected search criteria.', 'classiera' ); ?></h5>
									</div>
									<?php } ?>
									</div><!--row-->
									<?php
									  if ( function_exists('classiera_pagination') ){
										classiera_pagination();
									  }
									?>
								</div><!--container-->
							</div><!--tabpanel-->
						</div><!--tab-content-->
					</div>
				</section>
				<!-- end advertisement style 1-->
				<?php }elseif($classieraCategoriesStyle == 2){?>				
				<?php }elseif($classieraCategoriesStyle == 3){?>
				<?php }elseif($classieraCategoriesStyle == 4){?>				
				<?php }elseif($classieraCategoriesStyle == 5){?>
				<?php }elseif($classieraCategoriesStyle == 6){?>				
				<?php }elseif($classieraCategoriesStyle == 7){?>				
				<?php } ?>
			</div>
			<!--ContentArea-->
		</div><!--row-->
	</div><!--container-->	
</section>
<script>
    
jQuery(document).ready(function() {
    
    alert("search");
});
    
<?php get_footer(); ?>