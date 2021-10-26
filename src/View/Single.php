<?php

namespace Brisko\View;

use Brisko\Brisko;
use Brisko\Layout;

class Single extends Layout
{

	/**
	 * Display content
	 */
	public function view() {

		$this->head();

		do_action( 'brisko_post_header' );

		/**
		 * Post content
		 */
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'single' );

			// releated.
			Brisko::related_content();

			// custom action .
			do_action( 'brisko_after_post_content' );

			// the_post_navigation.
			if ( get_theme_mod( 'display_previous_next', 1 ) ) {
				self::post_navigation();
			}

			do_action( 'brisko_before_comments' );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			do_action( 'brisko_after_comments' );

		endwhile;

		$this->footer();
	}

	/**
	 * Head section
	 *
	 * @return void
	 * @link https://developer.wordpress.org/reference/functions/get_template_part/
	 */
	public function head() {

		// check if sidebar or not .
		$no_sidebar      = sanitize_html_class( 'col-md' );
		$sidebar         = sanitize_html_class( 'col-md-8' );
		$sidebar_display = ( ( $this->disable_sidebar() ) ? $no_sidebar : $sidebar );

		// params .
		$args = array( 'content_class' => $sidebar_display );
		get_template_part( 'template-parts/head', 'blog', $args );

	}

	/**
	 * The Post Navigation
	 */
	public function post_navigation() {
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
			)
		);
	}

}
