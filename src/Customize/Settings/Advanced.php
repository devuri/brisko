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
	 * Brisko Section
	 */
	public static function install_plugin() {

		$button  = '<a href="' . esc_url( network_admin_url( 'plugin-install.php?tab=search&type=tag&s=brisko' ) ) . '" class="button button-secondary">';
		$button .= 'Install Plugin';
		$button .= '</a>';
		return "<p>Get a Visual Representation of all the Brisko Theme Hooks.
		Only the Admin user will be able to see the hooks visualization.</p>$button";
	}

	/**
	 * Lets build out the customizer settings
	 *
	 * Create new customizer settings here is where we will add new panel sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize ) {

		// Separator General Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Advanced', 'brisko' ), self::section() );

		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Advanced Settings', 'brisko' ),
			self::section(),
			esc_html__( 'Stylesheets, JavaScript and other Settings.', 'brisko' ),
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Brisko', 'brisko' ), self::section() );
		// Enable Brisko.
		$wp_customize->add_setting(
			'enable_brisko', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_brisko', array(
				'label'   => esc_html__( 'Brisko Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Disable Theme Styles.
		$wp_customize->add_setting(
			'enable_theme_styles', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_theme_styles', array(
				'label'   => esc_html__( 'Theme Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Smooth scroll.
		$wp_customize->add_setting(
			'enable_smooth_scroll', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_smooth_scroll', array(
				'label'   => esc_html__( 'Smooth Scroll', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Footer', 'brisko' ), self::section() );

		// Remove Top Margin.
		$wp_customize->add_setting(
			'footer_remove_top_margin', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'footer_remove_top_margin', array(
				'label'   => esc_html__( 'Remove Top Margin', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Disable Footer.
		$wp_customize->add_setting(
			'disable_footer', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'disable_footer', array(
				'label'   => esc_html__( 'Disable The Footer', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Bootstrap', 'brisko' ), self::section() );
		// Enable Bootstrap.
		$wp_customize->add_setting(
			'enable_bootstrap', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_bootstrap', array(
				'label'   => esc_html__( 'Bootstrap Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Enable Bootstrap JS.
		$wp_customize->add_setting(
			'enable_bootstrap_js', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_bootstrap_js', array(
				'label'   => esc_html__( 'Bootstrap JS', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Enable Bootstrap Reboot.
		$wp_customize->add_setting(
			'enable_bootstrap_reboot', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_bootstrap_reboot', array(
				'label'   => esc_html__( 'Bootstrap Reboot', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Enable Bootstrap Grid.
		$wp_customize->add_setting(
			'enable_bootstrap_grid', array(
				'default'           => false,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_bootstrap_grid', array(
				'label'   => esc_html__( 'Bootstrap Grid', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Underscores', 'brisko' ), self::section() );
		// Enable Underscores.
		$wp_customize->add_setting(
			'enable_underscores', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_underscores', array(
				'label'   => esc_html__( 'Underscores Styles', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		// Enable Underscores JavaScript.
		$wp_customize->add_setting(
			'enable_navigation_js', array(
				'default'           => true,
				'capability'        => 'edit_theme_options',
				'transport'         => self::$transport,
				'sanitize_callback' => 'brisko_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'enable_navigation_js', array(
				'label'   => esc_html__( 'Navigation JS', 'brisko' ),
				'section' => self::section(),
				'type'    => 'checkbox',
			)
		);

		( new Control() )->separator( $wp_customize, esc_html__( 'Plugins', 'brisko' ), self::section() );
		// install plugin.
		( new Control() )->header_title(
			$wp_customize,
			esc_html__( 'Brisko Hooks Plugin', 'brisko' ),
			self::section(),
			self::install_plugin(),
		);

	}
}
