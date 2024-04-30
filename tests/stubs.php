<?php

if ( ! \defined('BRISKO_TEST_MODE')) {
    \define('BRISKO_TEST_MODE', true);
}

/**
 * Elementor Header & Footer Builder.
 *
 * @see https://wordpress.org/plugins/header-footer-elementor/
 */
function hfe_is_before_footer_enabled()
{
}

/**
 * Elementor Header & Footer Builder.
 *
 * @see https://wordpress.org/plugins/header-footer-elementor/
 */
function hfe_render_before_footer()
{
}

if ( ! \function_exists( 'esc_html__' ) ) {
    function esc_html__($string, $text_domain = 'brisko' )
    {
        return $string;
    }
}
