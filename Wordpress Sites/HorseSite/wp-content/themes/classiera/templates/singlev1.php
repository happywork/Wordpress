<!-- post title-->
<?php  
global $redux_demo; 
$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
global $post;
$current_user = wp_get_current_user();
$edit_post_page_id = $redux_demo['edit_post'];
$postID = $_SESSION['myid'];
global $wp_rewrite;
if ($wp_rewrite->permalink_structure == ''){
	$edit_post = $edit_post_page_id."&post=".$postID;
}else{
	$edit_post = $edit_post_page_id."?post=".$postID;
}
/*PostMultiCurrencycheck*/
$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
if(!empty($post_currency_tag)){
	$classieraCurrencyTag = classiera_Display_currency_sign($post_currency_tag);
}else{
	global $redux_demo;
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
}
/*PostMultiCurrencycheck*/

?>

<!-- single post carousel-->
<?php 
		$attachments = get_children(array('post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'ASC',
			'orderby' => 'menu_order ID'
			)
		);
?>
<?php if ( has_post_thumbnail() || !empty($attachments)){?>
<div id="single-post-carousel" class="carousel slide single-carousel" data-ride="carousel" data-interval="3000">
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
	<?php 
	if(empty($attachments)){
		if ( has_post_thumbnail()){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			?>
		<div class="item active">
			<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
		</div>
		<?php
		}else{
			$image = get_template_directory_uri().'/images/nothumb.png';
			?>
			<div class="item active">
				<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
			</div>
			<?php
		}
	}else{
		$count = 1;
		foreach($attachments as $att_id => $attachment){
			$full_img_url = wp_get_attachment_url($attachment->ID);
			?>
		<div class="item <?php if($count == 1){ echo "active"; }?>">
			<img class="img-responsive" src="<?php echo $full_img_url; ?>" alt="<?php the_title(); ?>">
		</div>
		<?php
		$count++;
		}
	}
	?>
	</div>
	<!-- slides number -->
	<div class="num">
		<i class="fa fa-camera"></i>
		<span class="init-num"><?php esc_html_e('1', 'classiera') ?></span>
		<span><?php esc_html_e('of', 'classiera') ?></span>
		<span class="total-num"></span>
	</div>
	<!-- Left and right controls -->
	<div class="single-post-carousel-controls">
		<a class="left carousel-control" href="#single-post-carousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only"><?php esc_html_e('Previous', 'classiera') ?></span>
		</a>
		<a class="right carousel-control" href="#single-post-carousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only"><?php esc_html_e('Next', 'classiera') ?></span>
		</a>
	</div>
	<!-- Left and right controls -->
</div>
<?php } ?>
<!-- single post carousel-->

