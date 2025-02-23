<?php

namespace Brisko\Customize\Settings;

use Brisko\Contracts\SettingsInterface;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\ToggleControl;
use Brisko\Customize\Traits\SettingsTrait;
use WP_Customize_Color_Control;

class General implements SettingsInterface
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
        // Separator General Settings.
        ( new Control() )->separator( $wp_customize, esc_html__( 'General', 'brisko' ), self::section() );

        // Underline Content Links.
        $wp_customize->add_setting(
            'use_block_templates',
            [
                'default'           => false,
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'brisko_sanitize_checkbox',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'use_block_templates',
                [
                    'label'       => esc_html__( 'Use Block Templates', 'brisko' ),
                    'description' => esc_html__( 'When "Use Block Templates" is enabled, the theme functions in block theme mode, providing full access to the powerful block editor experience. If disabled, you can still utilize block theme features, but the theme will operate in hybrid mode.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Link Color
        $wp_customize->add_setting(
            'link_color',
            [
                'capability'        => 'manage_options',
                'default'           => '#000000',
                'transport'         => self::$transport,
                'sanitize_callback' => 'sanitize_hex_color',
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'link_color',
                [
                    'label'       => esc_html__( 'Link Color', 'brisko' ),
                    'description' => esc_html__( 'Select a color', 'brisko' ),
                    'section'     => self::section(),
                ]
            )
        );

        ( new Control() )->separator( $wp_customize, esc_html__( 'Other Settings', 'brisko' ), self::section() );
        // Underline Content Links.
        $wp_customize->add_setting(
            'underline_post_links',
            [
                'default'           => true,
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'brisko_sanitize_checkbox',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'underline_post_links',
                [
                    'label'   => esc_html__( 'Underline Links', 'brisko' ),
                    'section' => self::section(),
                    'type'    => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Removes extra <p> </p> tags in post and pages
        $wp_customize->add_setting(
            'disable_wpautop',
            [
                'default'           => false,
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'brisko_sanitize_checkbox',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'disable_wpautop',
                [
                    'label'       => esc_html__( 'Disable Auto Paragraph', 'brisko' ),
                    'description' => esc_html__( 'Removes extra <p> </p> tags in post and pages, by default WordPress replaces double line breaks with paragraph elements.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Load user assets
        $wp_customize->add_setting(
            'enqueue_user_assets',
            [
                'default'           => false,
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'brisko_sanitize_checkbox',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'enqueue_user_assets',
                [
                    'label'       => esc_html__( 'Enqueue Extra assets', 'brisko' ),
                    'description' => esc_html__( 'Allows for extra styles and scripts in the wp-content/brisko/assets directory, the theme automatically load them if they exist.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );
    }
}
