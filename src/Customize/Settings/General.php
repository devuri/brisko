<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Controls\ToggleControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

class General implements SettingsInterface
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

		// Separator General Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'General', 'brisko' ), self::section() );

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
					'section'     => self::section(),
				)
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Other Settings', 'brisko' ), self::section() );
		// Underline Content Links.
		$wp_customize->add_setting(
			'underline_post_links', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize, 'underline_post_links',
				array(
					'label'   => esc_html__( 'Underline Links', 'brisko' ),
					'section' => self::section(),
					'type'    => 'light', // light, ios, flat.
				)
			)
		);

	}
}
