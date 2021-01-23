<?php

namespace Brisko\Contracts;

interface SettingsInterface
{

	/**
	 * Customizer settings
	 *
	 * Create new customizer settings here.
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize );

}