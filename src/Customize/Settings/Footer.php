<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\GroupSettings;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

class Footer implements SettingsInterface
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

		// Footer Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Footer Settings', 'brisko' ), self::section() );

		// Copyright section .
		$wp_customize->add_setting(
			'footer_copyright', array(
				'default'           => wp_kses_post( 'Copyright © 2020 ' . get_bloginfo( 'name' ) . '.' ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'footer_copyright', array(
				'label'       => esc_html__( 'Copyright Text', 'brisko' ),
				'description' => esc_html__( 'edit footer section', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'text',
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Powered by', 'brisko' ), self::section() );
		// Powered By.
		$wp_customize->add_setting(
			'poweredby', array(
				'default'           => wp_kses_post( ' | Powered by <a href="https://wpbrisko.com">Brisko WordPress Theme</a>' ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Code_Editor_Control(
				$wp_customize, 'poweredby',
				array(
					'label'       => esc_html__( 'Powered By', 'brisko' ),
					'description' => esc_html__( 'edit Powered by section, html can be used', 'brisko' ),
					'section'     => self::section(),
					'inline'      => true,
					'type'        => 'code_editor',
					'code_type'   => 'text/html',
				)
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Advanced Settings', 'brisko' ), self::section() );

		// Advanced options section.
		$args = array(
			'wp_customize' => $wp_customize,
			'transport'    => self::$transport,
			'section'      => self::section(),
			'short_name'   => self::short_name(),
		);
		do_action( "brisko_advanced_options_{$args['short_name']}", $args );

	}
}
