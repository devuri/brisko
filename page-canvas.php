<?php
/**
 * Template Name: Brisko Canvas.
 *
 * The template for displaying the Brisko Canvas Page.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */
get_header( 'canvas' );

do_action( 'brisko_page_header' ); ?>
<main id="primary" class="full-width-template bg-white">
<?php
	 // Page content
	while ( have_posts() ) {
		the_post();
			get_template_part( 'template-parts/content', 'full-width' );
		if ( comments_open() || get_comments_number() ) {
			comments_template();
	 	}
	}

?>
</main><!-- #main -->
<?php
do_action( 'brisko_page_footer' );

get_footer( 'canvas' );
