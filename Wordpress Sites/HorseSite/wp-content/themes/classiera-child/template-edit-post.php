<?php
/**
 * Template name: Edit Ads
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage classiera
 * @since classiera 1.0
 */

if ( !is_user_logged_in() ) {
	wp_redirect( home_url() ); exit;
}
$postContent = '';
global $current_user;
$query = new WP_Query(array('post_type' => 'post', 'posts_per_page' =>'-1') );
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
	if(isset($_GET['post'])) {	
		if($_GET['post'] == $post->ID)
		{
			$title = get_the_title();
			$content = get_the_content();
			$posttags = get_the_tags($current_post);
			if ($posttags) {
			  foreach($posttags as $tag) {
				$tags_list = $tag->name . ' '; 
			  }
			}
			$postcategory = get_the_category( $current_post );
			$category_id = $postcategory[0]->cat_ID;
			$post_category_type = get_post_meta($post->ID, 'post_category_type', true);
			$post_location = get_post_meta($post->ID, 'post_location', true);
			$post_latitude = get_post_meta($post->ID, 'post_latitude', true);
			$post_longitude = get_post_meta($post->ID, 'post_longitude', true);
			$post_price_plan_id = get_post_meta($post->ID, 'post_price_plan_id', true);
			$post_address = get_post_meta($post->ID, 'post_address', true);
			$post_video = get_post_meta($post->ID, 'post_video', true);
			$featured_post = "0";
			$post_price_plan_activation_date = get_post_meta($post->ID, 'post_price_plan_activation_date', true);
			$post_price_plan_expiration_date = get_post_meta($post->ID, 'post_price_plan_expiration_date', true);
			$todayDate = strtotime(date('d/m/Y H:i:s'));
			$expireDate = strtotime($post_price_plan_expiration_date);  
			if(!empty($post_price_plan_activation_date)) {
				if(($todayDate < $expireDate) or empty($post_price_plan_expiration_date)) {
					$featured_post = "1";
				}
			}
				$post_latitude = 0;
			}			
			if(empty($post_longitude)) {
				$post_longitude = 0;
				$mapZoom = 2;
			} else {
				$mapZoom = 16;
			}	
			if ( has_post_thumbnail() ) {	
				$post_thumbnail = get_the_post_thumbnail($current_post, 'thumbnail');		
			} 
		}
	}
endwhile; endif;
wp_reset_query();
$postTitleError = '';
$post_priceError = '';
$catError = '';
$featPlanMesage = '';
if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
	if(trim($_POST['postTitle']) === '') {		
		$hasError = true;
	} else {
		$postTitle = trim($_POST['postTitle']);
	}
	if(empty($_POST['cat'])){		
		$hasError = true;
	} 
	if($hasError != true) {
		if(is_super_admin() ){
			$postStatus = 'publish';
		}elseif(!is_super_admin()){		
			if($redux_demo['post-options-edit-on'] == 1){
				$postStatus = 'private';
			}else{
				$postStatus = 'publish';
			}
		}
		$post_information = array(
			'ID' => $current_post,
			'post_title' => esc_attr(strip_tags($_POST['postTitle'])),
			'post_content' => strip_tags($_POST['postContent'], '<h1><h2><h3><strong><b><ul><ol><li><i><a><blockquote><center><embed><iframe><pre><table><tbody><tr><td><video>'),
			'post-type' => 'post',
			'post_category' => $catsArray,
	        'tags_input'    => explode(',', $_POST['post_tags']),
	        'comment_status' => 'open',
	        'ping_status' => 'open',
			'post_status' => $postStatus
		);		
		$post_id = wp_insert_post($post_information);
		$googleLong = $_POST['longitude'];
		
		$post_price_status = trim($_POST['post_price']);

		global $redux_demo; 
		$free_listing_tag = $redux_demo['free_price_text'];
		if(empty($post_price_status)) {
			$post_price_content = $free_listing_tag;
		} else {
			$post_price_content = $post_price_status;
		}
		$catID = $mCatID.'custom_field';		
		$custom_fields = $_POST[$catID];
		if(isset($_POST['post_category_type'])){
		update_post_meta($post_id, 'custom_field', $custom_fields);
		update_post_meta($post_id, 'post_price', $post_price_content, $allowed);
		update_post_meta($post_id, 'post_location', wp_kses($postCounty, $allowed));
		update_post_meta($post_id, 'post_address', wp_kses($_POST['address'], $allowed));
		update_post_meta($post_id, 'post_video', $_POST['video'], $allowed);
		update_post_meta($post_id, 'classiera_post_type', $_POST['classiera_post_type'], $allowed);
		$permalink = get_permalink( $post_id );

		//If Its posting featured image//
		if ( $_FILES ) {
			$files = $_FILES['upload_attachment'];
			foreach ($files['name'] as $key => $value) {
				if ($files['name'][$key]) {
					$file = array(
						'name'     => $files['name'][$key],
						'type'     => $files['type'][$key],
						'tmp_name' => $files['tmp_name'][$key],
						'error'    => $files['error'][$key],
						'size'     => $files['size'][$key]
					);		 
					$_FILES = array("upload_attachment" => $file);
				}
			}
		}
		if (isset($_POST['att_remove'])) {
			foreach ($_POST['att_remove'] as $att_id){
				wp_delete_attachment($att_id);
			}
		}
		wp_redirect( $permalink ); exit;
	}
} 

get_header();  ?>
<?php endwhile; ?>
<?php get_footer(); ?>