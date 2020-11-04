<?php

namespace Brisko\Customize;

final class Customizer
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
				'title'          => esc_html__( 'Brisko Theme Options', 'brisko' ),
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
		$this->sections( $wp_customize );

		/**
		 * Settings
		 */
		$this->settings( $wp_customize );

	}

	/**
	 * Sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function sections( $wp_customize ) {

		foreach ( Sections::get() as $seckey => $section ) {

			// build out each section.
			$wp_customize->add_section( 'brisko_section_' . trim( $section ),
				array(
					'title'      => esc_html( ' » ' . trim( ucwords( $section ) ) ),
					'capability' => 'edit_theme_options',
					'panel'      => 'brisko_theme_panel',
				)
			);

		} // foreach
	}

	/**
	 * Settings .
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function settings( $wp_customize ) {
		Build::sections( $wp_customize );
	}

}
