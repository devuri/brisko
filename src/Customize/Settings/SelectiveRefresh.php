<?php

namespace Brisko\Customize\Settings;

class SelectiveRefresh
{
    /**
     * Customizer transport.
     *
     * @var $transport
     */
    public static $transport = 'postMessage';

    /**
     * Lets build out the customizer settings.
     *
     * Create new customizer settings here is where we will add new panel sections
     *
     * @param WP_Customize_Manager $wp_customize .
     */
    public static function settings( $wp_customize )
    {
        /*
         * Customize_Selective_Refresh
         *
         * @link https://developer.wordpress.org/reference/classes/wp_customize_selective_refresh/add_partial/
         */
        $wp_customize->get_setting( 'link_color' )->transport     = self::$transport;
        $wp_customize->get_setting( 'featured_image' )->transport = self::$transport;

        // Header.
        // Blog.
        // General.
        $wp_customize->get_setting( 'blogname' )->transport         = self::$transport;
        $wp_customize->get_setting( 'blogdescription' )->transport  = self::$transport;
        $wp_customize->get_setting( 'header_textcolor' )->transport = self::$transport;

        // Navigation.
        $wp_customize->get_setting( 'nav_background_color' )->transport = self::$transport;

        // Footer.
        $wp_customize->get_setting( 'footer_copyright' )->transport = self::$transport;
        $wp_customize->get_setting( 'poweredby' )->transport        = self::$transport;

        // Advanced.

        if ( isset( $wp_customize->selective_refresh ) ) {
            // copyright.
            $wp_customize->selective_refresh->add_partial(
                'footer_copyright',
                [
                    'selector'        => '.brisko-footer-copyright',
                    'render_callback' => 'brisko_customize_partial_copyright',
                ]
            );

            // poweredby.
            $wp_customize->selective_refresh->add_partial(
                'poweredby',
                [
                    'selector'        => '.brisko-footer-poweredby',
                    'render_callback' => 'brisko_customize_partial_poweredby',
                ]
            );

            // post-featured-image.
            $wp_customize->selective_refresh->add_partial(
                'featured_image',
                [
                    'selector'        => '.post-featured-image',
                    'render_callback' => 'brisko_customize_partial_featured_image',
                ]
            );

            // blogname.
            $wp_customize->selective_refresh->add_partial(
                'blogname',
                [
                    'selector'        => '.site-title a',
                    'render_callback' => 'brisko_customize_partial_blogname',
                ]
            );
            // blogdescription.
            $wp_customize->selective_refresh->add_partial(
                'blogdescription',
                [
                    'selector'        => '.site-description',
                    'render_callback' => 'brisko_customize_partial_blogdescription',
                ]
            );
        }// end if
    }
}
