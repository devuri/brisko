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
		$args = array(
			'wp_customize' => $wp_customize,
			'transport'    => self::$transport,
			'section'      => self::section(),
			'short_name'   => self::short_name(),
		);
		do_action( 'brisko_pro_options', $args );

		// Install plugin.
		if ( ! did_action( 'brisko_elements_loaded' ) ) :
			( new Control() )->header_title(
				$wp_customize,
				esc_html__( 'Install Brisko Elements Add-On for Pro Options', 'brisko' ),
				self::section(),
				self::install_plugin()
			);
		endif;

	}

}
