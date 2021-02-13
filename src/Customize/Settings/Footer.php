<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Footer implements SettingsInterface
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

		/**
		 * Footer Settings
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Footer', 'brisko' ), self::section() );

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
				'settings'    => 'footer_copyright',
			)
		);

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
			'poweredby', array(
				'label'       => esc_html__( 'Powered By', 'brisko' ),
				'description' => esc_html__( 'edit Powered by section, html can be used', 'brisko' ),
				'section'     => self::section(),
				'settings'    => 'poweredby',
				'type'        => 'textarea',
			)
		);

		/**
		 * Top Margin.
		 */
		( new Control() )->header_title( $wp_customize, esc_html__( 'Top Margin', 'brisko' ), self::section() );

		// Remove Top Margin.
		$wp_customize->add_setting(
			'footer_remove_top_margin', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'footer_remove_top_margin', array(
				'label'       => esc_html__( 'Remove Top Margin', 'brisko' ),
				'description' => esc_html__( 'removes the top margin for footer section', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'checkbox',
			)
		);

		// Disable Footer.
		$wp_customize->add_setting(
			'disable_footer', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_footer', array(
				'label'   => esc_html__( 'Disable The Footer', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);
	}
}
