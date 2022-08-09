<?php

namespace Brisko\Setup;

use Brisko\Contracts\EnqueueInterface;
use Brisko\Theme;

class Styles implements EnqueueInterface
{
    /**
     * Styles.
     *
     * @return void
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'custom_css' ] );
    }

    /**
     * Enqueue scripts.
     */
    public function enqueue()
    {

        // underscores.
        if ( true === get_theme_mod( 'enable_underscores', true ) ) {
            wp_enqueue_style( 'underscores' );
        }

        // brisko.
        if ( true === get_theme_mod( 'enable_brisko', true ) ) {
            wp_enqueue_style( 'brisko' );
        }

        // bootstrap 5.
        self::bootstrap5();

        // bootstrap grid.
        if ( true === get_theme_mod( 'enable_bootstrap_grid', false ) ) {
            wp_enqueue_style( 'bootstrap-grid' );
        }

        // bootstrap.
        if ( true === get_theme_mod( 'enable_bootstrap', true ) ) {
            wp_enqueue_style( 'bootstrap' );
        }

        // brisko theme styles.
        if ( true === get_theme_mod( 'enable_theme_styles', true ) ) {
            wp_enqueue_style( 'brisko-theme' );
        }

        // custom styles.
        wp_enqueue_style( 'custom-styles' );

        // rtl .
        wp_style_add_data( 'brisko-style', 'rtl', 'replace' );
    }

    /**
     * Setup static CSS files.
     *
     * @return array .
     */
    public static function css_files()
    {
        $files = [
            'underscores'              => Assets::uri( 'css/underscores.min.css' ),
            // bootstrap 5.
            'bootstrap5-grid'          => Assets::uri( 'bootstrap5/css/bootstrap-grid.min.css' ),
            'bootstrap5-grid-rtl'      => Assets::uri( 'bootstrap5/css/bootstrap-grid.rtl.min.css' ),
            'bootstrap5'               => Assets::uri( 'bootstrap5/css/bootstrap.min.css' ),
            'bootstrap5-rtl'           => Assets::uri( 'bootstrap5/css/bootstrap.rtl.min.css' ),
            'bootstrap5-utilities'     => Assets::uri( 'bootstrap5/css/bootstrap-utilities.min.css' ),
            'bootstrap5-utilities-rtl' => Assets::uri( 'bootstrap5/css/bootstrap-utilities.rtl.min.css' ),
            // bootstrap 4.
            'bootstrap-grid'           => Assets::uri( 'bootstrap/css/bootstrap-grid.min.css' ),
            'bootstrap'                => Assets::uri( 'bootstrap/css/bootstrap.min.css' ),
            // uikit.
            'uikit'                    => Assets::uri( 'uikit/css/uikit.min.css' ),
            'brisko'                   => Assets::uri( 'css/brisko.min.css' ),
            'custom-styles'            => Assets::uri( 'css/custom-styles.min.css' ),
            'brisko-theme'             => get_stylesheet_uri(),
        ];

        return apply_filters( 'brisko_css_assets', $files );
    }

    /**
     * Register all styles.
     *
     * @return null|void
     */
    public function register()
    {
        if ( empty( self::css_files() ) || ! self::css_files() ) {
            return null;
        }

        foreach ( self::css_files() as $handle => $file ) {
            wp_register_style( $handle, $file, [], md5( $file ) );
        }
    }

    /**
     * Get element space padding or margin.
     *
     * @param string $theme_mod .
     * @param string $default   .
     *
     * @return string .
     */
    public function element_mod( $theme_mod = 'footer_padding', $default = '16px' )
    {
        if ( get_theme_mod( $theme_mod ) ) {
            return implode( 'px ', get_theme_mod( $theme_mod ) ) . 'px';
        }

        return $default;
    }

    /**
     * Custom Theme styles.
     */
    public function custom_styles()
    {

        // Get the theme setting.
        $bttns                     = 'button, input[type="button"], input[type="reset"], input[type="submit"]';
        $color                     = get_theme_mod( 'link_color', '#000000' );
        $navigation_background     = get_theme_mod( 'nav_background_color', '#fff' );
        $nav_padding               = get_theme_mod( 'navigation_padding', 10 );
        $nav_margin_bottom         = get_theme_mod( 'nav_margin_bottom', 2 );
        $underline_post_links      = get_theme_mod( 'underline_post_links', true );
        $archive_header_background = get_theme_mod( 'archive_header_background', '#ffffff' );
        $archive_header_text_color = get_theme_mod( 'archive_header_text_color', '#000000' );
        $archive_header_padding    = $this->element_mod( 'archive_header_padding', '0px' );
        $archive_header_margin     = $this->element_mod( 'archive_header_margin', '0px' );
        $transform_tags            = get_theme_mod( 'text_transform_tags', 'none' );

        // footer.
        $footer_links            = get_theme_mod( 'footer_links_color', '#000000' );
        $footer_text_align       = get_theme_mod( 'footer_text_align', 'center' );
        $footer_padding          = $this->element_mod( 'footer_padding', '16px' );
        $footer_margin           = $this->element_mod( 'footer_margin', '0px' );
        $footer_text             = get_theme_mod( 'footer_text_color', '#212529' );
        $footer_background_color = get_theme_mod( 'footer_background_color', '#fff' );
        $footer_border_color     = get_theme_mod( 'footer_border_color', '#e2e8f0' );

        // CSS array .
        $custom_styles                              = [];
        $custom_styles['links']                     = "body a{color: {$color};}body a:hover{color: {$color};}";
        $custom_styles['link_hover']                = "a:focus, a:hover {color: {$color};}";
        $custom_styles['nav_links']                 = "nav.main-navigation a:hover {color: {$color};background-color: #F8F9FA;}";
        $custom_styles['nav_background']            = ".brisko-navigation {background-color: {$navigation_background};}";
        $custom_styles['archive_header_background'] = ".archive-header {background-color: {$archive_header_background};}";
        $custom_styles['archive_header_text_color'] = ".archive-header {color: {$archive_header_text_color};}";
        $custom_styles['archive_header_padding']    = ".archive-header {padding: {$archive_header_padding};}";
        $custom_styles['archive_header_margin']     = ".archive-header {margin: {$archive_header_margin};}";
        $custom_styles['nav_padding']               = ".brisko-navigation {padding: {$nav_padding}px;}";
        $custom_styles['margin_bottom']             = ".brisko-navigation {margin-bottom: {$nav_margin_bottom}px;}";
        $custom_styles['bttn_color']                = "{$bttns} {display: inline-block;color: #fff;background-color: {$color}; border-color: {$color};}";
        $custom_styles['footer_links']              = ".site-footer a{color: {$footer_links};}footer a:hover{color: {$footer_links};}";
        $custom_styles['footer_text_align']         = ".site-info {text-align: {$footer_text_align};}";
        $custom_styles['footer_padding']            = ".site-footer {padding: {$footer_padding};}";
        $custom_styles['footer_margin']             = ".site-footer {margin: {$footer_margin};}";
        $custom_styles['footer_text']               = ".site-footer {color: {$footer_text};}";
        $custom_styles['tag_links']                 = ".tags-links {text-transform: {$transform_tags};}";
        $custom_styles['footer_background']         = ".site-footer {background-color: {$footer_background_color};}";
        $custom_styles['footer_border_color']       = ".site-footer {border-color: {$footer_border_color};}";

        if ( false === $underline_post_links ) {
            $custom_styles['underline_body_links'] = 'body a{text-decoration: none;}';
            $custom_styles['underline_post_links'] = '.post-article a {text-decoration: none;}';
        }

        // css output.
        return $custom_styles;
    }

    /**
     * Custom Theme styles.
     */
    public function custom_css()
    {
        wp_add_inline_style( 'custom-styles', $this->minified_css() );
    }

    /**
     * Sanitize CSS.
     *
     * For now just strip_tags (the WordPress way) and preg_replace to escape < in certain cases but might do full CSS escaping in the future, see:
     * https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#rule-4-css-encode-and-strictly-validate-before-inserting-untrusted-data-into-html-style-property-values
     * https://github.com/twigphp/Twig/blob/3.x/src/Extension/EscaperExtension.php#L300-L319
     * https://github.com/laminas/laminas-escaper/blob/2.8.x/src/Escaper.php#L205-L221
     * https://plugins.svn.wordpress.org/autoptimize/tags/2.8.0/classes/autoptimizeStyles.php
     *
     * @param string $css the to be sanitized CSS.
     *
     * @return string sanitized CSS.
     */
    public function sanitize_css( $css )
    {
        $css = wp_strip_all_tags( $css );
        if ( false !== strpos( $css, '<' ) ) {
            $css = preg_replace( '#<(\/?\w+)#', '\00003C$1', $css );
        }

        return $css;
    }

    /**
     * Adds Bootstrap 5 support.
     *
     * Implements theme mods for the following:
     *
     * bootstrap5-grid
     * bootstrap5-grid-rtl
     * bootstrap5
     * bootstrap5-rtl
     * bootstrap5-utilities
     * bootstrap5-utilities-rtl
     *
     * @return void
     */
    protected static function bootstrap5()
    {
        if ( true === get_theme_mod( 'enable_bootstrap5_grid', false ) ) {
            wp_enqueue_style( 'bootstrap5-grid' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_grid_rtl', false ) ) {
            wp_enqueue_style( 'bootstrap5-grid-rtl' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5', false ) ) {
            wp_enqueue_style( 'bootstrap5' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_rtl', false ) ) {
            wp_enqueue_style( 'bootstrap5-rtl' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_utilities', false ) ) {
            wp_enqueue_style( 'bootstrap5-utilities' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_utilities_rtl', false ) ) {
            wp_enqueue_style( 'bootstrap5-utilities-rtl' );
        }
    }

    /**
     * CSS Minifier Compressor.
     *
     * @return false|string minified css output.
     */
    private function minified_css()
    {
        if ( ! \is_array( $this->custom_styles() ) ) {
            return false;
        }

        $css_styles = $this->custom_styles();
        $css_styles = implode( "\n", $css_styles );

        return $this->sanitize_css( $css_styles );
    }
}
