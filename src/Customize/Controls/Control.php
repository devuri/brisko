<?php

namespace Brisko\Customize\Controls;

class Control
{
    /**
     * Create Section.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     * @param string               $label        .
     * @param string               $section      .
     * @param string               $description  .
     */
    public function separator( $wp_customize, $label = 'Custom Label', $section = null, $description = '' )
    {
        $id = sanitize_title( $label );
        $id = str_replace( '-', '_', $id );
        $id = $id . '_separator_control';

        $wp_customize->add_setting(
            $id,
            [
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );
        $wp_customize->add_control(
            new SeparatorControl(
                $wp_customize,
                $id,
                [
                    'label'       => esc_html( $label ),
                    'description' => $description,
                    'section'     => $section,
                ]
            )
        );
    }

    /**
     * Create Section.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     * @param string               $label        .
     * @param string               $section      .
     * @param string               $description  .
     */
    public function header_title( $wp_customize, $label = 'Custom Title', $section = null, $description = null )
    {
        $id = sanitize_title( $label );
        $id = str_replace( '-', '_', $id );
        $id = $id . '_heading_control';

        $wp_customize->add_setting(
            $id,
            [
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );
        $wp_customize->add_control(
            new HeaderControl(
                $wp_customize,
                $id,
                [
                    'label'       => esc_html( $label ),
                    'section'     => $section,
                    'description' => $description,
                ]
            )
        );
    }
}
