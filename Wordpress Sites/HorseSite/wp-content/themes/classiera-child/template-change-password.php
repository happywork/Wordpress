<?php
/**
 * Template name: Change Password
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */



$error_redirect_url   = home_url();
$profile_redirect_url = home_url('profile-settings/#current-pass');

// check for hash
if ( isset($_GET['h']) && !empty($_GET['h']) && ( strlen($_GET['h']) == 32 ) ) {
    $hash = $_GET['h'];
} else {
    wp_redirect( $error_redirect_url ); exit;
}


// check for auth
if ( is_user_logged_in() ) {
	wp_redirect( $profile_redirect_url ); exit;
}


// try to find user by hash
global $wpdb;
$user = $wpdb->get_row(
    $wpdb->prepare(
        "
            SELECT *
            FROM $wpdb->users
            WHERE MD5(CONCAT(user_email, user_pass)) = %s
        ",
        $hash
    ),
    OBJECT
);
if ( empty($user) || !$user ) {
    wp_redirect( $error_redirect_url ); exit;
}


// Automatic login
$user = get_user_by('email', $user->user_email );
if ( !is_wp_error( $user ) ) {
    
    // $user_signon = wp_signon( $user, false );
    
    wp_clear_auth_cookie();
    wp_set_current_user ( $user->ID );
    wp_set_auth_cookie  ( $user->ID );

    wp_safe_redirect( $profile_redirect_url );
    exit();
} else {
    wp_redirect( $error_redirect_url ); exit;
}



get_header();
 ?>
<!--PageContent-->

<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div><!--col-md-8 col-lg-9-->
	</div><!--row-->
</div>

<!--PageContent-->
<?php get_footer(); ?>
