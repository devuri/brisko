<?php

namespace Brisko\View;

use Brisko\Theme;

abstract class Layout
{
	/**
	 * Layout background
	 *
	 * @return string
	 */
	public static function main_class() {
		return 'bg-white';
	}

	/**
	 * Display content
	 * this here for PHP compatability, will be declared in child class.
	 */
	public static function view() {
		// return the view .
	}

	/**
	 * Disabled Sidebar.
	 */
	public static function is_disabled() {

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
	public static function head() {

		// check if sidebar or not .
		$no_sidebar      = sanitize_html_class( 'col-md' );
		$sidebar         = sanitize_html_class( 'col-md-8' );
		$sidebar_display = ( ( self::is_disabled() ) ? $no_sidebar : $sidebar );

		// params .
		$args = array( 'content_class' => $sidebar_display );
		get_template_part( 'template-parts/head', 'blog', $args );

	}

	/**
	 * Get the sidebar.
	 */
	public static function sidebar() {

		if ( self::is_disabled() ) {
			return false;
		}
		get_template_part( 'template-parts/sidebar' );

	}

	/**
	 * Footer section
	 */
	public static function footer() {
		?>
		</div><!-- col 8 -->
				<?php self::sidebar(); ?>
			</div><!-- row -->
		</main><!-- #main -->
		<?php
	}
}
