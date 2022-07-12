<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Controls\ToggleControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;
use BriskoElement\Customize\Settings;

class Blog implements SettingsInterface
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

		/**
		 * Archives Template Details
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Blog', 'brisko' ), self::section() );

		// Disable Sidebar.
		$wp_customize->add_setting(
			'disable_sidebar',
			array(
				'default'           => absint( 0 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				'disable_sidebar',
				array(
					'label'   => esc_html__( 'Disable Sidebar', 'brisko' ),
					'section' => self::section(),
					'type'    => 'light',
				// light, ios, flat.
				)
			)
		);

		// button border radius.
		$wp_customize->add_setting(
			'read_more_border_radius',
			array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				'read_more_border_radius',
				array(
					'label'       => esc_html__( 'Read More Button Radius', 'brisko' ),
					'description' => esc_html__( 'Add Border Radius to the Read More Button', 'brisko' ),
					'section'     => self::section(),
					'type'        => 'light',
				// light, ios, flat.
				)
			)
		);

		// Excerp Length.
		$wp_customize->add_setting(
			'set_excerpt_length',
			array(
				'default'           => absint( 24 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'set_excerpt_length',
			array(
				'label'   => esc_html__( 'Excerp Length', 'brisko' ),
				'section' => self::section(),
				'type'    => 'number',
			)
		);

		// Excerp More.
		$wp_customize->add_setting(
			'set_excerpt_more',
			array(
				'default'           => '[…]',
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'set_excerpt_more',
			array(
				'label'   => esc_html__( 'Excerp More', 'brisko' ),
				'section' => self::section(),
				'type'    => 'text',
			)
		);

		/**
		 * Separator Post Settings.
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Post Details', 'brisko' ), self::section() );

		/**
		 * Featured image
		 */
		$wp_customize->add_setting(
			'featured_image',
			array(
				'default'           => sanitize_html_class( 'this-display-show' ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_html_class',
			)
		);

		$wp_customize->add_control(
			'featured_image',
			array(
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

		// text-transform on tags.
		$wp_customize->add_setting(
			'text_transform_tags',
			array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'none',
			)
		);

		$wp_customize->add_control(
			'text_transform_tags',
			array(
				'label'       => esc_html__( 'Post Tags text-transform', 'brisko' ),
				'description' => esc_html__( 'set text-transform for post tags', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_text_tranform_choices(),
			)
		);

		/**
		 * Post Details
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Post Content Details', 'brisko' ), self::section() );

		// Display Post Categories .
		$wp_customize->add_setting(
			'display_post_categories',
			array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				'display_post_categories',
				array(
					'label'   => esc_html__( 'Show Categories', 'brisko' ),
					'section' => self::section(),
					'type'    => 'light',
				// light, ios, flat.
				)
			)
		);

		// Display tags.
		$wp_customize->add_setting(
			'display_tags',
			array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				'display_tags',
				array(
					'label'   => esc_html__( 'Show Tags', 'brisko' ),
					'section' => self::section(),
					'type'    => 'light',
				// light, ios, flat.
				)
			)
		);

		// Display previous and next post navigation.
		$wp_customize->add_setting(
			'display_previous_next',
			array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new ToggleControl(
				$wp_customize,
				'display_previous_next',
				array(
					'label'   => esc_html__( 'Show Post Navigation', 'brisko' ),
					'section' => self::section(),
					'type'    => 'light',
				// light, ios, flat.
				)
			)
		);

		/**
		 * Advanced Details
		 */
		( new Control() )->separator(
			$wp_customize,
			esc_html__( 'Advanced Details', 'brisko' ),
			self::section(),
			'Brisko Elements Advanced Options'
		);

		// Advanced options section.
		$args = array(
			'wp_customize' => $wp_customize,
			'transport'    => self::$transport,
			'section'      => self::section(),
			'short_name'   => self::short_name(),
		);
		do_action( "brisko_advanced_options_{$args['short_name']}", $args );

		// Install plugin.
		if ( ! did_action( 'brisko_elements_loaded' ) ) :
			( new Control() )->header_title(
				$wp_customize,
				esc_html__( 'Get Brisko Elements Plugin', 'brisko' ),
				self::section(),
				self::install_plugin()
			);
		endif;

	}
}
