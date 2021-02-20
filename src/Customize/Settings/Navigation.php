<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

class Navigation implements SettingsInterface
{

	use SettingsTrait;

	/**
	 * Lets build out the customizer settings
	 *
	 * Create new customizer settings here is where we will add new panel sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize ) {

		// Separator Header Navigation Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Navigation', 'brisko' ), self::section() );

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
					'section'     => self::section(),
				)
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Turn off Navigation', 'brisko' ), self::section() );

		// Disable Nav Menu .
		$wp_customize->add_setting(
			'disable_nav_menu', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_nav_menu', array(
				'label'   => esc_html__( 'Disable Nav Menu Only', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Disable Navigation Section.
		$wp_customize->add_setting(
			'disable_navigation', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_navigation', array(
				'label'   => esc_html__( 'Disable Navigation Section', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

	}
}
