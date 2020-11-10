<?php

namespace Brisko;

use Brisko\Traits\Singleton;
use Brisko\Contracts\View;

/**
 * The main theme Layout class.
 *
 * We will use this as the base for all main views.
 *
 * @package brisko
 */
class Layout implements View
{

	use Singleton;

	/**
	 * Layout background
	 *
	 * @return string
	 */
	public function main_class() {
		return 'bg-white';
	}

	/**
	 * Display content
	 * this here for PHP compatability, will be declared in child class.
	 */
	public function view() {
		// return the view .
	}

	/**
	 * Disabled Sidebar.
	 */
	public function disable_sidebar() {

		if ( 1 === get_theme_mod( 'disable_sidebar', false ) ) {
			return true;
		}
		return false;
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
	 * Get the sidebar.
	 */
	public function sidebar() {

		if ( $this->disable_sidebar() ) {
			return false;
		}
		get_template_part( 'template-parts/sidebar' );

	}

	/**
	 * Footer section
	 */
	public function footer() {
		?>
		</div><!-- col 8 -->
				<?php $this->sidebar(); ?>
			</div><!-- row -->
		</main><!-- #main -->
		<?php
	}
}
