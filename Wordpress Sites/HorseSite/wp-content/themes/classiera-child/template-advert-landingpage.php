<?php
/**
 * Template name: Place an advert
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


?>

    <section class="pricing-advert">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h3>REACH TENS OF THOUSANDS OF HORSE PEOPLE ON AUSTRALIA'S FIRST ONLINE EQUINE MARKETPLACE</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-advert adv-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="price-box" data-placement="right"  data-html="true"  data-toggle="popover" title="Classified Categories" data-content="<ul class=popover-ul><li>Horses &amp Ponies</li><li>Transport</li><li>Pets &amp Livestock</li><li>Real Estate</li><li>Secondhand Saddlery</li><li>Wanted</li></ul>">
                        <h2>Place a Classified Advertisement</h2>
                        <figure><img class="price-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon1.png" alt="image"><img class="price-icon-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon1hover.png" alt="image"></figure>
                        <h2>From $25</h2>
                        <p>Secondhand saddlery &amp wanted adverts are free.</p>
                        <a class="hoverable" href="<?php echo get_bloginfo('url'); ?>/place-an-advert-classified-category/"><span class="h_effect"></span>START</a>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-box">
                        <h2>List &amp Manage An Equestrian Event</h2>
                        <figure><img class="price-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon2.png" alt="image"><img class="price-icon-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon2hover.png" alt="image"></figure>
                        <h2>Free</h2>
                        <p>Add your event to our calendar for free.</p>
                        <a class="hoverable" href="<?php echo get_bloginfo('url'); ?>/#/"><span class="h_effect"></span>START</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-box" data-placement="left"  data-html="true"  data-toggle="popover" title="Get Started with Cavalletti for Bussiness" data-content="<ul class=popover-ul><li>Business Directory</li><li>Studs &amp Stallions</li><li>Agistment</li><li>New Products</li><li>Employment</li><li>Website Builder</li><li>Lookbooks</li><li>Banner Advertising</li><li>Editorial</li></ul>">
                        <h2>Promote &amp Grow Your Horse Business</h2>
                        <figure><img class="price-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon3.png" alt="image"><img class="price-icon-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pricing-icon3hover.png" alt="image"></figure>
                        <h2>From $11/ a Month</h2>
                        <p>If we could add some content here for this would be great.</p>
                        <a class="hoverable" href="<?php echo get_bloginfo('url'); ?>/place-an-advert-business-category/"><span class="h_effect"></span>START</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>
jQuery(document).ready(function(){
    
   jQuery("[data-toggle=popover]").popover({ trigger: "hover" });
    
    
    jQuery(".col-md-4").on("click",function(){
         
         var link = jQuery(this).find("a").attr("href");
         window.location = link;
         
    });

});
</script>
    <?php get_footer(); ?>