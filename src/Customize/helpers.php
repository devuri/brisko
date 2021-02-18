<?php

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_copyright() {
	echo esc_html( get_theme_mod( 'footer_copyright' ) );
}

/**
 * Render Selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_poweredby() {
	echo wp_kses_post( get_theme_mod( 'poweredby' ) );
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
 * Check if this is the Pro version.
 *
 * @return bool
 */
function is_brisko_pro() {

	if ( function_exists( 'do_brisko_pro' ) ) {
		return true;
	}

	return false;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brisko_customize_preview_js() {
	wp_enqueue_script( 'brisko-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), Brisko\Theme::VERSION, true );
}
add_action( 'customize_preview_init', 'brisko_customize_preview_js' );


/**
 * Checkbox sanitization.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @link https://github.com/WPTT/code-examples/blob/master/customizer/sanitization-callbacks.php
 */
function brisko_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false ); // @codingStandardsIgnoreLine
}

/**
 * Number sanitization
 *
 * Sanitization callback for 'numbers'
 *
 * @param  string $number .
 * @return $number .
 */
function brisko_sanitize_number( $number ) {
	$number = wp_strip_all_tags( $number );
	$number = preg_replace( '/[^0-9,]/', '', $number );
	return $number;
}
