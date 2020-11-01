<?php

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_copyright() {
	echo get_theme_mod( 'footer_copyright' );
}

/**
 * Render Selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_poweredby() {
	echo get_theme_mod( 'poweredby' );
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brisko_customize_preview_js() {
	wp_enqueue_script( 'brisko-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), BRISKO_VERSION, true );
}
add_action( 'customize_preview_init', 'brisko_customize_preview_js' );
