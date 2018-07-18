<?php 
	global $redux_demo;
$classieraDisplayName = '';
$templateProfile = '';
$templateAllAds = '';
$templateEditPost = '';
$templateSubmitAd = '';
$templateFollow = '';
$templatePlans = '';
$templateFavourite = '';
$current_user = wp_get_current_user();
$user_ID = $current_user->ID;
$classieraAuthorEmail = $current_user->user_email;
$classieraDisplayName = $current_user->display_name;
if(empty($classieraDisplayName)){
	$classieraDisplayName = $current_user->user_nicename;
}
if(empty($classieraDisplayName)){
	$classieraDisplayName = $current_user->user_login;
}
$classieraAuthorIMG = get_user_meta($user_ID, "classify_author_avatar_url", true);
$classieraAuthorIMG = classiera_get_profile_img($classieraAuthorIMG);
if(empty($classieraAuthorIMG)){
	$classieraAuthorIMG = classiera_get_avatar_url ($classieraAuthorEmail, $size = '150' );
}	
$classieraOnlineCheck = classiera_user_last_online($user_ID);
$UserRegistered = $current_user->user_registered;
$dateFormat = get_option( 'date_format' );
$classieraRegDate = date_i18n($dateFormat,  strtotime($UserRegistered));	
$classieraLogo = $redux_demo['logo']['url'];	
$classieraProfileURL = $redux_demo['profile'];
$classieraLoginURL = $redux_demo['login'];
$classieraSubmitPost = $redux_demo['new_post'];		
$classieraFacebook = $redux_demo['facebook-link'];
$classieraTwitter = $redux_demo['twitter-link'];
$classieraGoogle = $redux_demo['google-plus-link'];
$classieraInstagram = $redux_demo['instagram-link'];
$classieraRegisterURL = $redux_demo['register'];
$classieraUserFavourite = $redux_demo['all-favourite'];	
$classieraAllAds = $redux_demo['all-ads'];
$classieraInbox = $redux_demo['classiera_inbox_page_url'];
$templateContact = 'template-contact.php';		
$templateContactURL = classiera_get_template_url($templateContact);
?>
<div class="container cavalletti-topbar">
	<div class="row">		
		<div class="col-md-6 col-sm-4 custom-menu-container">
			<div class="navbar-header mobile-btn">
                <a class="ubermenu-responsive-toggle ubermenu-responsive-toggle-main ubermenu-skin-clean-white ubermenu-loc-mobile ubermenu-responsive-toggle-content-align-left ubermenu-responsive-toggle-align-full" data-ubermenu-target="ubermenu-main-490-mobile-4">
                	<img src="<?php echo get_stylesheet_directory_uri();?>/images/mobile-menu-open.png" class="mobile-img1">
                	<img src="<?php echo get_stylesheet_directory_uri();?>/images/mobile-menu-close.png" class="mobile-img2 close-img">
                </a>
            </div>            
			<figure class="logo">
				<a href="<?php echo home_url(); ?>">
					<?php if(empty($classieraLogo)){?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
					<?php }else{ ?>
						<img src="<?php echo $classieraLogo; ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php } ?>
				</a>
			</figure>			
		</div><!--logo-->
		<div class="col-md-6 col-sm-8 header-right">
			<div class="place_btn">
				<a <?php if(!is_user_logged_in()): ?> data-toggle="modal" data-target="#logIn" href="#" <?php else: ?> href="<?php echo $classieraSubmitPost; ?>" <?php endif; ?> class="btn btn-default hoverable">
					<span class="h_effect"></span>
					<?php esc_html_e( 'Place an Ad', 'classiera' ); ?>
				</a>
			</div><!--place_btn-->
			
			
			<?php if(!is_user_logged_in()): ?>
                
                <a class="topLogin" data-toggle="modal" data-target="#logIn" href="#">Log in</a>
                <a class="topLogin join" href="#" data-toggle="modal" data-target="#joinNow">Join Now</a>
            
            <?php else: ?>
            
            <div class="dropdown user-dropdown">
				<img class="userIMG" src="<?php echo $classieraAuthorIMG; ?>" alt="<?php echo $classieraDisplayName; ?>">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
					<?php echo $classieraDisplayName;?>
					<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation">
                        
                        
                        <?php esc_html_e( 'Hi', 'classiera' );?>
						<?php echo $classieraDisplayName;?>
						
					</li>
					<li role="presentation">
						<a role="menuitem" tabindex="-1" href="<?php echo $classieraProfileURL; ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/profile_icon.png" alt="image">
							<?php esc_html_e( 'My Account', 'classiera' ); ?>
						</a>
					</li><!--Profile-->
					<li role="presentation">
						<a role="menuitem" tabindex="-1" href="<?php echo $classieraInbox; ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/messages_icon.png" alt="image"> <?php esc_html_e("Message", 'classiera') ?>
						</a>
					</li><!--Messages-->
					<li role="presentation">
						<a role="menuitem" tabindex="-1" href="<?php echo $classieraAllAds; ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/manage-ads_icon.png" alt="image"> 
							<?php esc_html_e("My Ads", 'classiera') ?>
						</a>
					</li><!--Manage Ads-->
					<li role="presentation">
						<a role="menuitem" tabindex="-1" href="<?php echo $classieraUserFavourite; ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/watchlist_icon.png" alt="image">
							<?php esc_html_e("Watch later Ads", 'classiera') ?>
						</a>
					</li><!--Watchlist-->
					<li role="presentation">
						<?php if(is_user_logged_in()){?>
						<a role="menuitem" tabindex="-1" href="<?php echo wp_logout_url(get_option('siteurl')); ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/log-out_icon.png" alt="image"> 
							<?php esc_html_e("Logout", 'classiera') ?>
						</a>
						<?php }else{ ?>
						<a role="menuitem" tabindex="-1" href="<?php echo $classieraLoginURL; ?>" class="hoverable">
							<span class="h_effect"></span>
							<img src="<?php echo get_stylesheet_directory_uri();?>/images/log-out_icon.png" alt="image"> 
							<?php esc_html_e("Login", 'classiera') ?>
						</a>
						<?php } ?>
					</li><!--Sign Out-->
				</ul>
			</div><!--dropdown-->
			
			<?php endif; ?>
			
			<div class="msg-noti">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/message_icon.png" alt="image"> 
				<span class="badge"><?php echo classiera_total_user_bids($user_ID);?></span>
			</div><!--msg-noti-->
			<div>
				<a href="<?php echo $templateContactURL; ?>" data-toggle="tooltip" data-placement="right" title="Help">
					<img src="<?php echo get_stylesheet_directory_uri();?>/images/help_icon.png" alt="image">
				</a>
			</div><!--help-->
		</div><!--header-right-->
	</div><!--row-->
</div><!--container-->

<?php
if ( !is_user_logged_in() ) {
    get_template_part( 'templates/cava-auth-modals' );
}
?>
<script>
    jQuery(document).ready(function() {
        var effect = 'slide';
        var options = {
            direction: 'left'
        };
        var options1 = {
            direction: 'right'
        };
        var duration = 800;

        jQuery(document).on('click touchstart', '.mobile-btn a', function(e) {    
        	e.preventDefault();
    		jQuery('.mobile-img1').toggleClass('close-img');    
    		jQuery('.mobile-img2').toggleClass('close-img');
    		jQuery("#overlay").toggleClass('overlay-container');   
		});
		
        jQuery(".navbar-toggle").on("click", function() { 

            /*jQuery('#myCustomnavbar').toggle(effect, options, duration);

            if (jQuery('#myCustomnavbar').hasClass("open")) {
                jQuery('#myCustomnavbar').removeClass("open");
            } else {
                jQuery('#myCustomnavbar').addClass("open");
            }*/

        });

    });
</script>