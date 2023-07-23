<?php
/**
 * Template Name: Brisko Canvas.
 *
 * The template for displaying the Brisko Canvas Page.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */
get_header( 'canvas' );

brisko_layout_head( 'canvas' );

	// Page content
	while ( have_posts() ) {
		the_post();
			get_template_part( 'template-parts/content', 'full-width' );
		if ( comments_open() || get_comments_number() ) {
			comments_template();
	 	}
	}

brisko_layout_footer( 'page' );

get_footer( 'canvas' );
