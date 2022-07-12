<?php

namespace Brisko\Customize\Settings;

use Brisko\Contracts\SettingsInterface;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Traits\SettingsTrait;

class Layout implements SettingsInterface
{
	use SettingsTrait;

	/**
	 * Lets build out the customizer settings.
	 *
	 * Create new customizer settings here is where we will add new panel sections
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function settings( $wp_customize )
	{

		// Layout Settings.
		( new Control() )->separator( $wp_customize, esc_html__( 'Layout', 'brisko' ), self::section() );

		// Navigation.
		$wp_customize->add_setting(
			'navigation_width',
			[
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			]
		);

		$wp_customize->add_control(
			'navigation_width',
			[
				'label'       => esc_html__( 'Navigation', 'brisko' ),
				'description' => esc_html__( 'set Navigation width', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_layout_options(),
			]
		);

		// Blog Post.
		$wp_customize->add_setting(
			'blog_width',
			[
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			]
		);

		$wp_customize->add_control(
			'blog_width',
			[
				'label'       => esc_html__( 'Blog', 'brisko' ),
				'description' => esc_html__( 'set Blog width', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_layout_options(),
			]
		);

		// Pages.
		$wp_customize->add_setting(
			'page_width',
			[
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			]
		);

		$wp_customize->add_control(
			'page_width',
			[
				'label'       => esc_html__( 'Pages', 'brisko' ),
				'description' => esc_html__( 'set Page width', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_layout_options(),
			]
		);

		// Archives.
		$wp_customize->add_setting(
			'archive_width',
			[
				'sanitize_callback' => 'sanitize_html_class',
				'default'           => 'container',
			]
		);

		$wp_customize->add_control(
			'archive_width',
			[
				'label'       => esc_html__( 'Archives', 'brisko' ),
				'description' => esc_html__( 'set Archives width', 'brisko' ),
				'section'     => self::section(),
				'type'        => 'select',
				'choices'     => brisko_layout_options(),
			]
		);
	}
}
