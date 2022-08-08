<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;

/**
 * The Compatibility class.
 *
 * Used for for Header Footer Blocks plugin.
 */
class Compat implements SetupInterface
{
    /**
     * Get Class.
     *
     * @return void
     */
    public function init()
    {
        $this->hfe_header();
        $this->hfe_footer();
    }

    /**
     * Compatibility for Header Footer Blocks plugin.
     *
     * @see https://wordpress.org/plugins/header-footer-elementor
     */
    public function hfe_header()
    {
        if ( \function_exists( 'hfe_header_enabled' ) && hfe_header_enabled() ) {
            add_action( 'hfe_footer', [ $this, 'template_header' ], 99 );
        }
    }

    /**
     * Compatibility for Header Footer Blocks plugin.
     *
     * @see https://wordpress.org/plugins/header-footer-elementor
     */
    public function hfe_footer()
    {
        if ( \function_exists( 'hfe_render_before_footer' ) && hfe_is_before_footer_enabled() ) {
            add_action( 'brisko_before_footer', 'hfe_render_before_footer' );
        }

        if ( \function_exists( 'hfe_footer_enabled' ) && hfe_footer_enabled() ) {
            add_action( 'hfe_footer', [ $this, 'template_footer' ], 99 );
        }
    }

    /**
     * Brisko Header template.
     *
     * @return void
     */
    public function template_header()
    {
        get_template_part( 'template-parts/header', 'header' );
    }

    /**
     * Brisko Footer template.
     *
     * @return void
     */
    public function template_footer()
    {
        if ( ! get_theme_mod( 'disable_footer', false ) ) {
            get_template_part( 'template-parts/footer', 'footer' );
        }
    }
}
