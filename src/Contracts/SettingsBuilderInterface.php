<?php

namespace Brisko\Contracts;

interface SettingsBuilderInterface
{

	/**
	 * Singleton
	 *
	 * @param WP_Customize_Control $wp_customize .
	 * @param string               $transport .
	 * @param string               $section .
	 */
	public static function init( $wp_customize, $transport, $section );

	/**
	 * Customizer control
	 *
	 * @return WP_Customize_Control
	 */
	public function customizer();

	/**
	 * Element Space
	 *
	 * Used for manrgin and padding like "footer_margin" and "footer_padding".
	 *
	 * @param string $setting .
	 *
	 * @return void
	 */
	public function element_space( $setting = 'footer_margin' );

}
