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
				'default'           => '#E4584B',
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
		 * Header Image
		 */
		$wp_customize->add_setting(
			'website_width', array(
				'sanitize_callback' => 'absint',
				'default'           => 'entire-site',
			)
		);

		$wp_customize->add_control(
			'website_width', array(
				'label'       => esc_html__( 'Site Width', 'brisko' ),
				'description' => esc_html__( 'website with, only applies with Box layout', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					1200 => esc_html__( 'XXL (1200)', 'brisko' ),
					1140 => esc_html__( 'XL (1140)', 'brisko' ),
					960  => esc_html__( 'L (960)', 'brisko' ),
					720  => esc_html__( 'M (720)', 'brisko' ),
					540  => esc_html__( 'S (540)', 'brisko' ),
				),
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
