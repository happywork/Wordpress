<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */
get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>


    <?php 

global $redux_demo; 
global $current_user; wp_get_current_user(); $user_ID == $current_user->ID;


$classieraContactEmailError = $redux_demo['contact-email-error'];
$classieraContactNameError = $redux_demo['contact-name-error'];
$classieraConMsgError = $redux_demo['contact-message-error'];
$classieraContactThankyou = $redux_demo['contact-thankyou-message'];
$classieraRelatedCount = $redux_demo['classiera_related_ads_count'];
$classieraSearchStyle = $redux_demo['classiera_search_style'];
$classieraSingleAdStyle = $redux_demo['classiera_single_ad_style'];
$classieraPartnersStyle = $redux_demo['classiera_partners_style'];
$classieraComments = $redux_demo['classiera_sing_post_comments'];
$googleMapadPost = $redux_demo['google-map-adpost'];
$classieraToAuthor = $redux_demo['author-msg-box-off'];
$classieraReportAd = $redux_demo['classiera_report_ad'];
$locShownBy = $redux_demo['location-shown-by'];
$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
$classieraAuthorInfo = $redux_demo['classiera_author_contact_info'];
$classieraPriceSection = $redux_demo['classiera_sale_price_off'];
$classiera_bid_system = $redux_demo['classiera_bid_system'];
$category_icon_code = "";
$category_icon_color = "";
$your_image_url = "";

global $errorMessage;
global $emailError;
global $commentError;
global $subjectError;
global $humanTestError;
global $hasError;

//If the form is submitted
if(isset($_POST['submit'])) {
	if($_POST['submit'] == 'send_message'){
		//echo "send_message";
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$errorMessage = $classieraContactNameError;
			$hasError = true;
		} elseif(trim($_POST['contactName']) === 'Name*') {
			$errorMessage = $classieraContactNameError;
			$hasError = true;
		}	else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure that the subject field is not empty
		if(trim($_POST['subject']) === '') {
			$errorMessage = $classiera_contact_subject_error;
			$hasError = true;
		} elseif(trim($_POST['subject']) === 'Subject*') {
			$errorMessage = $classiera_contact_subject_error;
			$hasError = true;
		}	else {
			$subject = trim($_POST['subject']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === ''){
			$errorMessage = $classieraContactEmailError;
			$hasError = true;		
		}else{
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$errorMessage = $classieraConMsgError;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//Check to make sure that the human test field is not empty
		$classieraCheckAnswer = $_POST['humanAnswer'];
		if(trim($_POST['humanTest']) != $classieraCheckAnswer) {
			$errorMessage = esc_html__('Not Human', 'classiera');			
			$hasError = true;
		}
		$classieraPostTitle = $_POST['classiera_post_title'];	
		$classieraPostURL = $_POST['classiera_post_url'];
		
		//If there is no error, send the email		
		if(!isset($hasError)) {

			$emailTo = $contact_email;
			$subject = $subject;	
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
			$headers = 'From <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			//wp_mail($emailTo, $subject, $body, $headers);
			contactToAuthor($emailTo, $subject, $name, $email, $comments, $headers, $classieraPostTitle, $classieraPostURL);
			$emailSent = true;			

		}
	}
	if($_POST['submit'] == 'report_to_admin'){		
		$displayMessage = '';
		$report_ad = $_POST['report_ad_val'];
		if($report_ad == "illegal") {
			$message = esc_html__('This is illegal/fraudulent Ads, please take action.', 'classiera');
		}
		if($report_ad == "spam") {
			$message = esc_html__('This Ad is SPAM, please take action', 'classiera');			
		}
		if($report_ad == "duplicate") {
			$message = esc_html__('This ad is a duplicate, please take action', 'classiera');			
		}
		if($report_ad == "wrong_category") {
			$message = esc_html__('This ad is in the wrong category, please take action', 'classiera');			
		}
		if($report_ad == "post_rules") {
			$message = esc_html__('The ad goes against posting rules, please take action', 'classiera');			
		}
		if($report_ad == "post_other") {
			$message = $_POST['other_report'];				
		}		
		$classieraPostTitle = $_POST['classiera_post_title'];	
		$classieraPostURL = $_POST['classiera_post_url'];
		//print_r($message); exit();
		classiera_reportAdtoAdmin($message, $classieraPostTitle, $classieraPostURL);
		if(!empty($message)){
			$displayMessage = esc_html__('Thanks for report, Our Team will take action ASAP.', 'classiera');
		}
	}
	
}
if(isset($_POST['favorite'])){
	$author_id = $_POST['author_id'];
	$post_id = $_POST['post_id'];
	echo classiera_favorite_insert($author_id, $post_id);
}
if(isset($_POST['follower'])){	
	$author_id = $_POST['author_id'];
	$follower_id = $_POST['follower_id'];
	echo classiera_authors_insert($author_id, $follower_id);
}
if(isset($_POST['unfollow'])){
	$author_id = $_POST['author_id'];
	$follower_id = $_POST['follower_id'];
	echo classiera_authors_unfollow($author_id, $follower_id);
}

?>
    <?php 
	//Search Styles//
//	if($classieraSearchStyle == 1){
//		get_template_part( 'templates/searchbar/searchstyle1' );
//	}elseif($classieraSearchStyle == 2){
//		get_template_part( 'templates/searchbar/searchstyle2' );
//	}elseif($classieraSearchStyle == 3){
//		get_template_part( 'templates/searchbar/searchstyle3' );
//	}elseif($classieraSearchStyle == 4){
//		get_template_part( 'templates/searchbar/searchstyle4' );
//	}elseif($classieraSearchStyle == 5){
//		get_template_part( 'templates/searchbar/searchstyle5' );
//	}elseif($classieraSearchStyle == 6){
//		get_template_part( 'templates/searchbar/searchstyle6' );
//	}elseif($classieraSearchStyle == 7){
//		get_template_part( 'templates/searchbar/searchstyle7' );
//	}
?>

    <?php 
    $post_price = get_post_meta($post->ID, 'post_price', true); 
    $post_old_price = get_post_meta($post->ID, 'post_old_price', true);
    
    $dateFormat = get_option( 'date_format' );
    $postDate = get_the_date($dateFormat, $post->ID);
    $itemCondition = get_post_meta($post->ID, 'item-condition', true); 
    $post_location = get_post_meta($post->ID, 'post_location', true);
    $post_state = get_post_meta($post->ID, 'post_state', true);
    $post_city = get_post_meta($post->ID, 'post_city', true);
    $post_phone = get_post_meta($post->ID, 'post_phone', true);
    $post_latitude = get_post_meta($post->ID, 'post_latitude', true);
    $post_longitude = get_post_meta($post->ID, 'post_longitude', true);
    $post_address = get_post_meta($post->ID, 'post_address', true);
    $classieraCustomFields = get_post_meta($post->ID, 'custom_field', true);					
    $post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);

    $user_ID = $post->post_author;
   
    $author_avatar_url = get_user_meta($user_ID, "classify_author_avatar_url", true);
    $author_avatar_url = classiera_get_profile_img($author_avatar_url);
    $authorEmail = get_the_author_meta('user_email', $user_ID);
    $authorURL = get_the_author_meta('user_url', $user_ID);
    $authorPhone = get_the_author_meta('phone', $user_ID);
    if(empty($author_avatar_url)){										
        $author_avatar_url = classiera_get_avatar_url ($authorEmail, $size = '150' );
    }

    $_SESSION['myid'] = $post->ID;
    //$_SESSION['modified'] = the_modified_date('jS F, Y');
    
    $horse_name =  get_field( 'horse_name', $post->ID );
    $postVideo = get_field( 'youtube1', $post->ID );
    $postVideo2 = get_field( 'youtube2', $post->ID );

    
    $category = get_the_category(); 
    $category_parent_id = $category[0]->category_parent;

    if ( $category_parent_id != 0 ) {
        $category_parent = get_term( $category_parent_id, 'category' );
       $css_slug = $category_parent->slug;
    } else {
        $css_slug = $category[0]->slug;
    }

    if($css_slug =="classifieds" || $css_slug =="horses-ponies"){
        $postVideo = get_field( 'youtube1', $post->ID );
        $postVideo2 = get_field( 'youtube2', $post->ID );
    }else{
        $postVideo = get_field( 'youtube_dir1', $post->ID );
        $postVideo2 = get_field( 'youtube_dir2', $post->ID );
    }

?>

    <section class="custom-breadcrumps">

        <div class="container">
            <?php classiera_breadcrumbs();?>
        </div>
    </section>

    <section class="single-header">

        <div class="container">

            <div class="row">

                <div class="col-md-8">
                    <?php if($css_slug =="classifieds" || $css_slug =="horses-ponies"): ?>
                    <h3>
                        <?php echo $horse_name; ?>
                    </h3>
                    <?php endif; ?>
                    <?php if($css_slug =="classifieds" && $css_slug !="horses-ponies"): ?>
                    <h4 style="margin-top:30px">
                    <?php else: ?>
                    <h4>   
                    <?php endif; ?>
                        <?php the_title(); ?>
                    </h4>
                    
                    <?php if($css_slug =="classifieds" || $css_slug =="horses-ponies"): ?>
                    <h4>
                        <?php echo "$" . $post_price; ?>
                    </h4>
                     <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <p class="sharethis"> Share this ad </p>
                    <p class="social_icons">
                        <a href="#" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/fb_icon1.png" alt="image">
                    </a>
                        <a href="#" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/twitter_icon1.png" alt="image">
                    </a>
                        <a href="#" target="_blank">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/pinterest_icon.png" alt="image">
                    </a>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="inner-page-content single-post-page">
        <div class="container">
            <!-- breadcrumb -->

            <!-- breadcrumb -->
            <!--Google Section-->
            <?php 
		$homeAd1 = '';		
		global $redux_demo;
		$homeAdImg1 = $redux_demo['home_ad2']['url']; 
		$homeAdImglink1 = $redux_demo['home_ad2_url']; 
		$homeHTMLAds = $redux_demo['home_html_ad2'];
		
		if(!empty($homeHTMLAds) || !empty($homeAdImg1)){
			if(!empty($homeHTMLAds)){
				$homeAd1 = $homeHTMLAds;
			}else{
				$homeAd1 = '<a href="'.$homeAdImglink1.'" target="_blank"><img class="img-responsive" alt="image" src="'.$homeAdImg1.'" /></a>';
			}
		}
		if(!empty($homeAd1)){
		?>
            <section id="classieraDv">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 center-block text-center">
                            <?php echo $homeAd1; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
            <?php if ( get_post_status ( $post->ID ) == 'private' || get_post_status ( $post->ID ) == 'pending' ) {?>
            <div class="alert alert-info" role="alert">
                <p>
                    <strong><?php esc_html_e('Congratulation!', 'classiera') ?></strong>
                    <?php esc_html_e('Your Ad has submitted and pending for review. After review your Ad will be live for all users. You may not preview it more than once.!', 'classiera') ?>
                </p>
            </div>
            <?php } ?>
            <!--Google Section-->
            <?php if($classieraSingleAdStyle == 2){
			get_template_part( 'templates/singlev2' );
		}?>
            <div id='customrow' class="row">
                <div class="col-md-4">
                    <aside class="sidebar">
                        <div class="row">
                            <?php if($classieraSingleAdStyle == 1){?>
                            <!--Widget for style 1-->
                            <div class="col-lg-12 col-md-12 col-sm-6 match-height">
                                <div class="widget-box <?php if($classieraSingleAdStyle == 2){echo " border-none ";}?>">
                                    <?php 
								$classieraPriceSection = $redux_demo['classiera_sale_price_off'];
								if($classieraPriceSection == 1){									
									$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
								?>

                                    <?php  
                                        
                                    if($css_slug =="classifieds" || $css_slug =="horses-ponies"){
                                        get_template_part( 'templates/single-post/sidebar_classifieds' );
                                    }else {
                                        get_template_part( 'templates/single-post/sidebar_directory' );
                                    }
                                        
                                    ?>
                                    <!--details-->
                                    <?php } ?>
                                   
                                    <!--widget-box-->
                                </div>
                                <!--col-lg-12 col-md-12 col-sm-6 match-height-->
                                <?php } ?>


                                <div id="mapspace" class="col-lg-12 col-md-12 col-sm-6 match-height">
                                    <div class="widget-box <?php if($classieraSingleAdStyle == 2){echo " border-none ";}?>">
                                        <!--GoogleMAP-->
                                        <?php 
								global $redux_demo;
								$googleMapadPost = $redux_demo['google-map-adpost'];
								$locShownBy = $redux_demo['location-shown-by'];
								$post_location = get_post_meta($post->ID, $locShownBy, true);
								$post_latitude = get_post_meta($post->ID, 'post_latitude', true);
								$post_longitude = get_post_meta($post->ID, 'post_longitude', true);
								$post_address = get_post_meta($post->ID, 'post_address', true);
								$classieraMapStyle = $redux_demo['map-style'];
								$postCatgory = get_the_category( $post->ID );
								$postCurCat = $postCatgory[0]->name;
								if( has_post_thumbnail()){
									$classieraIMG = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
									$classieraIMGURL = $classieraIMG[0];
								}else{
									$classieraIMGURL = get_template_directory_uri() . '/images/nothumb.png';
								}								
								$iconPath = get_template_directory_uri() .'/images/icon-services.png';
								if($googleMapadPost == 1){
								?>
                                        <div class="widget-content widget-content-post">
                                            <div class="share widget-content-post-area">
                                                <?php if(!empty($post_latitude)){?>
                                                <div id="classiera_single_map">
                                                    <!--<div id="single-page-main-map" id="details_adv_map">-->
                                                    <div class="details_adv_map" id="details_adv_map">
                                                        <script type="text/javascript">
                                                            jQuery(document).ready(function() {
                                                                var addressPoints = [
                                                                    <?php 
													$content = '<a class="classiera_map_div" href="'.get_the_permalink().'"><img class="classiera_map_div__img" src="'.$classieraIMGURL.'" alt="images"><div class="classiera_map_div__body"><p class="classiera_map_div__price">'.__( "Price", 'classiera').' : <span>'.$classieraPostPrice.'</span></p><h5 class="classiera_map_div__heading">'.get_the_title().'</h5><p class="classiera_map_div__cat">'.__( "Category", 'classiera').' : '.$postCurCat.'</p></div></a>';
													?> [<?php echo $post_latitude; ?>, <?php echo $post_longitude; ?>, '<?php echo $content; ?>', "<?php echo $iconPath; ?>"],
                                                                ];
                                                                var mapopts;
                                                                if (window.matchMedia("(max-width: 1024px)").matches) {
                                                                    var mapopts = {
                                                                        dragging: false,
                                                                        tap: false,
                                                                    };
                                                                };
                                                                var map = L.map('details_adv_map', mapopts).setView([<?php echo $post_latitude; ?>, <?php echo $post_longitude; ?>], 10);
                                                                map.scrollWheelZoom.disable();
                                                                var roadMutant = L.gridLayer.googleMutant({
                                                                    <?php if($classieraMapStyle){?>
                                                                    styles: <?php echo $classieraMapStyle; ?>,
                                                                    <?php }?>
                                                                    maxZoom: 16,
                                                                    type: 'roadmap'
                                                                }).addTo(map);
                                                                var markers = L.markerClusterGroup({
                                                                    spiderfyOnMaxZoom: true,
                                                                    showCoverageOnHover: true,
                                                                    zoomToBoundsOnClick: true,
                                                                    maxClusterRadius: 60
                                                                });
                                                                var markerArray = [];
                                                                for (var i = 0; i < addressPoints.length; i++) {
                                                                    var a = addressPoints[i];
                                                                    var newicon = new L.Icon({
                                                                        iconUrl: a[3],
                                                                        iconSize: [50, 50], // size of the icon
                                                                        iconAnchor: [20, 10], // point of the icon which will correspond to marker's location
                                                                        popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor                                 
                                                                    });
                                                                    var title = a[2];
                                                                    var marker = L.marker(new L.LatLng(a[0], a[1]));
                                                                    marker.setIcon(newicon);
                                                                    marker.bindPopup(title);
                                                                    marker.title = title;
                                                                    marker.on('click', function(e) {
                                                                        map.setView(e.latlng, 13);

                                                                    });
                                                                    markers.addLayer(marker);
                                                                    markerArray.push(marker);
                                                                    if (i == addressPoints.length - 1) { //this is the case when all the markers would be added to array
                                                                        var group = L.featureGroup(markerArray); //add markers array to featureGroup
                                                                        map.fitBounds(group.getBounds());
                                                                    }
                                                                }
                                                                map.addLayer(markers);
                                                            });
                                                        </script>
                                                    </div>
                                                    <div id="ad-address">
                                                        <span>
											<a class="directions" href="http://maps.google.com/maps?saddr=&daddr=<?php echo $post_address; ?>" target="_blank">
												<?php esc_html_e( 'Get Directions', 'classiera' ); ?>
											</a>
                                             &nbsp;on Google Maps
											</span>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!--GoogleMAP-->
                                    </div>
                                    <!--widget-box-->
                                </div>
                                <!--col-lg-12-->
                                <!--SidebarWidgets-->
                                <?php dynamic_sidebar('single'); ?>
                                <!--SidebarWidgets-->
                            </div>
                            <!--row-->
                    </aside>
                    <!--sidebar-->
                    </div>
                    <!--col-md-4-->
                    <div class="col-md-8">
                        <!-- single post -->
                        <div class="single-post">
                            <?php if($classieraSingleAdStyle == 1){
						get_template_part( 'templates/singlev1');
					}?>

                            <!-- post description -->
                            <div class="border-section description">
                                <h3 class="border-section-heading text-uppercase">
                                    <?php esc_html_e( 'Description', 'classiera' ); ?>
                                </h3>
                                <?php echo the_content(); ?>
                            </div>

                            <!--PostVideo1-->
                            <?php if(!empty($postVideo)) { ?>
                            <div class="border-section postvideo">

                                <?php 
						if(preg_match("/youtu.be\/[a-z1-9.-_]+/", $postVideo)) {
							preg_match("/youtu.be\/([a-z1-9.-_]+)/", $postVideo, $matches);
							if(isset($matches[1])) {
								$url = 'https://www.youtube.com/embed/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}elseif(preg_match("/youtube.com(.+)v=([^&]+)/", $postVideo)) {
							preg_match("/v=([^&]+)/", $postVideo, $matches);
							if(isset($matches[1])) {
								$url = 'https://www.youtube.com/embed/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}elseif(preg_match("#https?://(?:www\.)?vimeo\.com/(\w*/)*(([a-z]{0,2}-)?\d+)#", $postVideo)) {
							preg_match("/vimeo.com\/([1-9.-_]+)/", $postVideo, $matches);
							//print_r($matches); exit();
							if(isset($matches[1])) {
								$url = 'https://player.vimeo.com/video/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>';
							}
						}else{
							$video = $postVideo;
						}
						?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php echo $video; ?>
                                </div>
                            </div>
                            <?php } ?>
                            <!--PostVideo1-->

                            <!--PostVideo2-->
                            <?php if(!empty($postVideo2)) { ?>
                            <div class="border-section postvideo">

                                <?php 
						if(preg_match("/youtu.be\/[a-z1-9.-_]+/", $postVideo2)) {
							preg_match("/youtu.be\/([a-z1-9.-_]+)/", $postVideo2, $matches);
							if(isset($matches[1])) {
								$url = 'https://www.youtube.com/embed/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}elseif(preg_match("/youtube.com(.+)v=([^&]+)/", $postVideo2)) {
							preg_match("/v=([^&]+)/", $postVideo2, $matches);
							if(isset($matches[1])) {
								$url = 'https://www.youtube.com/embed/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}elseif(preg_match("#https?://(?:www\.)?vimeo\.com/(\w*/)*(([a-z]{0,2}-)?\d+)#", $postVideo2)) {
							preg_match("/vimeo.com\/([1-9.-_]+)/", $postVideo2, $matches);
							//print_r($matches); exit();
							if(isset($matches[1])) {
								$url = 'https://player.vimeo.com/video/'.$matches[1];
								$video = '<iframe class="embed-responsive-item" src="'.$url.'" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>';
							}
						}else{
							$video = $postVideo2;
						}
						?>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php echo $video; ?>
                                </div>
                            </div>
                            <?php } ?>
                            <!--PostVideo2-->


                            <!-- classiera bid system -->
                            <?php if($classiera_bid_system == true){ ?>
                            <div class="border-section border bids">
                                <?php 
							global $wpdb; 
							$classieraMaxOffer = null;
							$classieraTotalBids = null;
							$post_id = $post->ID;
							$currentPostOffers = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}classiera_inbox WHERE offer_post_id = $post_id ORDER BY id DESC" );							
							$classieraMaxOffer = classiera_max_offer_price($post_id);
							$classieraMaxOffer = classiera_post_price_display($post_currency_tag, $classieraMaxOffer);
							$classieraMinOffer = classiera_min_offer_price($post_id);
							$classieraMinOffer = classiera_post_price_display($post_currency_tag, $classieraMinOffer);
							$classieraTotalBids = classiera_bid_count($post_id);
						?>
                                <h4 class="border-section-heading text-uppercase">
                                    <?php esc_html_e( 'Bids', 'classiera' ); ?>
                                </h4>
                                <div class="classiera_bid_stats">
                                    <p class="classiera_bid_stats_text">
                                        <strong><?php esc_html_e( 'BID Stats', 'classiera' ); ?> :</strong>
                                        <?php echo $classieraTotalBids; ?>&nbsp;
                                        <?php esc_html_e( 'Bids posted on this ad', 'classiera' ); ?>
                                    </p>
                                    <div class="classiera_bid_stats_prices">
                                        <?php if($currentPostOffers){?>
                                        <p class="classiera_bid_price_btn high_price">
                                            <span><?php esc_html_e( 'Highest Bid', 'classiera' ); ?>:</span>
                                            <?php echo $classieraMaxOffer;?>
                                        </p>
                                        <?php } ?>
                                        <?php if($currentPostOffers){?>
                                        <p class="classiera_bid_price_btn">
                                            <span><?php esc_html_e( 'Lowest Bid', 'classiera' ); ?>:</span>
                                            <?php echo $classieraMinOffer;?>
                                        </p>
                                        <?php } ?>
                                    </div>
                                    <!--classiera_bid_stats_prices-->
                                </div>
                                <!--classiera_bid_stats-->
                                <div class="classiera_bid_comment_section">
                                    <?php  
							if($currentPostOffers){
								foreach ( $currentPostOffers as $offerinfo ) {
								$classieraOfferAuthorID = $offerinfo->offer_author_id;
								$classieraOfferPrice = $offerinfo->offer_price;
								$classieraOfferPrice = classiera_post_price_display($post_currency_tag, $classieraOfferPrice);
								$classieraOfferComment = $offerinfo->offer_comment;	
								$classieraOfferDate = date($dateFormat, $offerinfo->date);
								$classieraOfferAuthor = get_the_author_meta('display_name', $classieraOfferAuthorID );
								if(empty($classieraOfferAuthor)){
									$classieraOfferAuthor = get_the_author_meta('user_nicename', $classieraOfferAuthorID );
								}
								if(empty($classieraOfferAuthor)){
									$classieraOfferAuthor = get_the_author_meta('user_login', $classieraOfferAuthorID );
								}
								$classieraOfferAuthorEmail = get_the_author_meta('user_email', $classieraOfferAuthorID);
								$classieraOfferAuthorIMG = get_user_meta($classieraOfferAuthorID, "classify_author_avatar_url", true);
								$classieraOfferAuthorIMG = classiera_get_profile_img($classieraOfferAuthorIMG);
								if(empty($classieraOfferAuthorIMG)){										
									$classieraOfferAuthorIMG = classiera_get_avatar_url ($classieraOfferAuthorEmail, $size = '150' );
								}
							?>
                                    <div class="classiera_bid_media">
                                        <img class="classiera_bid_media_img img-thumbnail" src="<?php echo $classieraOfferAuthorIMG; ?>" alt="<?php echo $classieraOfferAuthor;?>">
                                        <div class="classiera_bid_media_body">
                                            <h6 class="classiera_bid_media_body_heading">
                                                <?php echo $classieraOfferAuthor;?>
                                                <span><?php esc_html_e( 'Offering', 'classiera' ); ?></span>
                                            </h6>
                                            <p class="classiera_bid_media_body_time">
                                                <i class="fa fa-clock-o"></i>
                                                <?php echo $classieraOfferDate; ?>
                                            </p>
                                            <p class="classiera_bid_media_body_decription">
                                                <?php echo $classieraOfferComment; ?>
                                            </p>
                                        </div>
                                        <div class="classiera_bid_media_price">
                                            <p class="classiera_bid_price_btn">
                                                <span><?php esc_html_e( 'BID', 'classiera' ); ?>:</span>
                                                <?php echo $classieraOfferPrice; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php } }?>

                                </div>
                                <!--classiera_bid_comment_section-->
                                <div class="comment-form classiera_bid_comment_form">
                                    <div class="comment-form-heading">
                                        <h4 class="text-uppercase">
                                            <?php esc_html_e( 'Let’s Create Your Bid', 'classiera' ); ?>
                                        </h4>
                                        <p>
                                            <?php esc_html_e( 'Only registred user can post offer', 'classiera' ); ?>
                                            <span class="text-danger">*</span>
                                        </p>
                                    </div>
                                    <!--comment-form-heading-->
                                    <div class="classiera_ad_price_comment">
                                        <p>
                                            <?php esc_html_e( 'Ad Price', 'classiera' ); ?>
                                        </p>
                                        <h3>
                                            <?php echo $classieraPostPrice; ?>
                                        </h3>
                                    </div>
                                    <!--classiera_ad_price_comment-->
                                    <form data-toggle="validator" id="classiera_offer_form" method="post">
                                        <span class="classiera--loader"><img src="<?php echo get_template_directory_uri().'/images/loader.gif' ?>" alt="classiera loader"></span>
                                        <div class="form-group">
                                            <div class="form-inline row">
                                                <div class="form-group col-sm-12">
                                                    <label class="text-capitalize">
												<?php esc_html_e( 'Enter your bidding price', 'classiera' ); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                                    <div class="inner-addon left-addon">
                                                        <input type="number" class="form-control form-control-sm offer_price" name="offer_price" placeholder="<?php esc_html_e( 'Enter bidding price', 'classiera' ); ?>" data-error="<?php esc_html_e( 'Only integer', 'classiera' ); ?>" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <!--form-group col-sm-12-->
                                                <div class="form-group col-sm-12">
                                                    <label class="text-capitalize">
												<?php esc_html_e( 'Enter your comment', 'classiera' ); ?> :
                                                <span class="text-danger">*</span>
                                            </label>
                                                    <div class="inner-addon">
                                                        <textarea class="offer_comment" data-error="<?php esc_html_e( 'please type your comment', 'classiera' ); ?>" name="offer_comment" placeholder="<?php esc_html_e( 'Type your comment here', 'classiera' ); ?>" required></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <!--form-group col-sm-12-->
                                            </div>
                                            <!--form-inline row-->
                                        </div>
                                        <!--form-group-->
                                        <?php 
								$postAuthorID = $post->post_author;
								$currentLoggedAuthor = wp_get_current_user();
								$offerAuthorID = $currentLoggedAuthor->ID;
								?>
                                        <input type="hidden" class="offer_post_id" name="offer_post_id" value="<?php echo $post->ID;?>">
                                        <input type="hidden" class="post_author_id" name="post_author_id" value="<?php echo $postAuthorID; ?>">
                                        <input type="hidden" class="offer_author_id" name="offer_author_id" value="<?php echo $offerAuthorID; ?>">
                                        <input type="hidden" class="offer_post_price" name="offer_post_price" value="<?php echo $classieraPostPrice; ?>">
                                        <div class="form-group">
                                            <button type="submit" name="submit_bid" class="btn btn-primary sharp btn-md btn-style-one submit_bid">
										<?php esc_html_e( 'Send offer', 'classiera' ); ?>
									</button>
                                        </div>
                                        <div class="form-group">
                                            <div class="classieraOfferResult bg-success text-center"></div>
                                        </div>
                                    </form>
                                </div>
                                <!--comment-form classiera_bid_comment_form-->
                            </div>
                            <?php } ?>
                            <!-- classiera bid system -->
                            <!--comments-->
                            <?php if($classieraComments == 1){?>
                            <div class="border-section border comments">
                                <h4 class="border-section-heading text-uppercase">
                                    <?php esc_html_e( 'Comments', 'classiera' ); ?>
                                </h4>
                                <?php 
						$file ='';
						$separate_comments ='';
						comments_template( $file, $separate_comments );
						?>
                            </div>
                            <?php } ?>
                            <!--comments-->
                        </div>
                        <!-- single post -->
                    </div>

                </div>
                <!--row-->
            </div>
            <!--container-->
    </section>
    <?php endwhile; ?>
    <!-- related post section -->
    <?php 
//global $redux_demo;
//$relatedAdsOn = $redux_demo['related-ads-on'];
//if($relatedAdsOn == 1){
//	function related_Post_ID(){
//		global $post;
//		$post_Id = $post->ID;
//		return $post_Id;
//	}
	//get_template_part( 'templates/related-ads' );
//}
?>
    <!-- Company Section Start-->
    <?php 
//	global $redux_demo; 
//	$classieraCompany = $redux_demo['partners-on'];
//	$classieraPartnersStyle = $redux_demo['classiera_partners_style'];
//	if($classieraCompany == 1){
//		if($classieraPartnersStyle == 1){
//			get_template_part('templates/members/memberv1');
//		}elseif($classieraPartnersStyle == 2){
//			get_template_part('templates/members/memberv2');
//		}elseif($classieraPartnersStyle == 3){
//			get_template_part('templates/members/memberv3');
//		}elseif($classieraPartnersStyle == 4){
//			get_template_part('templates/members/memberv4');
//		}elseif($classieraPartnersStyle == 5){
//			get_template_part('templates/members/memberv5');
//		}elseif($classieraPartnersStyle == 6){
//			get_template_part('templates/members/memberv6');
//		}
//	}
?>
    <!-- Company Section End-->
    <!-- related post section -->
    <?php get_footer(); ?>