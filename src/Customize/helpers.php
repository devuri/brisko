<?php

use Brisko\Setup\Assets;

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_copyright()
{
    echo esc_html( get_theme_mod( 'footer_copyright' ) );
}

/**
 * Render Selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_poweredby()
{
    echo wp_kses_post( get_theme_mod( 'poweredby' ) );
}

/**
 * Render Selective refresh partial.
 *
 * @return void
 */
function brisko_footer_padding_partial()
{
    get_template_part( 'template-parts/footer', 'footer' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_blogname()
{
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function brisko_customize_partial_blogdescription()
{
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function brisko_customize_preview_js()
{
    wp_enqueue_script( 'brisko-customizer', Assets::uri('/js/customizer.js'), [ 'customize-preview' ], Brisko\Theme::VERSION, true );
}

/**
 * Checkbox sanitization.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 *
 * @return bool Whether the checkbox is checked.
 *
 * @see https://github.com/WPTT/code-examples/blob/master/customizer/sanitization-callbacks.php
 */
function brisko_sanitize_checkbox( $checked )
{
    // @phpstan-ignore-next-line.
    return ( isset( $checked ) && true == $checked ) ? true : false;
}

/**
 * Classes sanitization.
 *
 * Sanitization callback for 'css classes'
 *
 * @param string $classes .
 *
 * @return string $classes comma separated values.
 */
function brisko_sanitize_classes( $classes )
{
    $classes = sanitize_text_field( $classes );
    $classes = explode( ',', $classes );
    $classes = array_map( 'sanitize_title', $classes );

    return implode( ',', $classes );
}

/**
 * Number sanitization.
 *
 * Sanitization callback for 'numbers'
 *
 * @param string $number .
 *
 * @return numeric-string $number .
 */
function brisko_sanitize_number( $number )
{
    $number = sanitize_text_field( $number );
    $number = \intval( $number );

    return (string) $number;
}

/**
 * Quick Tip.
 *
 * @param string $info .
 */
function brisko_section_info( $info = '' )
{
    $css_style = 'padding: 16px;border-radius: 2px;font-style: italic;';

    // render info.
    return sprintf(
        // translators: %2$s: Plugin info.
        __( '<p style="%1$s"> %2$s </p>', 'brisko' ),
        $css_style,
        esc_html( $info )
    );
}

/**
 * Theme Layout options.
 *
 * Used for Theme Layout Customizer.
 *
 * @return string[] .
 *
 * @psalm-return array{container: string, 'container-fluid': string}
 */
function brisko_layout_options()
{
    return [
        'container'       => esc_html__( 'Boxed', 'brisko' ),
        'container-fluid' => esc_html__( 'Full Width', 'brisko' ),
    ];
}

/**
 * Theme Layout options.
 *
 * Used for Theme Layout Customizer.
 *
 * @return string[] .
 *
 * @psalm-return array{left: string, right: string, center: string, justify: string, initial: string, inherit: string}
 */
function brisko_text_align_options()
{
    return [
        'left'    => esc_html__( 'Left: Align the text to the left', 'brisko' ),
        'right'   => esc_html__( 'Right: Aligns the text to the right', 'brisko' ),
        'center'  => esc_html__( 'Center: Centers the text', 'brisko' ),
        'justify' => esc_html__( 'Justify: Stretches the text equal width', 'brisko' ),
        'initial' => esc_html__( 'Initial: Sets to its default value', 'brisko' ),
        'inherit' => esc_html__( 'Inherit: Inherits from its parent element', 'brisko' ),
    ];
}

/**
 * Theme text-tranform choices.
 *
 * Used for Theme text-tranform in the Customizer.
 *
 * @return string[] .
 *
 * @psalm-return array{none: string, capitalize: string, uppercase: string, lowercase: string}
 */
function brisko_text_tranform_choices()
{
    return [
        'none'       => esc_html__( 'none', 'brisko' ),
        'capitalize' => esc_html__( 'Capitalize', 'brisko' ),
        'uppercase'  => esc_html__( 'Uppercase', 'brisko' ),
        'lowercase'  => esc_html__( 'Lowercase', 'brisko' ),
    ];
}
