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
	 * Load Jetpack compatibility file.
	 */
	if ( defined( 'JETPACK__VERSION' ) ) {
	 	require get_template_directory() . 'src/Includes/jetpack.php';
	}

	/**
	 * Load Theme
	 */
	Brisko\Theme::setup();
