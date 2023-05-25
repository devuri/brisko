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
