<?php

namespace Brisko\Customize\Settings;

use Brisko\Contracts\SettingsInterface;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Traits\SettingsTrait;
use WP_Customize_Code_Editor_Control;

class Footer implements SettingsInterface
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
        // Footer Settings.
        ( new Control() )->separator( $wp_customize, esc_html__( 'Footer Settings', 'brisko' ), self::section() );

        if ( get_theme_mod( 'enable_hybrid_mode', false ) ) {
            self::info_note(
                $wp_customize,
                'block_header',
                __( '<strong>Note:</strong> Some Settings are disabled when "Hybrid Mode is Enabled" is set', 'brisko' )
            );

            return;
        }

        // Copyright section .
        $wp_customize->add_setting(
            'footer_copyright',
            [
                'default'           => wp_kses_post( 'Copyright © 2020 ' . get_bloginfo( 'name' ) . '.' ),
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        $wp_customize->add_control(
            'footer_copyright',
            [
                'label'       => esc_html__( 'Copyright Text', 'brisko' ),
                'description' => esc_html__( 'edit footer section', 'brisko' ),
                'section'     => self::section(),
                'type'        => 'text',
            ]
        );

        ( new Control() )->separator( $wp_customize, esc_html__( 'Powered by', 'brisko' ), self::section() );
        // Powered By.
        $wp_customize->add_setting(
            'poweredby',
            [
                'default'           => wp_kses_post( ' | Powered by <a href="https://wpbrisko.com">Brisko WordPress Theme</a>' ),
                'capability'        => self::$capability,
                'transport'         => self::$transport,
                'sanitize_callback' => 'wp_kses_post',
            ]
        );

        $wp_customize->add_control(
            new WP_Customize_Code_Editor_Control(
                $wp_customize,
                'poweredby',
                [
                    'label'       => esc_html__( 'Powered By', 'brisko' ),
                    'description' => esc_html__( 'edit Powered by section, html can be used', 'brisko' ),
                    'section'     => self::section(),
                    'inline'      => true,
                    'type'        => 'code_editor',
                    'code_type'   => 'text/html',
                ]
            )
        );

        // footer_text_align.
        $wp_customize->add_setting(
            'footer_text_align',
            [
                'sanitize_callback' => 'sanitize_html_class',
                'default'           => 'center',
            ]
        );

        $wp_customize->add_control(
            'footer_text_align',
            [
                'label'       => esc_html__( 'Text Align', 'brisko' ),
                'description' => esc_html__( 'set CSS text-align Property', 'brisko' ),
                'section'     => self::section(),
                'type'        => 'select',
                'choices'     => brisko_text_align_options(),
            ]
        );

        ( new Control() )->separator(
            $wp_customize,
            esc_html__( 'Advanced Settings', 'brisko' ),
            self::section(),
            'Brisko Elements Advanced Options'
        );

        ( new Control() )->header_title(
            $wp_customize,
            esc_html__( 'Advanced Footer Options', 'brisko' ),
            self::section(),
            esc_html__( 'Colors, Borders, Padding and Custom HTML.', 'brisko' )
        );

        // Advanced options section.
        $args = [
            'wp_customize' => $wp_customize,
            'transport'    => self::$transport,
            'section'      => self::section(),
            'short_name'   => self::short_name(),
        ];
        do_action( "brisko_advanced_options_{$args['short_name']}", $args );

        // Install plugin.
        if ( ! did_action( 'brisko_elements_loaded' ) ) {
            ( new Control() )->header_title(
                $wp_customize,
                esc_html__( 'Brisko Elements Plugin', 'brisko' ),
                self::section(),
                self::install_plugin()
            );
        }
    }
}
