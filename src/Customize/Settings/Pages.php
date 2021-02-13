<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Pages implements SettingsInterface
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
			'display_page_header', array(
				'label'       => esc_html__( 'Display Page Header', 'brisko' ),
				'description' => esc_html__( 'show the page titles on each page', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'checkbox',
			)
		);

		// Pages width.
		$wp_customize->add_setting(
			'page_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'page_width', array(
				'label'       => esc_html__( 'Page width', 'brisko' ),
				'description' => esc_html__( 'set page width for all pages', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

	}
}
