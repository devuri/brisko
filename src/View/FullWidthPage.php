<?php

namespace Brisko\View;

class FullWidthPage extends Layout
{

	/**
	 * Display content
	 */
	public function view() {

		$this->head();

		/**
		 * Page content
		 */
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'full-width' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;

		$this->footer();
	}

	/**
	 * Head section
	 */
	public static function head() {
		brisko_page_header(); ?>
		<main id="primary" class="full-width-template">
		<?php
	}

	/**
	 * Footer section
	 */
	public static function footer() {
		?>
			</main><!-- #main -->
		<?php
		brisko_page_footer();
	}
}
