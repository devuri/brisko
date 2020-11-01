<?php

namespace Brisko\Customize\Controls;

class Control {

	/**
	 * Create Section
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @param string               $label .
	 */
	public function separator( $wp_customize, $label = 'Custom Label' ) {

		$id = sanitize_title( $label );
		$id = str_replace( '-', '_', $id );
		$id = $id . '_separator_control';

		$wp_customize->add_setting(
			$id, array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new SeparatorControl(
				$wp_customize, $id,
				array(
					'label'   => esc_html( $label ),
					'section' => 'brisko_options',
				)
			)
		);
	}

	/**
	 * Create Section
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @param string               $label .
	 */
	public function header_title( $wp_customize, $label = 'Custom Title' ) {

		$id = sanitize_title( $label );
		$id = str_replace( '-', '_', $id );
		$id = $id . '_heading_control';

		$wp_customize->add_setting(
			$id, array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new HeaderControl(
				$wp_customize, $id,
				array(
					'label'   => esc_html( $label ),
					'section' => 'brisko_options',
				)
			)
		);
	}
}
