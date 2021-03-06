<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\ToggleControl;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

class Pages implements SettingsInterface
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

		// Separator Pages Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Pages', 'brisko' ), self::section() );

		// Display Page Header.
		$wp_customize->add_setting(
			'display_page_header', array(
				'default'           => absint( 0 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize, 'display_page_header',
				array(
					'label'       => esc_html__( 'Show Page Title', 'brisko' ),
					'description' => esc_html__( 'display the page title for each page', 'brisko' ),
					'section'     => self::section(),
					'type'        => 'light', // light, ios, flat.
				)
			)
		);

	}
}
