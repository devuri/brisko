<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Posts implements SettingsInterface
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
		 * Separator Post Settings.
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Posts', 'brisko' ), self::section() );

		/**
		 * Featured image
		 */
		$wp_customize->add_setting(
			'featured_image', array(
				'default'           => sanitize_html_class( 'this-display-show' ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_html_class',
			)
		);
		$wp_customize->add_control(
			'featured_image', array(
				'label'       => esc_html__( 'Featured Image Display', 'brisko' ),
				'description' => esc_html__( 'featured Image on single posts', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => array(
					'this-display-show' => esc_html__( 'Display on single posts', 'brisko' ),
					'this-display-none' => esc_html__( 'Remove on single posts', 'brisko' ),
				),
			)
		);

		/**
		 * Post Details
		 */
		( new Control() )->header_title( $wp_customize, esc_html__( 'Post Details', 'brisko' ), self::section() );

		// Display Post Categories .
		$wp_customize->add_setting(
			'display_post_categories', array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'display_post_categories', array(
				'label'   => esc_html__( 'Display Post Categories', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Display tags.
		$wp_customize->add_setting(
			'display_tags', array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'display_tags', array(
				'label'   => esc_html__( 'Display Post Tags', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Display previous and next post navigation.
		$wp_customize->add_setting(
			'display_previous_next', array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'display_previous_next', array(
				'label'   => esc_html__( 'Display Previous and Next Navigation', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

	}
}
