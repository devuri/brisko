<?php
/**
 * Template Name: Brisko Home Page.
 *
 * The template for displaying the Brisko Home Page.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head( 'page' );
// Add a slider.
do_action( 'brisko_home_page_slider' );

// Page content
while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/content', 'page' );
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
}

brisko_layout_footer( 'page' );

get_footer();
