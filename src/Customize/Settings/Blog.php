<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;

class Blog
{
	/**
	 * Brisko Section
	 *
	 * @var $section
	 */
	public static $section = 'brisko_section_blog';

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

		/**
		 * Archives Template Details
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Blog', 'brisko' ), self::$section );

		// Blog Title .
		// Blog Layout .

		// Read More Button .
		( new Control() )->header_title( $wp_customize, esc_html__( 'Read More Button', 'brisko' ) );

		// button border radius.
		$wp_customize->add_setting(
			'read_more_border_radius', array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'read_more_border_radius', array(
				'label'   => esc_html__( 'Border Radius', 'brisko' ),
				'section' => self::$section,
				'type'    => 'checkbox',
			)
		);

		// background color.
	}
}
