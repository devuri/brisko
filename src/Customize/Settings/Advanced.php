<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Customize\Traits\SettingsTrait;
use Brisko\Contracts\SettingsInterface;

class Advanced implements SettingsInterface
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

		// Separator General Settings.
		( new Control() )->separator(
			$wp_customize, esc_html__( 'Advanced', 'brisko' ),
			self::section(),
			'Brisko Elements Advanced Options'
		);

		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Advanced Settings', 'brisko' ),
			self::section(),
			esc_html__( 'Stylesheets, JavaScript and other Settings.', 'brisko' )
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
				esc_html__( 'Install Brisko Elements Plugin', 'brisko' ),
				self::section(),
				self::install_plugin()
			);
		endif;

	}
}
