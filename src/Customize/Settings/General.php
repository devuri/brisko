<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;

class General
{
	/**
	 * Brisko Section
	 *
	 * @var $section
	 */
	public static $section = 'brisko_section_general';

	/**
	 * Customizer transport
	 *
	 * @var $transport
	 */
	public static $transport = 'postMessage';

	/**
	 * Lets build out the customizer settings
	 *
	 * Create new customizer settings here is where we will add new panel sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize ) {

		// Separator General Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'General', 'brisko' ), self::$section );

		/**
		 * Link Color
		 */
		$wp_customize->add_setting(
			'link_color', array(
				'capability'        => 'manage_options',
				'default'           => '#000000',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'link_color',
				array(
					'label'       => esc_html__( 'Link Color', 'brisko' ),
					'description' => esc_html__( 'Select a color', 'brisko' ),
					'section'     => self::$section,
				)
			)
		);

		/**
		 * Disable Sidebar
		 */
		( new Control() )->header_title( $wp_customize, esc_html__( 'Sidebar', 'brisko' ), self::$section );
		$wp_customize->add_setting(
			'disable_sidebar', array(
				'default'           => absint( 0 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'disable_sidebar', array(
				'label'   => esc_html__( 'Disable Sidebar', 'brisko' ),
				'section' => self::$section,
				'type'    => 'checkbox',
			)
		);

	}
}
