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
                    'description' => esc_html__( 'Allows for extra styles and scripts in the wp-content/brisko_assets directory, the theme automatically loads them if they exist.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Display the Hooks.
        $wp_customize->add_setting(
            'display_brisko_hooks',
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
                'display_brisko_hooks',
                [
                    'label'       => esc_html__( 'Display Action/Filter Hooks', 'brisko' ),
                    'description' => esc_html__( 'Requires the Brisko Elements Plugin', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Link Color
        if ( ! is_brisko_hybrid_fse() ) {
            self::global_link_color_settings( $wp_customize );
        }

        ( new Control() )->separator( $wp_customize, esc_html__( 'Other Settings', 'brisko' ), self::section() );

        if ( get_theme_mod( 'use_block_templates', false ) ) {
            self::info_note(
                $wp_customize,
                'block_other',
                __( '<strong>Note:</strong> Some Settings are disabled when "Use Block Templates" is set', 'brisko' )
            );

            return;
        }

        if ( ! is_brisko_hybrid_fse() ) {
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
        }

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

        // hybrid settings.
        if ( ! get_theme_mod( 'use_block_templates', false ) ) {
            self::hybrid_mode_settings( $wp_customize );
        }
    }

    protected static function global_link_color_settings( $wp_customize )
    {
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
    }

    protected static function hybrid_mode_settings( $wp_customize )
    {
        ( new Control() )->separator( $wp_customize, esc_html__( 'Hybrid Mode', 'brisko' ), self::section() );

        // Hybrid Mode
        $wp_customize->add_setting(
            'enable_hybrid_mode',
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
                'enable_hybrid_mode',
                [
                    'label'       => esc_html__( 'Enable Hybrid Mode', 'brisko' ),
                    'description' => esc_html__( 'Will render the block header and footer template in hybrid theme mode.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        if ( ! get_theme_mod( 'enable_hybrid_mode', false ) ) {
            // FSE Layouts
            $wp_customize->add_setting(
                'enable_fse_layout',
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
                    'enable_fse_layout',
                    [
                        'label'       => esc_html__( 'Enable FSE Layouts', 'brisko' ),
                        'description' => esc_html__( 'Sets up support for full width etc.', 'brisko' ),
                        'section'     => self::section(),
                        'type'        => 'light',
                        // light, ios, flat.
                    ]
                )
            );
        }

        // Custom Styles
        $wp_customize->add_setting(
            'use_custom_styles',
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
                'use_custom_styles',
                [
                    'label'       => esc_html__( 'Enable Custom Styles', 'brisko' ),
                    'description' => esc_html__( 'Custom Styles, may not be needed in hybrid theme mode or FSE mode.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );
    }
}
