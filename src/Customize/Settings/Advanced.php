<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Advanced implements SettingsInterface
{

	/**
	 * Customizer transport
	 *
	 * @var $transport
	 */
	public static $transport = 'postMessage';

	/**
	 * Brisko Section
	 */
	public static function section() {
		$class = new \ReflectionClass( new self() );
		return 'brisko_section_' . strtolower( $class->getShortName() );
	}

	/**
	 * Lets build out the customizer settings
	 *
	 * Create new customizer settings here is where we will add new panel sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize ) {

		// Separator General Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Advanced', 'brisko' ), self::section() );

		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Underscores', 'brisko' ),
			self::section(),
			esc_html__( 'This will disable the associated Stylesheet and JavaScript.', 'brisko' ),
		);

		// Disable Underscores.
		$wp_customize->add_setting(
			'disable_underscores', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_underscores', array(
				'label'   => esc_html__( 'Disable Underscores Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Bootstrap', 'brisko' ),
			self::section(),
			esc_html__( 'This will disable the associated Bootstrap Stylesheet and JavaScript.', 'brisko' ),
		);

		// Disable Bootstrap.
		$wp_customize->add_setting(
			'disable_bootstrap', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_bootstrap', array(
				'label'   => esc_html__( 'Disable Bootstrap Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Brisko', 'brisko' ),
			self::section(),
			esc_html__( 'This will disable the associated Brisko Stylesheet.', 'brisko' ),
		);

		// Disable Brisko.
		$wp_customize->add_setting(
			'disable_brisko', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_brisko', array(
				'label'   => esc_html__( 'Disable Brisko Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Disable Theme Styles.
		$wp_customize->add_setting(
			'disable_theme_styles', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_theme_styles', array(
				'label'   => esc_html__( 'Disable Theme Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

	}
}
