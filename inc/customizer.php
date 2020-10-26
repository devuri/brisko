<?php
/**
 * brisko Theme Customizer
 *
 * @package brisko
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function brisko_customize_register( $wp_customize ) {

	$wp_customize->add_section('brisko_options', array(
			'title'    => esc_html__('Theme Options', 'brisko'),
			'priority' => 120,
	));

	/**
	 * copyright section
	 */
	$wp_customize->add_setting('brisko_options[copyright]', array(
		'default'        		=> esc_html__('Copyright © 2020 '.get_bloginfo( 'name' ).'.'),
		'capability'     		=> 'edit_theme_options',
		'transport' 			=> 'postMessage',
		'type'           		=> 'option',
		'sanitize_callback'     => 'sanitize_text_field',
	));

	$wp_customize->add_control('briskofooter_copyright', array(
		'label'      => esc_html__('Footer Copyright Text', 'brisko'),
		'section'    => 'brisko_options',
		'settings'   => 'brisko_options[copyright]',
	));

	/**
	 * featured image
	 */
	$wp_customize->add_setting( 'brisko_options[featured_image]', array(
		'default'           => 1,
		'capability'     	=> 'edit_theme_options',
		'transport' 		=> 'postMessage',
		'type'           	=> 'option',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control('brisko_featured_image', array(
		'label'      => esc_html__('Display Featured Image On Posts Pages', 'brisko'),
		'section'    => 'brisko_options',
		'type'       => 'checkbox',
		'settings'   => 'brisko_options[featured_image]',
	));

	$wp_customize->get_setting( 'brisko_options[featured_image]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'brisko_options[copyright]' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {

		# copyright
		$wp_customize->selective_refresh->add_partial(
			'brisko_options[copyright]',
			array(
				'selector'        => '.brisko-footer-copyright',
				'render_callback' => 'brisko_customize_partial_copyright',
			)
		);

		# post-featured-image
		$wp_customize->selective_refresh->add_partial(
			'brisko_options[featured_image]',
			array(
				'selector'        => '.post-featured-image',
				'render_callback' => 'brisko_customize_partial_featured_image',
			)
		);

		# blogname
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'brisko_customize_partial_blogname',
			)
		);
		# blogdescription
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'brisko_customize_partial_blogdescription',
			)
		);

	}
}
add_action( 'customize_register', 'brisko_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_copyright() {
		echo brisko_theme_mod('copyright');
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_featured_image() {
	//brisko_theme_mod('featured_image');
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
