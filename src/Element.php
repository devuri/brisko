<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The Element class.
 *
 * Used for Elementor related operations.
 *
 * @package brisko
 */
final class Element
{

	use Singleton;

	/**
	 * Elementor theme do location.
	 *
	 * Wrapper for elementor_theme_do_location.
	 *
	 * @param  string $location sets the location.
	 * @link https://developers.elementor.com/theme-locations-api/displaying-locations/
	 * @return null|void
	 */
	public function location( $location = null ) {

		if ( ! function_exists( 'elementor_theme_do_location' ) ) return null;

		if ( is_null( $location ) ) return null;

		if ( elementor_theme_do_location( $location ) ) :
			elementor_theme_do_location( $location );
		endif;
	}

}
