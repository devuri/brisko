<?php

namespace Brisko\Contracts;

interface SettingsInterface
{

	/**
	 * Brisko Section name only.
	 */
	public static function short_name();

	/**
	 * Brisko Section
	 */
	public static function section();

	/**
	 * Customizer settings
	 *
	 * Create new customizer settings here.
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize );

}
