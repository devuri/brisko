<?php

namespace Brisko\Customize\Settings;

use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\GroupSettings;
use Brisko\Customize\Controls\SeparatorControl;

class Settings
{
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
	 * Construct
	 *
	 * @param WP_Customize_Control $wp_customize .
	 * @param string $transport .
	 * @param string $section .
	 */
	public function __construct( $wp_customize, $transport, $section ) {
		$this->customize = $wp_customize;
		$this->transport = $transport;
		$this->section   = $section;
	}

	/**
	 * Padding
	 *
	 * @param string $setting .
	 *
	 * @return void
	 */
	public function padding( $setting = 'footer' ) {

		$title = ucfirst( $setting . ' Padding' );

		$this->customize->add_setting(
			$setting . '_padding[top]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_padding[right]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_padding[bottom]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_padding[left]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_control(
			new GroupSettings(
				$this->customize, $setting . '_padding',
				array(
					'label'    => esc_html( $title ),
					'section'  => $this->section,
					'inline'   => true,
					'type'     => 'number',
					'settings' => array(
						'top'    => $setting . '_padding[top]',
						'right'  => $setting . '_padding[right]',
						'bottom' => $setting . '_padding[bottom]',
						'left'   => $setting . '_padding[left]',
					),
				)
			)
		);
	}

	/**
	 * Margin
	 *
	 * @param string $setting .
	 *
	 * @return void
	 */
	public function margin( $setting = 'footer' ) {

		$title = ucfirst( $setting . ' Margin' );

		$this->customize->add_setting(
			$setting . '_margin[top]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_margin[right]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_margin[bottom]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_setting(
			$setting . '_margin[left]', array(
				'capability'        => 'edit_theme_options',
				'default'           => '0',
				'transport'         => $this->transport,
				'sanitize_callback' => 'brisko_sanitize_number',
			)
		);

		$this->customize->add_control(
			new GroupSettings(
				$this->customize, $setting . '_margin',
				array(
					'label'    => esc_html( $title ),
					'section'  => $this->section,
					'inline'   => true,
					'type'     => 'number',
					'settings' => array(
						'top'    => $setting . '_margin[top]',
						'right'  => $setting . '_margin[right]',
						'bottom' => $setting . '_margin[bottom]',
						'left'   => $setting . '_margin[left]',
					),
				)
			)
		);
	}

}
