<?php
/**
 * Brisko functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Load composer.
 */
require __DIR__ . '/vendor/autoload.php';

// Load Theme
Brisko\Theme::setup();

if ( ! \function_exists( 'brisko' ) ) {
	/**
	 * Get the Brisko Theme.
	 *
	 * Helper function to get the Bisko Theme Object.
	 *
	 * @return Brisko
	 */
	function brisko()
	{
		return Brisko\Brisko::get();
	}
}

// load customizer preview.
add_action( 'customize_preview_init', 'brisko_customize_preview_js' );

/*
 * Compatibility for Elementor Header and Footer.
 *
 * @link https://developers.elementor.com/theme-locations-api/registering-locations
 */
if ( did_action( 'elementor/loaded' ) ) {
	add_action(
		'elementor/theme/register_locations',
		function ( $elementor_theme_manager ) {
			$elementor_theme_manager->register_location( 'header' );
			$elementor_theme_manager->register_location( 'footer' );
		} ); // @codingStandardsIgnoreLine
}
