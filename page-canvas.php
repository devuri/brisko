<?php
/**
* Template Name: Brisko Canvas
*
*
* @package brisko
*/
get_header('canvas'); ?>
<?php brisko_page_header() ?>
<main id="primary" class="full-width-template bg-white">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'full-width' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; ?>
	</main><!-- #main -->
<?php brisko_page_footer() ?>
<?php get_footer('canvas');
