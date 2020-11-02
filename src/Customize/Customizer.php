<?php

namespace Brisko\Customize;

use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Controls\Control;

class Customizer
{
	/**
	 * Brisko Section
	 *
	 * @var $section
	 */
	public static $section = 'brisko_options';

	/**
	 * Customizer transport
	 *
	 * @var $transport
	 */
	public static $transport = 'postMessage';

	/**
	 * Register the Customizer
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'brisko_customizer' ) );
	}

	/**
	 * Init
	 *
	 * @return Customizer
	 */
	public static function init() {
		return new Customizer();
	}

	/**
	 * WP_Customize_Manager
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function wp_customize( $wp_customize ) {
		return $wp_customize;
	}

	/**
	 * Create Section
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function brisko_options( $wp_customize ) {
		$wp_customize->add_section(
			'brisko_options', array(
				'title'    => esc_html__( ' Brisko Theme Options »', 'brisko' ),
				'priority' => 99,
			)
		);
	}

	/**
	 * Theme Customizer.
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public function brisko_customizer( $wp_customize ) {

		$this->brisko_options( $wp_customize );

		// Separator Header Image Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Header Image', 'brisko' ) );
		/**
		 * Header Image
		 */
		$wp_customize->add_setting(
			'header_image_display', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'entire-site',
			)
		);

		$wp_customize->add_control(
			'header_image_display', array(
				'label'       => esc_html__( 'Header Image', 'brisko' ),
				'description' => esc_html__( 'display settings for the header image', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'this-home-page-only' => esc_html__( 'Home Page / Front Page Only', 'brisko' ),
					'this-entire-site'    => esc_html__( 'Entire Site', 'brisko' ),
					'this-disabled'       => esc_html__( 'Disabled', 'brisko' ),
				),
			)
		);

		// Separator Header Navigation Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Navigation', 'brisko' ) );

		$wp_customize->add_setting(
			'navigation_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'navigation_width', array(
				'label'       => esc_html__( 'Navigation width', 'brisko' ),
				'description' => esc_html__( 'set menu navigation width', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

		// Separator General Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'General', 'brisko' ) );

		/**
		 * Link Color
		 */
		$wp_customize->add_setting(
			'link_color', array(
				'capability'        => 'manage_options',
				'default'           => '#E4584B',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize, 'link_color',
				array(
					'label'       => esc_html__( 'Link Color', 'brisko' ),
					'description' => esc_html__( 'Select a color', 'brisko' ),
					'section'     => self::$section,
				)
			)
		);
		// Separator Pages Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Pages', 'brisko' ) );

		// Display Page Header.
		$wp_customize->add_setting(
			'display_page_header', array(
				'default'           => absint( 1 ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'display_page_header', array(
				'label'   => esc_html__( 'Display Page Header', 'brisko' ),
				'section' => self::$section,
				'type'    => 'checkbox',
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
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

		/**
		 * Archives Template Details
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Blog', 'brisko' ) );

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

		/**
		 * Separator Post Settings.
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Posts', 'brisko' ) );

		/**
		 * Featured image
		 */
		$wp_customize->add_setting(
			'featured_image', array(
				'default'           => sanitize_html_class( 'show-image' ),
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'sanitize_html_class',
			)
		);
		$wp_customize->add_control(
			'featured_image', array(
				'label'       => esc_html__( 'Featured Image Display', 'brisko' ),
				'description' => esc_html__( 'featured Image on single posts', 'brisko' ),
				'section'     => self::$section,
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
		( new Control() )->header_title( $wp_customize, esc_html__( 'Post Details', 'brisko' ) );

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
				'section' => self::$section,
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
				'section' => self::$section,
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
				'section' => self::$section,
				'type'    => 'checkbox',
			)
		);

		// Post width.
		$wp_customize->add_setting(
			'post_width', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			)
		);

		$wp_customize->add_control(
			'post_width', array(
				'label'       => esc_html__( 'Post width', 'brisko' ),
				'description' => esc_html__( 'set width for all single post pages', 'brisko' ),
				'section'     => self::$section,
				'type'        => 'select',
				'choices'     => array(
					'container'       => esc_html__( 'Boxed', 'brisko' ),
					'container-fluid' => esc_html__( 'Full width', 'brisko' ),
				),
			)
		);

		/**
		 * Footer Settings
		 */
		( new Control() )->separator( $wp_customize, esc_html__( 'Footer', 'brisko' ) );

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
				'section'     => self::$section,
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
				'section'     => self::$section,
				'settings'    => 'poweredby',
				'type'        => 'textarea',
			)
		);

		/**
		 * Customize_Selective_Refresh
		 *
		 * @link https://developer.wordpress.org/reference/classes/wp_customize_selective_refresh/add_partial/
		 */
		$wp_customize->get_setting( 'link_color' )->transport       = self::$transport;
		$wp_customize->get_setting( 'featured_image' )->transport   = self::$transport;
		$wp_customize->get_setting( 'footer_copyright' )->transport = self::$transport;
		$wp_customize->get_setting( 'poweredby' )->transport        = self::$transport;

		// .
		$wp_customize->get_setting( 'blogname' )->transport         = self::$transport;
		$wp_customize->get_setting( 'blogdescription' )->transport  = self::$transport;
		$wp_customize->get_setting( 'header_textcolor' )->transport = self::$transport;

		if ( isset( $wp_customize->selective_refresh ) ) {

			// copyright.
			$wp_customize->selective_refresh->add_partial(
				'footer_copyright',
				array(
					'selector'        => '.brisko-footer-copyright',
					'render_callback' => 'brisko_customize_partial_copyright',
				)
			);

			// poweredby.
			$wp_customize->selective_refresh->add_partial(
				'poweredby',
				array(
					'selector'        => '.brisko-footer-poweredby',
					'render_callback' => 'brisko_customize_partial_poweredby',
				)
			);

			// post-featured-image.
			$wp_customize->selective_refresh->add_partial(
				'featured_image',
				array(
					'selector'        => '.post-featured-image',
					'render_callback' => 'brisko_customize_partial_featured_image',
				)
			);

			// blogname.
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => 'brisko_customize_partial_blogname',
				)
			);
			// blogdescription.
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'brisko_customize_partial_blogdescription',
				)
			);

		}
	}

}
