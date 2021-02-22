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
 * Render Selective refresh partial.
 *
 * @return void
 */
function brisko_footer_padding_partial() {
	get_template_part( 'template-parts/footer', 'footer' );
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
 * Classes sanitization
 *
 * Sanitization callback for 'css classes'
 *
 * @param  string $classes .
 * @return $classes comma separated values.
 */
function brisko_sanitize_classes( $classes ) {
	$classes = sanitize_text_field( $classes );
	$classes = explode( ',', $classes );
	$classes = array_map( 'sanitize_title', $classes );
	return implode( ',', $classes );
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
	$number = sanitize_text_field( $number );
	$number = intval( $number );
	return (string) $number;
}


/**
 * Theme Layout options
 *
 * Used for Theme Layout Customizer.
 *
 * @return array .
 */
function brisko_layout_options() {
	$options = array(
		'container'       => esc_html__( 'Boxed', 'brisko' ),
		'container-fluid' => esc_html__( 'Full Width', 'brisko' ),
	);
	return $options;
}

/**
 * Theme Layout options
 *
 * Used for Theme Layout Customizer.
 *
 * @return array .
 */
function brisko_text_align_options() {
	$options = array(
		'left'    => esc_html__( 'Left: Align the text to the left', 'brisko' ),
		'right'   => esc_html__( 'Right: Aligns the text to the right', 'brisko' ),
		'center'  => esc_html__( 'Center: Centers the text', 'brisko' ),
		'justify' => esc_html__( 'Justify: Stretches the text equal width', 'brisko' ),
		'initial' => esc_html__( 'Initial: Sets to its default value', 'brisko' ),
		'inherit' => esc_html__( 'Inherit: Inherits from its parent element', 'brisko' ),
	);
	return $options;
}
