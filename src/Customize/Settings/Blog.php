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

		// blog width.
		$wp_customize->add_setting(
			'blog_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'blog_width', array(
				'label'       => esc_html__( 'Blog width', 'brisko' ),
				'description' => esc_html__( 'set blog width', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

		/**
		 * Disable Sidebar
		 */
		( new Control() )->header_title( $wp_customize, esc_html__( 'Sidebar', 'brisko' ), self::$section );
		$wp_customize->add_setting(
			'disable_sidebar', array(
				'default'           => absint( 0 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'disable_sidebar', array(
				'label'   => esc_html__( 'Disable Sidebar', 'brisko' ),
				'section' => self::$section,
				'type'    => 'checkbox',
			)
		);

		// Read More Button .
		( new Control() )->header_title( $wp_customize, esc_html__( 'Read More Button', 'brisko' ), self::$section );

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
				'label'       => esc_html__( 'Border Radius', 'brisko' ),
				'description' => esc_html__( 'set read more button border radius', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'checkbox',
			)
		);
		// background color.
	}
}
