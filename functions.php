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

// Theme version.
\define( 'BRISKO_VERSION', brisko()->version() );

// Theme setup.
brisko()->setup();

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
        } );
}

/*
 * Disable wpautop.
 *
 * @link https://developer.wordpress.org/reference/functions/wpautop/
 * @link https://stackoverflow.com/questions/20760598/how-to-remove-extra-p-p-tags-in-wordpress-post-and-pages
 */
remove_filter( 'the_content', 'wpautop' );
