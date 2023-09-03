<?php

namespace Brisko\Customize\Settings;

use Brisko\Contracts\SettingsInterface;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Controls\ToggleControl;
use Brisko\Customize\Traits\SettingsTrait;

class Pages implements SettingsInterface
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
        // Separator Pages Settings.
        ( new Control() )->separator( $wp_customize, esc_html__( 'Pages', 'brisko' ), self::section() );

        // Display Page Header.
        $wp_customize->add_setting(
            'display_page_header',
            [
                'default'           => absint( 0 ),
                'capability'        => 'edit_theme_options',
                'transport'         => self::$transport,
                'sanitize_callback' => 'absint',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'display_page_header',
                [
                    'label'       => esc_html__( 'Show Page Title', 'brisko' ),
                    'description' => esc_html__( 'display the page title for each page', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );

        // Pure content output.
        $wp_customize->add_setting(
            'enable_pure_content',
            [
                'default'           => absint( 0 ),
                'capability'        => 'edit_theme_options',
                'transport'         => self::$transport,
                'sanitize_callback' => 'absint',
            ]
        );

        $wp_customize->add_control(
            new ToggleControl(
                $wp_customize,
                'enable_pure_content',
                [
                    'label'       => esc_html__( 'Enable Pure Content (recommended)', 'brisko' ),
                    'description' => esc_html__( 'Pure content will bypass `the_content` and use `get_the_content`, works better when using html, and fixes bootstrap style issues. Note: this will bypass filters that apply to the_content, some page builders will not work.', 'brisko' ),
                    'section'     => self::section(),
                    'type'        => 'light',
                    // light, ios, flat.
                ]
            )
        );
    }
}
