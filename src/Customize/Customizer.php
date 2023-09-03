<?php

namespace Brisko\Customize;

use Brisko\Contracts\SetupInterface;

class Customizer implements SetupInterface
{
    /**
     * Initialize the Customizer.
     *
     * @see Theme __construct
     *
     * @return void
     */
    public function init()
    {
        add_action( 'customize_register', [ $this, 'brisko_customizer' ] );
    }

    /**
     * Create Brisko Theme Panel.
     *
     * @param WP_Customize_Manager $wp_customize .
     */
    public function brisko_theme_panel( $wp_customize )
    {
        $wp_customize->add_panel(
            'brisko_theme_panel',
            [
                'priority'       => 10,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => esc_html__( 'Theme Options', 'brisko' ),
            ]
        );
    }

    /**
     * Build Class.
     *
     * @return object .
     */
    public function build()
    {
        return Build::get();
    }

    /**
     * Theme Customizer.
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize .
     */
    public function brisko_customizer( $wp_customize )
    {
        // Add Panel .
        $this->brisko_theme_panel( $wp_customize );

        // Sections
        $this->build()->sections( $wp_customize );

        // Settings
        $this->build()->settings( $wp_customize );
    }
}
