<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\GroupSettings;
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
					'section'  => self::section(),
					'inline'   => true,
					'type'     => 'code_editor',
					'code_type' => 'text/html',
				)
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Advanced Settings', 'brisko' ), self::section() );

		// Custom Text Color.
		$wp_customize->add_setting(
			'footer_text_color', array(
				'capability'        => 'edit_theme_options',
				'default'           => '#666666',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'footer_text_color',
				array(
					'label'       => esc_html__( 'Text Color', 'brisko' ),
					'description' => esc_html__( 'Set a Custom Text Color', 'brisko' ),
					'section'     => self::section(),
				)
			)
		);

		// Footer Links color.
		$wp_customize->add_setting(
			'footer_links_color', array(
				'capability'        => 'edit_theme_options',
				'default'           => '#000000',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'footer_links_color',
				array(
					'label'       => esc_html__( 'Link Color', 'brisko' ),
					'description' => esc_html__( 'Set a Custom Links Color', 'brisko' ),
					'section'     => self::section(),
				)
			)
		);

		// Custom Background Color.
		$wp_customize->add_setting(
			'footer_background_color', array(
				'capability'        => 'edit_theme_options',
				'default'           => '#ffffff',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'footer_background_color',
				array(
					'label'       => esc_html__( 'Background Color', 'brisko' ),
					'description' => esc_html__( 'Set a Custom Background Color', 'brisko' ),
					'section'     => self::section(),
				)
			)
		);

		// Custom Border Color.
		$wp_customize->add_setting(
			'footer_border_color', array(
				'capability'        => 'edit_theme_options',
				'default'           => '#e8e8e8',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'footer_border_color',
				array(
					'label'       => esc_html__( 'Border Color', 'brisko' ),
					'description' => esc_html__( 'Set a Border Color', 'brisko' ),
					'section'     => self::section(),
				)
			)
		);

		// Footer Padding.
		$wp_customize->add_setting(
			'footer_padding[top]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_padding[right]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_padding[bottom]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_padding[left]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_control(
			new GroupSettings(
				$wp_customize, 'footer_padding',
				array(
					'label'    => esc_html__( 'Footer Padding', 'brisko' ),
					'section'  => self::section(),
					'inline'   => true,
					'type'     => 'number',
					'settings' => array(
						'top'    => 'footer_padding[top]',
						'right'  => 'footer_padding[right]',
						'bottom' => 'footer_padding[bottom]',
						'left'   => 'footer_padding[left]',
					),
				)
			)
		);

		// Footer Margin.
		$wp_customize->add_setting(
			'footer_margin[top]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_margin[right]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_margin[bottom]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_setting(
			'footer_margin[left]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$wp_customize->add_control(
			new GroupSettings(
				$wp_customize, 'footer_margin',
				array(
					'label'    => esc_html__( 'Footer Margin', 'brisko' ),
					'section'  => self::section(),
					'inline'   => true,
					'type'     => 'number',
					'settings' => array(
						'top'    => 'footer_margin[top]',
						'right'  => 'footer_margin[right]',
						'bottom' => 'footer_margin[bottom]',
						'left'   => 'footer_margin[left]',
					),
				)
			)
		);

		// Custom CSS.
		$wp_customize->add_setting(
			'footer_css', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => self::$transport,
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Code_Editor_Control(
				$wp_customize, 'footer_css',
				array(
					'label'     => esc_html__( 'Custom CSS', 'brisko' ),
					'section'   => self::section(),
					'inline'    => true,
					'type'      => 'code_editor',
					'code_type' => 'text/css',
				)
			)
		);

		// CSS Classes.
		$wp_customize->add_setting(
			'footer_css_class', array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_classes',
			)
		);

		$wp_customize->add_control(
			'footer_css_class', array(
				'label'       => esc_html__( 'CSS Classes', 'brisko' ),
				'description' => esc_html__( 'add custom CSS Class to the footer section', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'text',
			)
		);

	}
}
