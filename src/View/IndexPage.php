<?php

namespace Brisko\View;

use Brisko\Layout;

class IndexPage extends Layout
{

	/**
	 * Display content
	 */
	public function view() {

		$this->head();

		/**
		 * Index Page content
		 */
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
				brisko_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
		endif;

			$this->footer();
	}

	/**
	 * Head section
	 */
	public function head() {

		// check if sidebar or not .
		$no_sidebar      = sanitize_html_class( 'col-md' );
		$sidebar         = sanitize_html_class( 'col-md-8' );
		$sidebar_display = ( ( $this->disable_sidebar() ) ? $no_sidebar : $sidebar );

		// params .
		$args = array( 'content_class' => $sidebar_display );
		get_template_part( 'template-parts/head', 'archive', $args );
	}

}
