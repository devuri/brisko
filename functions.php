<?php
/**
 * Brisko functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 */
require __DIR__ . '/autoloader.php';

// @phpstan-ignore-next-line
$loader = Brisko\Autoloader::init()
    ->addNamespace('Brisko\\', 'src', true)
    ->addFiles([
        "src/Customize/helpers.php",
        "src/inc/actions.php",
        "src/inc/template-tags.php",
    ]);

// Theme version.
\define( 'BRISKO_VERSION', brisko()->version() );

// Theme setup.
brisko()->setup();
