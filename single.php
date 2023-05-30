<?php
/**
 * The template for displaying a single post item.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head();

do_action( 'brisko_post_header' );

// Post content
while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/content', 'single' );

	/*
	 * Related Content.
	 *
	 * Adds Related Content in Brisko Plugin.
	 *
	 * Includes "get_post()" Retrieves post object.
	 *
	 * @see https://developer.wordpress.org/reference/functions/get_post/
	 * @see https://gist.github.com/devuri/b0a86f75a86abfcdd7d41ed05e99de73
	 */
	do_action( 'brisko_related_content', get_post() );

	// custom action .
	do_action( 'brisko_after_post_content' );

	// the_post_navigation.
	if ( get_theme_mod( 'display_previous_next', 1 ) ) {
		the_post_navigation(
            [
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
            ]
        );
	}

	do_action( 'brisko_before_comments' );

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	do_action( 'brisko_after_comments' );
}

brisko_layout_footer();

get_footer();
