<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php 
	if (isset($_SERVER['HTTP_USER_AGENT']) &&
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        header('X-UA-Compatible: IE=9');
	global $redux_demo; 
	$favicon = $redux_demo['favicon']['url'];
	$classieraLogo = $redux_demo['logo']['url'];
?>
	<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php 
	if(is_front_page()){
		?>
	<meta property="og:image" content="<?php echo $classieraLogo; ?>"/>
		<?php
	}elseif(is_single()){
		$ID = $wp_query->post->ID;
		$classieraOGIMG = wp_get_attachment_url( get_post_thumbnail_id($ID) );
		?>
	<meta property="og:image" content="<?php echo $classieraOGIMG; ?>"/>
		<?php
	}
	?>
	<?php
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {			
		if (!empty($favicon)){
		?>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
		<?php }else{ ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
		<?php
		}
	}
	?>
		<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
		<?php wp_head(); ?>
	</head>
	
<?php
$classieraNavStyle = $redux_demo['nav-style'];
?>	
<body <?php body_class(); ?>>
	<header>
	<?php 
	if($classieraNavStyle != 5){
		get_template_part('templates/top-bar'); 
	}	
	?>
	<?php get_template_part('templates/nav-bar'); ?>
	<!-- Mobile App button -->
	<div class="mobile-submit affix">
        <ul class="list-unstyled list-inline mobile-app-button">
		<?php 
		$classieraProfileURL = $redux_demo['profile'];
		$classieraLoginURL = $redux_demo['login'];
		$classieraRegisterURL = $redux_demo['register'];
		$classieraSubmitPost = $redux_demo['new_post'];	
			if(is_user_logged_in()){
		?>
			<li>
                <a href="<?php echo wp_logout_url(get_option('siteurl')); ?>">
                    <i class="fa fa-sign-out"></i>
                    <span><?php esc_html_e( 'Log out', 'classiera' ); ?></span>
                </a>
            </li>
			<li>
                <a href="<?php echo $classieraSubmitPost; ?>">
                    <i class="fa fa-edit"></i>
                    <span><?php esc_html_e( 'Place an Ad', 'classiera' ); ?></span>
                </a>
            </li>
			<li>
                <a href="<?php echo $classieraProfileURL; ?>">
                    <i class="fa fa-user-o"></i>
                    <span><?php esc_html_e( 'My Account', 'classiera' ); ?></span>
                </a>
            </li>
		 <?php }else{?>
            <li>
                <a href="<?php echo $classieraLoginURL; ?>">
                    <i class="fa fa-sign-in"></i>
                    <span><?php esc_html_e( 'Login', 'classiera' ); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $classieraSubmitPost; ?>">
                    <i class="fa fa-edit"></i>
                    <span><?php esc_html_e( 'Submit Ad', 'classiera' ); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $classieraRegisterURL; ?>">
                    <i class="fa fa-user-o"></i>
                    <span><?php esc_html_e( 'Get Registered', 'classiera' ); ?></span>
                </a>
            </li>
		 <?php } ?>
        </ul>
    </div>
	<!-- Mobile App button -->
	</header>