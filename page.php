<?php
/**
 * The template for displaying the pages.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head( 'page' );

	// Page content
	while ( have_posts() ) {
		the_post();
		$post_id = get_the_ID();
		do_action( "brisko_page_{$post_id}" );
		get_template_part( 'template-parts/content', 'page' );
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}

brisko_layout_footer( 'page' );

get_footer();
