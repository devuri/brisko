<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Child implements SettingsInterface
{
	/**
	 * Brisko Section
	 *
	 * @var $section
	 */
	public static $section = 'brisko_section_child';

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

		$control = new Control();

		// Separator General Settings.
		$control->separator( $wp_customize, esc_html__( 'Child Theme Settings', 'brisko' ), self::$section );

		// Styles.
		$wp_customize->add_setting(
			'disable_styles', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_styles', array(
				'label'       => esc_html__( 'Disable Brisko Styles', 'brisko' ),
				'description' => esc_html__( 'This will disable the parent theme styles.', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'checkbox',
			)
		);

		do_action( 'brisko_child_customizer', $wp_customize, $control );

	}
}
