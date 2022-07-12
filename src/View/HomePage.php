<?php

namespace Brisko\View;

use Brisko\Layout;

class HomePage extends Layout
{
	/**
	 * Display content.
	 */
	public function view()
	{
		$this->head();

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

		$this->footer();
	}

	/**
	 * Head section.
	 */
	public function head()
	{
		do_action( 'brisko_page_header' );
		get_template_part( 'template-parts/head', 'page' );
	}

	/**
	 * Footer section.
	 */
	public function footer()
	{
		?>
			</main><!-- #main -->
		<?php
		do_action( 'brisko_page_footer' );
	}
}
