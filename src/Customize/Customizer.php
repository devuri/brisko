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
use Brisko\Customize\Settings\SelectiveRefresh;
use WP_Customize_Manager;

class Customizer
{
    const OPTIONS_CAPABILITY = 'edit_theme_options';
    const THEME_PANEL_NAME   = 'brisko_theme_panel';
    const SECTIONS_FILTER    = 'brisko_sections';
    protected $customizer;
    protected $sections;

    public function __construct()
    {
        // sections to register
        $this->sections = [
            'general'    => esc_html__( 'General' ),
            'layout'     => esc_html__( 'Layout' ),
            'navigation' => esc_html__( 'Navigation' ),
            'header'     => esc_html__( 'Header' ),
            'pages'      => esc_html__( 'Pages' ),
            'blog'       => esc_html__( 'Blog / Archive' ),
        ];

        if ( ! self::is_disabled_footer() ) {
            $this->sections['footer'] = esc_html__( 'Footer' );
        }

        $this->sections['advanced'] = esc_html__( 'Advanced' );
    }

    public function init()
    {
        add_action( 'customize_register', [ $this, 'build_customizer' ] );
    }

    /**
     * Create Brisko Theme Panel.
     *
     * @param WP_Customize_Manager $wp_customizer .
     */
    public function build_customizer( $wp_customizer )
    {
        $this->set_customizer( $wp_customizer );

        $this->customizer->add_panel(
            self::THEME_PANEL_NAME,
            [
                'priority'       => 10,
                'capability'     => self::OPTIONS_CAPABILITY,
                'theme_supports' => '',
                'title'          => esc_html__( 'Theme Options', 'brisko' ),
            ]
        );

        // register sections.
        foreach ( $this->get_sections() as $skey => $section ) {
            $this->customizer->add_section(
                'brisko_section_' . $skey,
                [
                    'title'      => ' » ' . $section,
                    'capability' => self::OPTIONS_CAPABILITY,
                    'panel'      => self::THEME_PANEL_NAME,
                ]
            );
        } // foreach

        General::settings( $this->customizer );
        if ( ! is_brisko_hybrid_fse() ) {
            Layout::settings( $this->customizer );
            Navigation::settings( $this->customizer );
            Header::settings( $this->customizer );
            Pages::settings( $this->customizer );
            Blog::settings( $this->customizer );
            Footer::settings( $this->customizer );
        }
        Advanced::settings( $this->customizer );

        if ( ! is_brisko_hybrid_fse() ) {
            SelectiveRefresh::settings( $this->customizer );
        }

        // do_action( 'brisko_customizer_settings', $this->customizer );
    }

    public function set_customizer( WP_Customize_Manager $wp_customizer )
    {
        $this->customizer = $wp_customizer;
    }

    public function get_sections()
    {
        return apply_filters( self::SECTIONS_FILTER, $this->sections );
    }

    private function humanize( $section_name )
    {
        return ucwords( $section_name );
    }

    private static function is_disabled_footer()
    {
        if ( get_theme_mod( 'disable_footer', false ) ) {
            return true;
        }

        return false;
    }
}
