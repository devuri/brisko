<?php
/**
 * Brisko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brisko
 */

	/**
	 * Load composer
	 */
	require __DIR__ . '/vendor/autoload.php';

	/**
	 * Load Theme
	 */
	Brisko\Theme::setup();

if ( ! function_exists( 'brisko' ) ) :
	/**
	 * Get the Brisko Theme
	 *
	 * Helper function to get the Bisko Theme Object.
	 *
	 * @return Brisko
	 */
	function brisko() {
		return Brisko\Brisko::get();
	}
endif;

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) :
	require get_template_directory() . 'src/inc/jetpack.php';
endif;
