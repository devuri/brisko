<?php

namespace Brisko\Setup;

use Brisko\AbstractEnq;
use Brisko\Theme;

class Styles extends AbstractEnq
{
    public function __construct()
    {
        $this->style_files = $this->set_css_files();
    }

    /**
     * Styles.
     *
     * @return void
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
        if ( ! get_theme_mod( 'use_block_templates', false ) ) {
            add_action( 'wp_enqueue_scripts', [ $this, 'custom_css' ] );
        }
        add_action( 'after_setup_theme', [ $this, 'setup_theme_editor_styles' ] );
    }

    public function setup_theme_editor_styles()
    {
        add_theme_support( 'editor-styles' );

        $this->editor_style( 'milligram', 'enable_milligram' );
        $this->editor_style( 'uikit', 'enable_uikit' );

        // theme.
        $this->editor_style( 'underscores', 'enable_underscores', self::maybe() );
        $this->editor_style( 'brisko', 'enable_brisko', self::maybe() );
        $this->editor_style( self::CORE_CSS, 'enable_core', true );
    }

    /**
     * Register all styles.
     */
    public function register()
    {
        foreach ( $this->style_files as $handle => $file ) {
            wp_register_style( $handle, $file, [], md5( $file ) );
        }
    }

    /**
     * Custom Theme styles.
     */
    public function custom_css()
    {
        wp_add_inline_style( 'custom-styles', $this->minified_css() );
    }

    /**
     * Enqueue scripts.
     */
    public function enqueue()
    {
        self::enqueue_style( 'milligram', 'enable_milligram' );
        self::enqueue_style( 'uikit', 'enable_uikit' );

        // bootstrap.
        self::enqueue_style( 'bootstrap', 'enable_bootstrap', self::maybe() );
        self::enqueue_style( 'bootstrap-grid', 'enable_bootstrap_grid', self::maybe() );

        // theme.
        self::enqueue_style( 'underscores', 'enable_underscores', self::maybe() );
        self::enqueue_style( 'brisko', 'enable_brisko', self::maybe() );
        self::enqueue_style( self::CORE_CSS, 'enable_core', true );

        // 'normalizer'
        self::enqueue_style( 'normalizer', self::maybe() );

        // custom styles.
        wp_enqueue_style( 'custom-styles' );

        // rtl .
        wp_style_add_data( 'brisko-style', 'rtl', 'replace' );
    }

    /**
     * Setup static CSS files.
     *
     * @param null|string $style Style handle, e.g., 'bootstrap'.
     *
     * @return array
     */
    protected function style_files( $style = null )
    {
        $styles = [
            'uikit'         => 'uikit/css/uikit',
            'milligram'     => 'milligram/css/milligram',
            'brisko'        => 'css/brisko',
            'custom-styles' => 'css/custom-styles',
            'underscores'   => 'css/underscores',
            'normalizer'    => 'css/normalize',
            self::CORE_CSS  => 'css/core',
        ];

        $files     = [];
        $src_files = [];
        foreach ( $styles as $key => $path ) {
            $files[ $key ]     = Assets::uri( "$path.min.css" );
            $src_files[ $key ] = Assets::uri( "$path.css" );
        }

        return apply_filters( 'brisko_style_files', \defined( 'WP_BRISKO_DEBUG' ) && WP_BRISKO_DEBUG ? $src_files : $files );
    }

    /**
     * CSS Minifier Compressor.
     *
     * @return false|string minified css output.
     */
    protected function minified_css()
    {
        if ( ! \is_array( $this->custom_styles() ) ) {
            return false;
        }

        $style_styles = $this->custom_styles();
        $style_styles = implode( "\n", $style_styles );

        return $this->sanitize_css( $style_styles );
    }

    /**
     * Custom Theme styles.
     */
    private function custom_styles()
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
        return apply_filters( 'brisko_custom_styles', $custom_styles );
    }
}
