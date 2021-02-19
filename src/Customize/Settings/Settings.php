<?php

namespace Brisko\Customize\Settings;

use Brisko\Traits\Singleton;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\GroupSettings;
use Brisko\Customize\Controls\SeparatorControl;
use Brisko\Contracts\SettingsBuilderInterface;

class Settings implements SettingsBuilderInterface
{

	use Singleton;

	/**
	 * $wp_customize
	 *
	 * @var object
	 */
	public $customize;

	/**
	 * Transport
	 *
	 * @var string.
	 */
	public $transport;

	/**
	 * Section
	 *
	 * @var string.
	 */
	public $section;

	/**
	 * Singleton
	 *
	 * @param WP_Customize_Control $wp_customize .
	 * @param string               $transport .
	 * @param string               $section .
	 */
	public static function init( $wp_customize, $transport, $section ) {
		return new Settings( $wp_customize, $transport, $section );
	}

	/**
	 * Construct
	 *
	 * @param WP_Customize_Control $wp_customize .
	 * @param string               $transport .
	 * @param string               $section .
	 */
	private function __construct( $wp_customize, $transport, $section ) {
		$this->customize = $wp_customize;
		$this->transport = $transport;
		$this->section   = $section;
	}

	/**
	 * Customizer control
	 *
	 * @return WP_Customize_Control
	 */
	public function customizer() {
		return $this->customize;
	}

	/**
	 * Element Space
	 *
	 * Used for manrgin and padding like "footer_margin" and "footer_padding".
	 *
	 * @param string $setting .
	 *
	 * @return void
	 */
	public function element_space( $setting = 'footer_margin' ) {

		$title = ucwords( str_replace( '_', ' ', $setting ) );

		$this->customizer()->add_setting(
			$setting . '[top]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customizer()->add_setting(
			$setting . '[right]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customizer()->add_setting(
			$setting . '[bottom]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customizer()->add_setting(
			$setting . '[left]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customizer()->add_control(
			new GroupSettings(
				$this->customizer(), $setting,
				array(
					'label'    => esc_html( $title ),
					'section'  => $this->section,
					'inline'   => true,
					'type'     => 'number',
					'settings' => array(
						'top'    => $setting . '[top]',
						'right'  => $setting . '[right]',
						'bottom' => $setting . '[bottom]',
						'left'   => $setting . '[left]',
					),
				)
			)
		);
	}

}
