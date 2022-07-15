<?php

namespace Brisko\Customize;

use Brisko\Customize\Settings\Advanced;
use Brisko\Customize\Settings\Blog;
use Brisko\Customize\Settings\Footer;
use Brisko\Customize\Settings\General;
use Brisko\Customize\Settings\Header;
use Brisko\Customize\Settings\Layout;
use Brisko\Customize\Settings\Navigation;
use Brisko\Customize\Settings\Pages;
use Brisko\Customize\Settings\Pro;
use Brisko\Customize\Settings\SelectiveRefresh;
use Brisko\Traits\Instance;

class Build
{
    use Instance;

    /**
     * Lets build out the customizer sections.
     *
     * Add new customizer sections to the Build.
     *
     * @param WP_Customize_Manager $wp_customize .
     */
    public function settings( $wp_customize )
    {
        // Pro::settings( $wp_customize );
        General::settings( $wp_customize );
        Layout::settings( $wp_customize );
        Navigation::settings( $wp_customize );
        Header::settings( $wp_customize );
        Pages::settings( $wp_customize );
        Blog::settings( $wp_customize );
        Footer::settings( $wp_customize );
        Advanced::settings( $wp_customize );
        SelectiveRefresh::settings( $wp_customize );
    }

    /**
     * Sections.
     *
     * @param WP_Customize_Manager $wp_customize .
     */
    public function sections( $wp_customize )
    {
        foreach ( Sections::get()->sections() as $sectkey => $section ) {

            // build out each section.
            $wp_customize->add_section(
                'brisko_section_' . trim( $sectkey ),
                [
                    'title'      => esc_html( ' » ' . trim( ucwords( $section ) ) ),
                    'capability' => 'edit_theme_options',
                    'panel'      => 'brisko_theme_panel',
                ]
            );
        } // foreach
    }
}
