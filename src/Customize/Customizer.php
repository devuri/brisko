<?php

namespace Brisko\Customize;

use Brisko\Contracts\SetupInterface;

final class Customizer implements SetupInterface
{
	/**
	 * Initialize the Customizer
	 *
	 * @see Theme __construct
	 *
	 * @return Customizer
	 */
	public static function init() {
		return new Customizer();
	}

	/**
	 * Register the Customizer
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'brisko_customizer' ) );
	}

	/**
	 * Create Brisko Theme Panel
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function brisko_theme_panel( $wp_customize ) {
		$wp_customize->add_panel(
			'brisko_theme_panel',
			array(
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => esc_html__( 'Theme Options', 'brisko' ),
			)
		);
	}

	/**
	 * Theme Customizer.
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function brisko_customizer( $wp_customize ) {

		// Add Panel .
		$this->brisko_theme_panel( $wp_customize );

		/**
		 * Sections
		 */
		Build::get()->sections( $wp_customize );

		/**
		 * Settings
		 */
		Build::get()->settings( $wp_customize );

	}

}
