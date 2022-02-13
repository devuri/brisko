<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

/**
 * Get the Brisko Pro Add-on.
 *
 * Purchase the Brisko Pro to get additional features and more customization options.
 */
class Pro implements SettingsInterface
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

		// Separator Pages Settings.
		( new Control() )->separator(
			$wp_customize,
			esc_html__( 'Pro Options and Features', 'brisko' ),
			self::section(),
			'Brisko Elements Pro Options'
		);

		// Advanced options section.
		do_action(
			'brisko_pro_options',
			array(
				'wp_customize' => $wp_customize,
				'transport'    => self::$transport,
				'section'      => self::section(),
				'short_name'   => self::short_name(),
			)
		);

		// Install plugin.
		if ( ! did_action( 'brisko_elements_loaded' ) ) :

			( new Control() )->separator( $wp_customize, esc_html__( 'Typography Options', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Featured Posts Slider', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Font Awesome Icons', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Google Fonts', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Author Bio', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Related Content', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Footer Widgets', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Scroll to Top', 'brisko' ), self::section() );
			( new Control() )->separator( $wp_customize, esc_html__( 'Get Support', 'brisko' ), self::section() );

			( new Control() )->header_title(
				$wp_customize,
				esc_html__( 'Install Brisko Elements Add-On for Pro Options', 'brisko' ),
				self::section(),
				self::install_plugin()
			);
		endif;

	}

}
