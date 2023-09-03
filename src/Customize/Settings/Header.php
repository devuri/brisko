<?php

namespace Brisko\Customize\Settings;

use Brisko\Contracts\SettingsInterface;
use Brisko\Customize\Controls\Control;
use Brisko\Customize\Traits\SettingsTrait;

class Header implements SettingsInterface
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
        // Separator Header Image Settings.
        ( new Control() )->separator( $wp_customize, esc_html__( 'Header Image', 'brisko' ), self::section() );
        // Header Image
        $wp_customize->add_setting(
            'header_image_display',
            [
                'sanitize_callback' => 'sanitize_html_class',
                'default'           => 'this-entire-site',
            ]
        );

        $wp_customize->add_control(
            'header_image_display',
            [
                'label'       => esc_html__( 'Header Image', 'brisko' ),
                'description' => esc_html__( 'display settings for the header image', 'brisko' ),
                'section'     => self::section(),
                'type'        => 'select',
                'choices'     => [
                    'this-home-page-only' => esc_html__( 'Home Page / Front Page Only', 'brisko' ),
                    'this-entire-site'    => esc_html__( 'Entire Site', 'brisko' ),
                    'this-disabled'       => esc_html__( 'Disabled', 'brisko' ),
                ],
            ]
        );

        // Header Image width.
        $wp_customize->add_setting(
            'header_image_width',
            [
                'sanitize_callback' => 'sanitize_html_class',
                'default'           => 'container',
            ]
        );

        $wp_customize->add_control(
            'header_image_width',
            [
                'label'       => esc_html__( 'Header Image width', 'brisko' ),
                'description' => esc_html__( 'set width for the header image', 'brisko' ),
                'section'     => self::section(),
                'type'        => 'select',
                'choices'     => brisko_layout_options(),
            ]
        );
    }
}
