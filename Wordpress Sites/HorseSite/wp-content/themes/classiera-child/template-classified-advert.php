<?php
/**
 * Template name: Place Advert Classified Category
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
            <h2>Place an Advert</h2>
            <p>Advertise everything equestrian on the Cavalletti Equine Marketplace.</p>
            <p>65.000 people are searching our website or horses, floats, properties and saddlery every month.</p>
        </div>
    </section>

    <section class="business-category">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="b-cat-box">
                        <h2>Select a classified category</h2>
                        <div class="b-cat-buttons">
                            <div class="b-btn">
                                <a href="<?php echo get_bloginfo('url'); ?>/place-an-advert-classified-category/horses-ponies-advert/">
                                	Horses &amp Ponies
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Find the perfect home for your horse for just $25 until sold. Our online tools make selling quicker, safer and easier.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Transport
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>It’s only $25 to list your float, gooseneck, truck, towing vehicle, farm machinery or horse drawn vehicle until sold.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Real Estate
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Promote your horse property or rural oasis to the equestrian market. Just $25 until the SOLD sticker goes up. Excellent value! </p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Secondhand Saddlery 
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>It’s free to advertise second-hand saddles, bridles, rugs, clothing and unwanted tack on the Cavalletti Marketplace. </p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Pets &amp Livestock
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Horse people are animal lovers. Sell your pets and livestock on Cavalletti for just $25 until sold.</p>
                                </div>
                            </div>
                            <div class="b-btn">
                                <a href="#">
                                	Wanted
                                    <span></span>
                                </a>
                                <div class="business-pop">
                                    <p>Looking for a new equine partner or a job in the equestrian industry? Needing agistment, transport, information or a specific piece of tack. Place your wanted ad for free!</p>
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