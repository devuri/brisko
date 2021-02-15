<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsInterface;

class Featured implements SettingsInterface
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
		( new Control() )->separator( $wp_customize, esc_html__( 'Featured Posts', 'brisko' ), self::section() );

		// Featured Posts Category.
		$wp_customize->add_setting(
			'featured_category', array(
				'default'           => 0,
				'type'              => 'option',
				'transport'         => self::$transport,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new CategoryDropdown(
				$wp_customize, 'featured_category',
				array(
					'label'       => esc_html__( 'Featured Posts Category', 'brisko' ),
					'description' => esc_html__( 'Select a Category', 'brisko' ),
					'section'     => self::section(),
				)
			)
		);

		// Homepage Featured Posts.
		$wp_customize->add_setting(
			'featured_posts', array(
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'home-page-only',
			)
		);

		$wp_customize->add_control(
			'featured_posts', array(
				'label'       => esc_html__( 'Show Featured Posts', 'brisko' ),
				'description' => esc_html__( 'display settings for featured posts', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => array(
					'home-page-only' => esc_html__( 'Home Page / Front Page Only', 'brisko' ),
					'entire-site'    => esc_html__( 'Entire Site', 'brisko' ),
				),
			)
		);

	}
}
