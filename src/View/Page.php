<?php

namespace Brisko\View;

use Brisko\Theme;

class Page extends Layout
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
			get_template_part( 'template-parts/content', 'page' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;

		$this->footer();
	}

	/**
	 * Head section
	 */
	public function head() {
		brisko_page_header();
		get_template_part( 'template-parts/head', 'page' );
	}

	/**
	 * Footer section
	 */
	public function footer() {
		?>
			</main><!-- #main -->
		<?php
		brisko_page_footer();
	}
}
