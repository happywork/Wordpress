<?php
/**
 * Template name: Place Advert Business Category
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
get_header(); 
global $redux_demo; 
if ( !is_user_logged_in() ) {
	
	$login = $redux_demo['login'];
	wp_redirect( $login ); exit;
}

?>

    <section class="banner-cont">
        <div class="container">
            <h2>Promote your Business</h2>
            <p>Get results for your business by advertising on Cavalletti.</p>
            <p>Cavalleti is a leader in equestrian advertising with 500, 000 page views and 65,000 users a month.</p>
        </div>
    </section>

    <section class="business-category">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="b-cat-box">
                        <h2>Select a business services category</h2>
                        <div class="b-cat-buttons">
                            <div class="b-btn">
                                <a href="#">
                                	Business Directory
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Attract more customers by listing your business in our Business Directory. At only $11 per month, it's excellent value.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Studs &amp Stallions
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Your stallion, stud services and youngstock deserve to get noticed. Put them in front of thousands of prospects with a 6 month directory listing starting at just $11 per month.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Agistment
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>The perfect place to showcase your agistment facilities and promote your services. A Directory listing costs $70 for 6 months.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Employment
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Looking for the perfect addition to your team? Advertise your job opportunity to the equine industry to find the right candidate. </p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Lookbooks
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>A brand new feature, showcasing all the latest equestrian looks and you can be a part of it! Highlight your new seasonal ranges, product launches and emerging trends in the Cavalletti Lookbook for $120 per feature. Listed on the home page for 1 month and listed in our Lookbook directory for at least 12 months (or an agreed timeframe).</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Banner Advertising
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Want the kind of online traffic we get 24/7 on Cavalletti? Get more clicks, leads and sales with a targeted, professionally designed banner ad. Starting from $80 per month. </p>
                                </div>
                            </div>
                        </div>
                        <!--/b-cat-buttons-->
                    </div>
                    <!--/b-cat-box-->
                    <div class="business-btn">
                        <a class="hoverable" href="<?php echo get_bloginfo('url'); ?>/place-an-advert/"><span class="h_effect"></span>GO BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>