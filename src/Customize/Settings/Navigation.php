<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Navigation implements SettingsInterface
{
	/**
	 * Brisko Section
	 *
	 * @var $section
	 */
	public static $section = 'brisko_section_navigation';

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

		// Separator Header Navigation Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Navigation', 'brisko' ), self::$section );

		$wp_customize->add_setting(
			'navigation_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'navigation_width', array(
				'label'       => esc_html__( 'Navigation width', 'brisko' ),
				'description' => esc_html__( 'set menu navigation width', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

		/**
		 * Navigation background color
		 */
		$wp_customize->add_setting(
			'nav_background_color', array(
				'capability'        => 'manage_options',
				'default'           => '#ffffff',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'nav_background_color',
				array(
					'label'       => esc_html__( 'Navigation background color', 'brisko' ),
					'description' => esc_html__( 'set navigation background color', 'brisko' ),
					'section'     => self::$section,
				)
			)
		);

	}
}
