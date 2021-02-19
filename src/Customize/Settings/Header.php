<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Header implements SettingsInterface
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

		// Separator Header Image Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Header Image', 'brisko' ), self::section() );
		/**
		 * Header Image
		 */
		$wp_customize->add_setting(
			'header_image_display', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'this-entire-site',
			)
		);

		$wp_customize->add_control(
			'header_image_display', array(
				'label'       => esc_html__( 'Header Image', 'brisko' ),
				'description' => esc_html__( 'display settings for the header image', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => array(
					'this-home-page-only' => esc_html__( 'Home Page / Front Page Only', 'brisko' ),
					'this-entire-site'    => esc_html__( 'Entire Site', 'brisko' ),
					'this-disabled'       => esc_html__( 'Disabled', 'brisko' ),
				),
			)
		);

		// Header Image width.
		$wp_customize->add_setting(
			'header_image_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'header_image_width', array(
				'label'       => esc_html__( 'Header Image width', 'brisko' ),
				'description' => esc_html__( 'set width for the header image', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_layout_options(),
			)
		);
	}
}
