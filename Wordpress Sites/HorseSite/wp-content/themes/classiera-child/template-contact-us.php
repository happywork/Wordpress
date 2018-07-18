<?php
/**
 * Template name: Contact Us
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
get_header(); ?>

    <section class="contact-hero"></section>

    <div class="contact-blurb">
        <div class="contact-header">
            <h1>Contact Form</h1>
            <p>Use the form below and send us an e-mail. Old fashioned phone calls work too</p>
            <p>0416 224 680</p>
        </div>
    </div>
    <div class="pointer-wrap">
        <svg class="pointer" xmlns="https://www.w3.org/2000/svg" version="1.1" width="100%" viewBox="0 0 100 102" preserveAspectRatio="none">
	        <path d="M0 0 L50 100 L100 0 Z"></path>
        </svg>
    </div>

    <section class="contact-form-section">
        <!--get page content-->

        <div class="container">
            <div class="row">
                <div class="main-form">
                    <?php echo do_shortcode( '[contact-form-7 id="1176" title="Contact form"]' ); ?>
                </div>
            </div>
        </div>



    </section>










    <?php get_footer(); ?>