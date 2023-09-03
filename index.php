<?php

/**
 * The main template file.
 *
 * The template for displaying the Brisko Home Page.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head( 'archive' );

// Index Page content
if ( have_posts() ) {
    if ( is_home() && ! is_front_page() ) { ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php
    }
    while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content', get_post_type() );
    }
    brisko_posts_navigation();
} else {
    get_template_part( 'template-parts/content', 'none' );
}

brisko_layout_footer();

get_footer();
