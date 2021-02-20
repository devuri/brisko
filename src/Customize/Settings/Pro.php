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
	 * Brisko Section
	 */
	public static function upgrade_message() {

		$upgrade_button  = '<a href="' . esc_url( 'https://wpbrisko.com/upgrade/?utm_source=upgrade-to-pro' ) . '" target="_blank" class="button button-secondary">';
		$upgrade_button .= 'Get More Options with Brisko Pro';
		$upgrade_button .= '</a>';

		return "<p>Purchase the Brisko Pro to get additional features and more customization options.
		The Brisko Pro Plugin gives you alot more options and Widgets</p>
		$upgrade_button";
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
		( new Control() )->separator( $wp_customize, esc_html__( 'Pro Options', 'brisko' ), self::section() );

		if ( is_brisko_pro() ) {

			$args = array(
				'wp_customize' => $wp_customize,
				'transport'    => self::$transport,
				'section'      => self::section(),
			);

			do_action( 'brisko_pro_panel', $args );

		} else {
			( new Control() )->header_title(
				$wp_customize,
				esc_html__( ' » Get Brisko Pro', 'brisko' ),
				self::section(),
				self::upgrade_message(),
			);
		}

	}

}
