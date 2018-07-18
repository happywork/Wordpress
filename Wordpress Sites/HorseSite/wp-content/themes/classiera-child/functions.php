<?php
function theme_enqueue_styles() {
	if(is_page_template('template-cavalletti.php') || is_home() || is_front_page()) {
		wp_deregister_script( 'owl.carousel.min' );
	}
	if(is_rtl()){
		wp_enqueue_style( 'child-rtl', get_stylesheet_directory_uri() . '/rtl.css' );
	}
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
	wp_enqueue_script('slick.min', get_stylesheet_directory_uri() . '/js/slick.min.js', 'jquery', '', true);
	wp_enqueue_style( 'cavalletti', get_stylesheet_directory_uri() . '/css/cavalletti.css' );
	wp_enqueue_script('jquery.selectlist', get_stylesheet_directory_uri() . '/js/jquery.selectlist.js', 'jquery', '', true);
	wp_enqueue_script('classiera-child', get_stylesheet_directory_uri() . '/js/classiera-child.js', 'jquery', '', true);

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' , 20);
//Lookbook posts selection//
function add_another_section_cava($sections){
    //$sections = array(); // Delete this if you want to keep original sections!
    $sections[] = array(
        'title' => __('Lookbook Section', 'classiera'),
        'desc' => __('Select Blogs Posts which you want to shown on homepage section.', 'classiera'),
        'icon' => 'el el-googleplus',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array(
			array(
				'id'=>'cava_lookbook_title',
				'type' => 'text',
				'title' => __('Section Title', 'classiera'),
				'default' => 'LOOKBOOKS'
			),
			array(
				'id' => 'cava_lookbook_posts',
				'type' => 'select',
				'data' => 'posts',
				'multi'    => true,
				'args' => array(
					'posts_per_page' => -1,
					'post_type' => 'blog',
					'post_status' => 'publish',
					'suppress_filters' => true,
				),
				'default' => 1,
				'title' => __('Select Lookbook posts', 'classiera'),
				'desc' => __('Select Only that blogs posts which you want to show on homepage.', 'classiera'),
            ),
			array(
				'id' => 'cava_blog_slider_posts',
				'type' => 'select',
				'data' => 'posts',
				'multi'    => true,
				'args' => array(
					'posts_per_page' => -1,
					'post_type' => 'blog',
					'post_status' => 'publish',
					'suppress_filters' => true,
				),
				'default' => 1,
				'title' => __('Select Slider posts', 'classiera'),
				'desc' => __('Select post which you want to show on Blog page Big Slider', 'classiera'),
            ),
		)
    );
	$sections[] = array(
        'title' => __('Blogs Ads', 'classiera'),
        'desc' => __('This Ad will be shown on Homepage in blog section', 'classiera'),
        'icon' => 'el el-googleplus',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array(
			array(
				'id'=>'cava_blog_adv',
				'type' => 'media',
				'url'=> true,
				'title' => __('Cava Blog IMG', 'classiera'),
				'compiler' => 'true',
				//'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'desc'=> __('Upload your Ad Image Recommended image size:285x240', 'classiera'),
				'subtitle' => __('Upload your Ads', 'classiera'),
				'default'=>array('url'=>''),
			),
		)
    );
	$sections[] = array(
        'title' => __('Cava Categories', 'classiera'),
        'desc' => __('Select only those categories which you want to show on homepage.', 'classiera'),
        'icon' => 'el el-googleplus',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array(
			array(
				'id'=>'cava_home_cats',
				'type' => 'select',
				'data' => 'categories',
				'args' => array(
					'orderby' => 'name',
					'hide_empty' => 0,
				),
				'multi'    => true,
				'title' => __('Select Categories for Homepage Cat Section', 'classiera'),
				'subtitle' => __('Category Section', 'classiera'),
				'desc' => __('Please select categories which you want to shown on Homepage', 'classiera'),
				'default' => 1,
			),
			array(
				'id'=>'cava_cats_blog_page',
				'type' => 'select',
				'data' => 'categories',
				'args' => array(
					'orderby' => 'name',
					'taxonomy' => 'blog_category',
					'hide_empty' => 0,
				),
				'multi'    => true,
				'title' => __('Select Categories for Blog Page', 'classiera'),
				'subtitle' => __('Blog Page Category Section', 'classiera'),
				'desc' => __('Please select categories which you want to shown on Blog Page', 'classiera'),
				'default' => 1,
			),
		)
    );

    return $sections;
}
// In this example OPT_NAME is the returned opt_name.
add_filter("redux/options/redux_demo/sections", 'add_another_section_cava');
function classierachild_authors_favorite_check($author_id, $post_id) {
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}author_favorite WHERE post_id = $post_id AND author_id = $author_id", OBJECT );
    if(empty($results)){
		?>
		<form method="post">
			<input type="hidden" name="author_id" value="<?php echo $author_id; ?>"/>
			<input type="hidden" name="post_id" value="<?php echo $post_id; ?>"/>
			<button type="submit" value="favorite" name="favorite" class="classiera_search_adv__inner__footer_like">
				<i class="fa fa-heart-o"></i>
			</button>
		</form>
		<?php
	}else{
		$favoriteTemplate = 'template-favorite.php';
		$favoriteTemplateURL = classiera_get_template_url($favoriteTemplate);
		?>
		<a href="<?php echo $favoriteTemplateURL; ?>" class="classiera_search_adv__inner__footer_like">
			<i class="fa fa-heart"></i>
		</a>
		<?php
	}
}
/*==========================
 Classiera : Function to add custom meta for blog category.
 ===========================*/
add_action('blog_category_edit_form_fields', 'classiera_blog_category_fields');
add_action('blog_category_add_form_fields', 'classiera_blog_category_fields');
// Update category fields
add_action( 'edited_blog_category', 'classiera_update_blog_category_fields', 10, 2 );
add_action( 'create_blog_category', 'classiera_update_blog_category_fields', 10, 2 );
define('BLOG_CATEGORY_FIELDS', 'blog_category_fields_option');
function classiera_blog_category_fields($tag) {
	$tag_extra_fields = get_option(BLOG_CATEGORY_FIELDS);
	$category_image = isset( $tag_extra_fields[$tag->term_id]['category_image'] ) ? esc_attr( $tag_extra_fields[$tag->term_id]['category_image'] ) : '';
	?>
	<div class="form-field">
		<table class="form-table">
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="category-page-slider">
						<?php esc_html_e( 'Blog Category Image', 'classiera' ); ?>&nbsp;Size:250x200px:
					</label>
				</th>
				<td>
				<?php
				if(!empty($category_image)) {

					echo '<div style="width: 100%; float: left;"><img id="category_image_img" src="'. $category_image .'" style="float: left; margin-bottom: 20px;" /> </div>';
					echo '<input id="category_image" type="text" size="36" name="category_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="'.$category_image.'" />';
					echo '<input id="category_image_button_remove" class="button" type="button" style="max-width: 140px; float: left; margin-top: 10px;" value="Remove" /> </br>';
					echo '<input id="category_image_button" class="button" type="button" style="max-width: 140px; float: left; margin-top: 10px; display: none;" value="Upload Image" /> </br>';

				} else {

					echo '<div style="width: 100%; float: left;"><img id="category_image_img" src="'. $category_image .'" style="float: left; margin-bottom: 20px;" /> </div>';
					echo '<input id="category_image" type="text" size="36" name="category_image" style="max-width: 200px; float: left; margin-top: 10px; display: none;" value="'.$category_image.'" />';
					echo '<input id="category_image_button_remove" class="button" type="button" style="max-width: 140px; float: left; margin-top: 10px; display: none;" value="Remove" /> </br>';
					echo '<input id="category_image_button" class="button" type="button" style="max-width: 140px; float: left; margin-top: 10px;" value="Upload Image" /> </br>';

				}
				?>
				</td>
				<script>
            var image_custom_uploader;
            jQuery('#category_image_button').click(function(e) {
                e.preventDefault();

                //If the uploader object has already been created, reopen the dialog
                if (image_custom_uploader) {
                    image_custom_uploader.open();
                    return;
                }

                //Extend the wp.media object
                image_custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });

                //When a file is selected, grab the URL and set it as the text field's value
                image_custom_uploader.on('select', function() {
                    attachment = image_custom_uploader.state().get('selection').first().toJSON();
                    var url = '';
                    url = attachment['url'];
                    jQuery('#category_image').val(url);
                    jQuery( "img#category_image_img" ).attr({
                        src: url
                    });
                    jQuery("#category_image_button").css("display", "none");
                    jQuery("#category_image_button_remove").css("display", "block");
                });

                //Open the uploader dialog
                image_custom_uploader.open();
             });

             jQuery('#category_image_button_remove').click(function(e) {
                jQuery('#category_image').val('');
                jQuery( "img#category_image_img" ).attr({
                    src: ''
                });
                jQuery("#category_image_button").css("display", "block");
                jQuery("#category_image_button_remove").css("display", "none");
             });
            </script>
			</tr>
		</table>
	</div>
	<?php
}
function classiera_update_blog_category_fields($term_id) {
	if(isset($_POST['taxonomy'])){
	  if($_POST['taxonomy'] == 'blog_category'):
		$tag_extra_fields = get_option(BLOG_CATEGORY_FIELDS);
		$tag_extra_fields[$term_id]['category_image'] = $_POST['category_image'];
		update_option(BLOG_CATEGORY_FIELDS, $tag_extra_fields);
	  endif;
	}
}
add_filter('deleted_term_taxonomy', 'classiera_remove_blog_category_fields');
function classiera_remove_blog_category_fields($term_id) {
	if(isset($_POST['taxonomy'])){
	  if($_POST['taxonomy'] == 'blog_category'):
		$tag_extra_fields = get_option(BLOG_CATEGORY_FIELDS);
		unset($tag_extra_fields[$term_id]);
		update_option(BLOG_CATEGORY_FIELDS, $tag_extra_fields);
	  endif;
	}
}


/*=================================
Create new widget area for homepage
==================================*/

function new_widget_area_init(){

    register_sidebar( array(
        'name' => 'Homepage Widget Area',
        'id' => 'homepage_widget_area',
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));
}

add_action( 'widgets_init', 'new_widget_area_init' );


/*=================================
Create Featured Horses Widget
==================================*/


// Register and load the widget
function wpb_load_tabswidget() {
    register_widget( 'wpb_widgettabs' );
}
add_action( 'widgets_init', 'wpb_load_tabswidget' );

// Creating the widget
class wpb_widgettabs extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widgettabs',

// Widget name will appear in UI
__('Featured Horses', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Widget for the featured horses', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ){
    echo $args['before_title'] . $title . $args['after_title'];

}else{
     echo $args['before_title'] . " " . $args['after_title'];
}



// This is where you run the code and display the output
?>
<?php

    global $paged, $wp_query, $wp;
?>
<section class="container">
    <div class="row">
        <div class="col-md-9 tabs_sec">
            <ul class="tabs_slider">
              <!--featured listing-->
               <li data-title="FEATURED HORSES">
                    <div class="row fh_list nl_slider">
                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args =
                                array(
                                'post_type' => 'post',
                                'posts_per_page' => 12 ,
                                'paged' => $paged,
                                'cat' => 491,
                                'orderby' => 'date',
                                'order' => 'ASC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>

                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/category/classifieds/horses-ponies/horses-for-sale/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
               <!--New listing-->
                <li data-title="NEW LISTINGS">
                    <div class="row fh_list nl_slider">


                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args =
                                array(
                                'post_type' => 'post',
                                'posts_per_page' => 12 ,
                                'paged' => $paged,
                                'cat' => 491,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>

                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/category/classifieds/horses-ponies/horses-for-sale/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
                <!--Most viewed-->
                 <li data-title="RECENTLY VIEWED">
                    <div class="row fh_list nl_slider">


                            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args =
                                array(
                                'post_type' => 'post',
                                'posts_per_page' => 6,
                                'paged' => $paged,
                                'cat' => 491,
                                'meta_key' => 'wpb_post_views_count',
							    'orderby' => 'meta_value_num',
                                'order' => 'DESC',
                                );
                            $wp_query = new WP_Query($args);
                            while ( have_posts() ) : the_post();
                                get_template_part( 'templates/cava-tab-loop' );?>

                            <?php endwhile; ?>
                    </div>
                    <!--row fh_list fh_slider-->
                    <!--ViewAllButton-->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
							$templateAllPost = 'template-all-posts.php';
							$templateAllPostURL = classiera_get_template_url($templateAllPost);
							?>
                            <a href="<?php echo get_bloginfo('url'). "/category/classifieds/horses-ponies/horses-for-sale/"; ?>" class="btn btn-default all_btn hoverable">
								<span class="h_effect"></span>
								<?php esc_html_e('See All', 'classiera') ?>
							</a>
                        </div>
                    </div>
                    <!--ViewAllButton-->
                </li>
            </ul>
            <!--tabs_slider-->
        </div>
        <!--col-md-9-->
        <?php get_template_part( 'templates/cava-events' );?>
    </div>
    <!--row-->
</section>


<?php echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here


/*=================================
Create Blog Widget
==================================*/


// Register and load the widget
function wpb_load_blogwidget() {
    register_widget( 'wpb_widgetblog' );
}
add_action( 'widgets_init', 'wpb_load_blogwidget' );

// Creating the widget
class wpb_widgetblog extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widgetblog',

// Widget name will appear in UI
__('Blog posts and Advert', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Widget for the block posts and advert area', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ){
    echo $args['before_title'] . $title . $args['after_title'];

}else{
     echo $args['before_title'] . " " . $args['after_title'];
}



// This is where you run the code and display the output
?>
    <?php
	global $redux_demo;
	$classieraBlogSecTitle = $redux_demo['classiera_blog_section_title'];
	$classieraBlogSecDesc = $redux_demo['classiera_blog_section_desc'];
	$classieraBlogSecCount = $redux_demo['classiera_blog_section_count'];
	$classieraBlogSecPOrder = $redux_demo['classiera_blog_section_post_order'];
	$classieraBlogPOrder = $redux_demo['classiera_blog_post_order'];
	$cavalookbookposts = $redux_demo['cava_lookbook_posts'];
	$cavalookblogAds = $redux_demo['cava_blog_adv']['url'];
?>
<?php
	$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',
		'posts_per_page' => $classieraBlogSecCount,
		'order' => $classieraBlogPOrder,
		'orderby' => $classieraBlogSecPOrder,
		'post__not_in' => $cavalookbookposts,
	);
	$blogSecQuery = new WP_Query($args);
?>
<section class="video_sec container">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<ul>
			<?php
			if ( $blogSecQuery->have_posts() ):
				while ( $blogSecQuery->have_posts() ) : $blogSecQuery->the_post();
				$user_ID = $post->post_author;
				$classieradateFormat = get_option( 'date_format' );
			?>
				<li>
					<a href="<?php the_permalink(); ?>">

						<span class="blogTitle"><?php echo the_field('blog_headline'); ?></span>
						<div class="blogthumb" style="background-image:url(<?php echo the_post_thumbnail_url( 'medium' ); ?>)"></div>


					</a>
				</li>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>


		    <li>

		        <?php echo adrotate_group(2); ?>


            </li>
            </ul>
		</div>
	</div>
</section>


<?php echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here



/*=================================
Create Featured listings Widget
==================================*/


// Register and load the widget
function wpb_load_featuredwidget() {
    register_widget( 'wpb_widgetfeatured' );
}
add_action( 'widgets_init', 'wpb_load_featuredwidget' );

// Creating the widget
class wpb_widgetfeatured extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widgetfeatured',

// Widget name will appear in UI
__('Featured Listings', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Widget for the Featured posts', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ){
    echo $args['before_title'] . $title . $args['after_title'];

}else{
     echo $args['before_title'] . " " . $args['after_title'];
}



// This is where you run the code and display the output

	global $redux_demo;
	$premiumSECtitle = $redux_demo['premium-sec-title'];
	$classieraFeaturedCategories = $redux_demo['featured-ads-cat'];
	$classieraPremiumAdsCount = $redux_demo['premium-ads-counter'];
	global $paged, $wp_query, $wp;
	$temp = $wp_query;
	$wp_query= null;
	if($featuredCatOn == 1){
		$arags = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
            'category__not_in' => array( 491 ),
            'orderby' => 'date',
            'order' => 'DESC',
		);
	}else{
		$arags = array(
			'post_type' => 'post',
			'posts_per_page' => 5,
            'category__not_in' => array( 491 ),
            'orderby' => 'date',
            'order' => 'DESC',
			'meta_query' => array(
			array(
				'key' => 'featured_post',
				'value' => '1',
				'compare' => '=='
				)
			),
		);
	}
	$wp_query = new WP_Query($arags);

?>
<section class="featured_list">
	<div class="container">
		<ul>
			<?php
			while ($wp_query->have_posts()) : $wp_query->the_post();
			$post_price = get_post_meta($post->ID, 'post_price', true);
			$post_phone = get_post_meta($post->ID, 'post_phone', true);
			$theTitle = get_the_title();
			$postCatgory = get_the_category( $post->ID );
			$categoryLink = get_category_link($catID);
			$classieraPostAuthor = $post->post_author;
			$classieraAuthorEmail = get_the_author_meta('user_email', $classieraPostAuthor);
			$classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
			$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<figure>
						<?php
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
						}?>
						<p class="arrow-btn1"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/next_disabled-btn.png" alt="image"></p>
					</figure>
					<div class="featured-title">
						<span class="thetitle"><?php echo $theTitle; ?></span>
						<div class="theprice featured">
						<?php
						if(is_numeric($post_price)){
							echo classiera_post_price_display($post_currency_tag, $post_price);
						}else{
							echo $post_price;
						}
						?>
						</div>
					</div>
				</a>
			</li>
			<?php endwhile;?>
			<?php wp_reset_query();?>
		</ul>
	</div><!--container-->
</section><!--featured_list-->

<?php echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here


/*=================================
Popular Categories Widget
==================================*/


// Register and load the widget
function wpb_load_popularwidget() {
    register_widget( 'wpb_widgetpopular' );
}
add_action( 'widgets_init', 'wpb_load_popularwidget' );

// Creating the widget
class wpb_widgetpopular extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widgetpopular',

// Widget name will appear in UI
__('Popular Categories', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Widget for the popular categories', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ){
    echo $args['before_title'] . $title . $args['after_title'];

}else{
     echo $args['before_title'] . " " . $args['after_title'];
}


?>
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
<!--		<h2><?php //echo $classieraCatSECTitle; ?></h2>-->
		<ul>

			<?php

    foreach ($cavacatsinclude as $value) {


			$categories = get_terms('category', array(
                    'child_of' => $value,
					'number' => 3,
					'order'=> 'ASC',
                    'hide_empty' => 1,

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
				$categories = get_categories('child_of=>'.$catName);
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
						<p><strong class="hoverable"><span class="h_effect"></span><?php echo $classieraTotalPosts;?> <?php esc_html_e( 'ads posted', 'classiera' ); ?></strong></p>
					</div>
				</a>
			</li>
			<?php } }?>

		</ul>
	</div><!--container-->
</section>

<?php echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here



/*=================================
Lookbook Widget
==================================*/


// Register and load the widget
function wpb_load_lookbookwidget() {
    register_widget( 'wpb_widgetlookbook' );
}
add_action( 'widgets_init', 'wpb_load_lookbookwidget' );

// Creating the widget
class wpb_widgetlookbook extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widgetlookbook',

// Widget name will appear in UI
__('Lookbooks', 'wpb_widget_domain'),

// Widget description
array( 'description' => __( 'Widget for the lookbooks', 'wpb_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) ){
    echo $args['before_title'] . $title . $args['after_title'];

}else{
     echo $args['before_title'] . " " . $args['after_title'];
}


 ?>
<?php
	global $redux_demo;
	$cavalookbooktitle = $redux_demo['cava_lookbook_title'];
	$cavalookbookposts = $redux_demo['cava_lookbook_posts'];
	/*$tax_query = array();
	foreach($cavalookbookposts as $key => $catID){
		$tax_query .= array(
			'taxonomy' => 'blog_category',
			'field' => 'term_id',
			'terms' => $catID,
		);
	}
	//print_r($tax_query);*/
?>
<?php
	/*$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',
		'posts_per_page' => 5,
		'tax_query' => array($tax_query)
	);*/
	$args = array (
		'post_type' => array('blog','blog_posts'),
		'post_status' => 'publish',
		'post__in' => $cavalookbookposts,
        'posts_per_page' => -1,
	);
	$blogSecQuery = new WP_Query($args);
	//print_r($args);
?>
<section class="lookbooks">
<!--	<h2><?php //echo $cavalookbooktitle; ?></h2>-->
	<ul class="lookbooks-slider">
		<?php
		if ( $blogSecQuery->have_posts() ):
			while ( $blogSecQuery->have_posts() ) : $blogSecQuery->the_post();
			$user_ID = $post->post_author;
			$classieradateFormat = get_option( 'date_format' );
		?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<figure>
					<?php
					if( has_post_thumbnail()){
						echo get_the_post_thumbnail();
					}
					?>
				</figure>
				<div>
					<h3><?php the_title(); ?></h3>
					<p><?php echo get_the_date($classieradateFormat, $post->ID); ?></p>
					<p class="lb_btn hoverable">
						<span class="h_effect"></span>
						<?php esc_html_e( 'Lookbooks', 'classiera' ); ?>
					</p>
				</div>
			</a>
		</li>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</section>



<?php echo $args['after_widget'];


}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here







/*
Plugin Name: Custom Profile Fields
Plugin URI:
Description:
Version: 0.1
Author: Ivan Rodrigues
Author URI:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/



add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );

function crf_show_extra_profile_fields( $user ) {
	$bussiness_name = get_the_author_meta( 'business_name', $user->ID );
	?>
	<h3><?php esc_html_e( 'Business Information', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="business_name"><?php esc_html_e( 'Business Name', 'crf' ); ?></label></th>
			<td>
				<input type="text"
			       id="business_name"
			       name="business_name"
			       value="<?php echo esc_attr( $bussiness_name ); ?>"
			       class="regular-text"
				/>
			</td>
		</tr>
	</table>
	<?php
}


add_action( 'personal_options_update', 'crf_update_profile_fields' );
add_action( 'edit_user_profile_update', 'crf_update_profile_fields' );

function crf_update_profile_fields( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	if ( ! empty( $_POST['business_name'] ) ) {
		update_user_meta( $user_id, 'business_name', $_POST['business_name'] );
	}
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    return $fields;
}


/*
 * Description: Ajax Auth Processing
 * Author: Yegor Sidorkin
 * State: start
 */
function wp_nonce_field_without_id( $action = -1, $name = "_wpnonce", $referer = true , $echo = true ) {
	$name = esc_attr( $name );
	$nonce_field = '<input type="hidden" name="' . $name . '" value="' . wp_create_nonce( $action ) . '" />';

	if ( $referer )
		$nonce_field .= wp_referer_field( false );

	if ( $echo )
		echo $nonce_field;

	return $nonce_field;
}
function ajax_auth_init(){

    wp_register_script('ajax-auth-script', get_stylesheet_directory_uri() . '/js/ajax-auth-script.js', array('jquery') );
    wp_enqueue_script('ajax-auth-script');
    wp_register_script('bootstrap-show-password', get_stylesheet_directory_uri() . '/js/bootstrap-show-password.min.js', array('jquery') );
    wp_enqueue_script('bootstrap-show-password');
    
    wp_enqueue_style( 'font', 'https://fonts.googleapis.com/css?family=Kaushan+Script|Lato:300,400,700|Roboto:300,400,500,700,900' );

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array(
        'loading_message' => __('Processing, please wait...')
    ));

    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
    
    add_action( 'wp_ajax_nopriv_ajaxforgot', 'ajax_forgot' );
    check_change_password_page_exist();
        
    add_action( 'wp_ajax_nopriv_ajaxjoin', 'ajax_join' );
    check_verification_email_codes_table_exist();
    
    add_action( 'wp_ajax_nopriv_ajaxjoinverification', 'ajax_joinverification' );
    
    add_action( 'wp_ajax_nopriv_ajaxresendconfirmation', 'ajax_resendconfirmation' );
    
}

function ajax_login() {

    global $wpdb;
    $status = true;
    $errors  = [];
    
    $do_check = check_ajax_referer( 'ajax-auth-nonce', 'auth-nonce', false );
    if ( ! $do_check ) {
        $status = false;
		$message =  __( 'Security check.' );
        $errors[] = $message;
        echo json_encode(
            array(
                'status'  => $status,
                'message' => $message,
                'errors'  => $errors
            )
        );
        die();
    }

    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $remember = ($_POST['remember'] == 'true') ? true : false;
    $referer = $_POST['referer'];
    
    if ( empty( $email ) ) {
        $status = false;
        $message =  __( 'The email field is empty.' );
        $errors[] = $message;
    } elseif ( ! is_email( $email ) ) {
        $status   = false;
        $message  = 'Invalid email address.';
        $errors[] = $message;
    }
    if ( empty( $password ) ) {
        $status = false;
        $message =  __( 'The password field is empty.' );
        $errors[] = $message;
    }
    
    if ( $status ) {
        $info = array();
        $info['user_login'] = $email;
        $info['user_password'] = $password;
        $info['remember'] = $remember;

        $user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){
            $status = false;
            $message =  __( 'Wrong email or password.' );
            $errors[] = $message;
        } else {
            $message =  __( 'You are successfully logged in, redirecting...' );
        }
    }

    echo json_encode(
        array(
            'status' => $status,
            'message' => $message,
            'errors'  => $errors,
            'referer' => $referer
        )
    );
    die();
}

function ajax_forgot(){

    global $wpdb;
    $status = true;
    $message = __( 'Check your email or spam/junk for new password.' );
    $errors  = [];
    
    $do_check = check_ajax_referer( 'ajax-auth-nonce', 'auth-nonce', false );
    if ( ! $do_check ) {
        $status = false;
		$message =  __( 'Security check.' );
        echo json_encode(
            array(
                'status' => $status,
                'message' => $message,
                'errors'  => $errors,
            )
        );
        die();
    }

    $email = $wpdb->escape($_POST['email']);
    $referer = $_POST['referer'];
    
    if ( empty( $email ) ) {
        $status = false;
        $message =  __( 'The email field is empty.' );
        $errors[] = $message;
    } elseif ( ! is_email( $email ) ) {
        $status   = false;
        $message  = 'Invalid email address.';
        $errors[] = $message;
    }
    
    if ( $status ) {
	  	$user = get_user_by( 'email', $email );
        if ( !empty( $user ) ) {
            $user_id    = $user->ID;
            $user_login = $user->user_login;
			$new_password = wp_generate_password( 12, false );
			wp_set_password( $new_password, $user_id );
            
            $user = get_user_by( 'email', $email );
            $hash = md5( $email . $user->user_pass );
        
			classiera_reset_password($new_password, $user_login, $email, $hash);
	    } else {
            $status  = false;
			$message =  __( 'There is no user available for this email.' );
			$message =  __( 'Invalid email address.' );
            $errors[] = $message;
	    }
	}

    echo json_encode(
        array(
            'status' => $status,
            'message' => $message,
            'errors'  => $errors,
            'referer' => $referer
        )
    );

    die();
}
function check_change_password_page_exist() {
    $page_title = 'Change Password';
    $page_path  = 'change-password';
    $page_by_title = get_page_by_title( $page_title );
    $page_by_path = get_page_by_path( $page_path, OBJECT );
    if ( empty($page_by_title) || empty($page_by_path) ) {
        $page = array(
            'post_type' => 'page',
            'post_title' => $page_title,
            'post_content' => '<div class="alert alert-info"><strong>Info!</strong> Verification you information... Wait for redirection.</div>',
            'post_status' => 'publish',
            'post_author' => 0,
            'post_slug' => $page_path
        );
        $page_id = wp_insert_post($page);
        update_post_meta( $page_id, '_wp_page_template', 'template-change-password.php' );
    }
    return true;
}

function ajax_join(){

    global $wpdb;
    $status  = true;    
    $errors  = [];
    
    $do_check = check_ajax_referer( 'ajax-auth-nonce', 'auth-nonce', false );
    if ( ! $do_check ) {
        $status   = false;
		$message  =  __( 'Security check.', 'classiera' );
        $errors[] = $message;
        echo json_encode(
            array(
                'status'  => $status,
                'message' => $message,
                'errors'  => $errors
            )
        );
        die();
    }
    
    $first_name = $wpdb->escape($_POST['first_name']);
    $last_name = $wpdb->escape($_POST['last_name']);
    $full_name = trim($first_name . ' ' . $last_name);
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $have_code = ($_POST['have_code'] == 'true') ? true : false;
    $confirm_password = $wpdb->escape($_POST['confirm_password']);
    
    if ( empty( $first_name ) ) {
        $status   = false;
		$message  =  __( 'The first name field is empty.' );
        $errors[] = $message;
	}
    if ( empty( $last_name ) ) {
        $status   = false;
		$message  =  __( 'The last name field is empty.' );
        $errors[] = $message;
	}
    if ( empty( $email ) ) {
        $status   = false;
		$message  =  __( 'The email field is empty.' );
        $errors[] = $message;
	} elseif ( ! is_email( $email ) ) {
        $status   = false;
        $message  = 'Invalid email address.';
        $errors[] = $message;
    } else {
        $user = get_user_by( 'email', $email );
        if ( !empty( $user ) ) {
            $status   = false;
            $message  =  __( 'This email address has previously been used to join Cavalletti. Please log into your account.', 'classiera' );
            $errors[] = $message;
	    }
    }
    if ( !empty( $password ) && !empty( $confirm_password ) ) {
        if ( strlen($password) < 5 || strlen($password) > 15 ) {
            $status   = false;
			$message  =  __( 'Password must be 5 to 15 characters in length.', 'classiera' );
			$errors[] = $message;
			
		} elseif ( $password != $confirm_password ) {
			$status   = false;
			$message  =  __( 'Passwords mismatch', 'classiera' );
            $errors[] = $message;
		}
    } else {
        if ( empty( $password ) ) {
            $status   = false;
            $message  =  __( 'The password field is empty.' );
            $errors[] = $message;
        }
        if ( empty( $confirm_password ) ) {
            $status   = false;
            $message  =  __( 'The confirm password field is empty.' );
            $errors[] = $message;
        }
    }
    
    if ( $status && ! $have_code ) {
        $message = __( 'Please verify your email address so you can sign in to your Cavalletti account. We’ve sent a confirmation email to ' . $email, 'classiera' );
        $table_name = $wpdb->prefix.'verification_email_codes';
        $code = wp_generate_password( 5, false );
        $verification_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE email = %s", $email));
        if ( $verification_id ) {
            $wpdb->update( $table_name,
                array( 'code' => $code ),
                array( 'id' => $verification_id )
            );
        } else {
            $wpdb->insert( $table_name,
                array( 'email' => $email, 'code' => $code )
            );
        }
        classieraUserEmailVerification( $email, $full_name, $code );
    } else {
        $message = __( 'Please enter your code at next step.' );
    }
    
    echo json_encode(
        array(
            'status'  => $status,
            'email'   => $email,
            'message' => $message,
            'errors'  => $errors
        )
    );

    die();
}
function check_verification_email_codes_table_exist() {
    global $wpdb;
    $table_name = $wpdb->prefix.'verification_email_codes';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
         $charset_collate = $wpdb->get_charset_collate();
         $sql = "CREATE TABLE $table_name (
              id bigint(20) NOT NULL AUTO_INCREMENT,
              email text NOT NULL,
              code text NOT NULL,
              PRIMARY KEY id (id)
         ) $charset_collate;";
         require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
         dbDelta( $sql );
    }
    return true;
}

function ajax_joinverification() {
    
    global $wpdb;
    $status  = true;
    $message = __( 'Your email successfully verified. Thank you.', 'classiera' );
    $errors  = [];
    
    $do_check = check_ajax_referer( 'ajax-auth-nonce', 'auth-nonce', false );
    if ( ! $do_check ) {
        $status   = false;
		$message  =  __( 'Security check.', 'classiera' );
        $errors[] = $message;
        echo json_encode(
            array(
                'status'  => $status,
                'message' => $message,
                'errors'  => $errors
            )
        );
        die();
    }
    
    $first_name = $wpdb->escape($_POST['first_name']);
    $last_name  = $wpdb->escape($_POST['last_name']);
    $full_name  = trim($first_name . ' ' . $last_name);
    $email      = $wpdb->escape($_POST['email']);
    $password   = $wpdb->escape($_POST['password']);
    $confirm_password = $wpdb->escape($_POST['confirm_password']);
    $code = $wpdb->escape($_POST['code']);
    
    if ( empty( $code ) ) {
        $status = false;
		$message =  __( 'Verification code cannot be empty.', 'classiera' );
        $errors[] = $message;
	}
    if ( empty( $first_name ) ) {
        $status   = false;
		$message  =  __( 'The first name field is empty.' );
        $errors[] = $message;
	}
    if ( empty( $last_name ) ) {
        $status   = false;
		$message  =  __( 'The last name field is empty.' );
        $errors[] = $message;
	}
    if ( empty( $email ) ) {
        $status   = false;
		$message  =  __( 'The email field is empty.' );
        $errors[] = $message;
	} elseif ( ! is_email( $email ) ) {
        $status   = false;
        $message  = 'Invalid email address.';
        $errors[] = $message;
    } else {
        $user = get_user_by( 'email', $email );
        if ( !empty( $user ) ) {
            $status   = false;
            $message  =  __( 'This email address has previously been used to join Cavalletti. Please log into your account.', 'classiera' );
            $errors[] = $message;
	    }
    }
    if ( !empty( $password ) && !empty( $confirm_password ) ) {
        if ( strlen($password) < 5 || strlen($password) > 15 ) {
            $status   = false;
			$message  =  __( 'Password must be 5 to 15 characters in length.', 'classiera' );
			$errors[] = $message;
			
		} elseif ( $password != $confirm_password ) {
			$status   = false;
			$message  =  __( 'Passwords mismatch', 'classiera' );
            $errors[] = $message;
		}
    } else {
        if ( empty( $password ) ) {
            $status   = false;
            $message  =  __( 'The password field is empty.' );
            $errors[] = $message;
        }
        if ( empty( $confirm_password ) ) {
            $status   = false;
            $message  =  __( 'The confirm password field is empty.' );
            $errors[] = $message;
        }
    }
    
    if ( $status ) {
        $table_name = $wpdb->prefix.'verification_email_codes';
        $verification_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE email = %s AND code = %s", $email, $code));
        if ( ! $verification_id ) {
            $status   = false;
            $message  =  __( 'Incorrect verification code', 'classiera' );
            $errors[] = $message;
        } else {
            $wpdb->delete( $table_name, array( 'id' => $verification_id ) );
            
            $user_id = wp_create_user( $full_name, $password, $email );
            if ( is_wp_error( $user_id ) ) {
                $status   = false;
                $message  =  esc_html__( 'Something wrong. Please try again.', 'classiera' );
                $errors[] = $message;
            } else {
                update_user_meta( $user_id, 'first_name', $first_name);
                update_user_meta( $user_id, 'last_name', $last_name);
                
                classieraUserNotification( $email, $password, $full_name );			
                global $redux_demo;
                $newUsernotification = $redux_demo['newusernotification'];
                if ( $newUsernotification == 1 ) {
                    classieraNewUserNotifiy( $email, $full_name );	
                }
            }
        }
    }
    
    echo json_encode(
        array(
            'status'  => $status,
            'message' => $message,
            'errors'  => $errors
        )
    );
    die();
    
}

function ajax_resendconfirmation() {

    global $wpdb;
    $status  = true;
    $message = __( 'Successfully sent confirmation email.', 'classiera' );
    $errors  = [];
    
    $do_check = check_ajax_referer( 'ajax-auth-nonce', 'auth-nonce', false );
    if ( ! $do_check ) {
        $status   = false;
		$message  =  __( 'Security check.', 'classiera' );
        $errors[] = $message;
        echo json_encode(
            array(
                'status'  => $status,
                'message' => $message,
                'errors'  => $errors
            )
        );
        die();
    }

    
    $email = $wpdb->escape($_POST['email']);
    
    if ( empty( $email ) ) {
        $status   = false;
		$message  =  __( 'The email field is empty.' );
        $errors[] = $message;
	} elseif ( ! is_email( $email ) ) {
        $status   = false;
        $message  = 'Invalid email address.';
        $errors[] = $message;
    } else {
        $user = get_user_by( 'email', $email );
        if ( !empty( $user ) ) {
            $status   = false;
            $message  =  __( 'This email address has previously been used to join Cavalletti. Please log into your account.', 'classiera' );
            $errors[] = $message;
	    }
    }
    
    if ( $status ) {
		$table_name = $wpdb->prefix.'verification_email_codes';
        $code = wp_generate_password( 5, false );
        $verification_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE email = %s", $email));
        if ( $verification_id ) {
            $wpdb->update( $table_name,
                array( 'code' => $code ),
                array( 'id' => $verification_id )
            );
        } else {
            $wpdb->insert( $table_name,
                array( 'email' => $email, 'code' => $code )
            );
        }
        classieraUserEmailVerification( $email, $full_name, $code );
    }
    
    echo json_encode(
        array(
            'status'  => $status,
            'email'   => $email,
            'message' => $message,
            'errors'  => $errors
        )
    );

    die();
}

if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
/*
 * Description: Ajax Auth Processing
 * Author: Yegor Sidorkin
 * State: end
 */


