<?php
/**
 * Template Name: Brisko Full Width.
 *
 * The template for displaying the Brisko Full Width Page.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head( 'full-width' );

// Page content
while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/content', 'full-width' );
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
}

brisko_layout_footer( 'page' );

get_footer();
