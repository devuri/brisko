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
$brisko = new Brisko\Theme( __DIR__ );

$brisko->setup();

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
        return new Brisko\Theme( __DIR__ );
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
        } );
}

/*
 * Disable wpautop.
 *
 * @link https://developer.wordpress.org/reference/functions/wpautop/
 * @link https://stackoverflow.com/questions/20760598/how-to-remove-extra-p-p-tags-in-wordpress-post-and-pages
 */
remove_filter( 'the_content', 'wpautop' );

// // Brisko has a simple filter 'brisko_css_assets' to programmatically remove styles.
// // Note that we can also use wp_deregister_style() or wp_dequeue_style()
// // consult the WordPress documentation for more on how to use these.
// // But for now we will be using the filter hook.
// add_filter('brisko_css_assets', function($files)
// {
// 	//return null; // remove all items.
//
// 	// remove all items by name.
// 	// unset($files['underscores']);
// 	// unset($files['bootstrap-grid']);
// 	// unset($files['bootstrap']);
// 	// unset($files['uikit']);
// 	// unset($files['brisko']);
// 	// unset($files['custom-styles']);
// 	// unset($files['brisko-theme']);
//
// 	// remove single item by name.
// 	unset($files['brisko']);
//
// 	// remove two or more items by name.
// 	unset($files['bootstrap-grid']);
// 	unset($files['bootstrap']);
//
// 	return $files; // if we only want to remove one item return the array.
//
// });
