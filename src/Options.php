<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The main Options class.
 *
 * We will use this as the entry point
 * for all theme options ( get_theme_mod() ).
 */
class Options
{
    use Singleton;

    /**
     * Header Image.
     */
    public function header_image_display()
    {
        return esc_attr( get_theme_mod( 'header_image_display', 'this-entire-site' ) );
    }

    /**
     * Archive Header.
     */
    public function enable_archive_header()
    {
        return \boolval( get_theme_mod( 'enable_archive_header', false ) );
    }

    /**
     * Archive Header for Posts.
     */
    public function enable_post_header()
    {
        return \boolval( get_theme_mod( 'enable_post_header', false ) );
    }


    /**
     * Header Image width.
     */
    public function header_image_width()
    {
        echo esc_attr( get_theme_mod( 'header_image_width', 'container' ) );
    }

    /**
     * Navigation width.
     */
    public function navigation_width()
    {
        echo esc_attr( get_theme_mod( 'navigation_width', 'container' ) );
    }

    /**
     * Display Page header.
     */
    public function display_page_header()
    {
        if ( ! get_theme_mod( 'display_page_header', 0 ) ) {
            return sanitize_html_class( 'this-display-none' );
        }

        return sanitize_html_class( 'this-display-show' );
    }

    /**
     * Page width.
     */
    public function page_width()
    {
        echo esc_attr( get_theme_mod( 'page_width', 'container' ) );
    }

    /**
     * Blog width.
     */
    public function blog_width()
    {
        echo esc_attr( get_theme_mod( 'blog_width', 'container' ) );
    }

    /**
     * Archives width.
     */
    public function archive_width()
    {
        echo esc_attr( get_theme_mod( 'archive_width', 'container' ) );
    }

    /**
     * Footer width.
     */
    public function footer_width()
    {
        echo esc_attr( get_theme_mod( 'footer_width', 'container' ) );
    }

    /**
     * Button border radius.
     *
     * @param int $defualt .
     *
     * @return string .
     */
    public function button_border_radius( $defualt = 1 )
    {
        if ( ! get_theme_mod( 'read_more_border_radius', $defualt ) ) {
            return sanitize_html_class( 'this-button-border-radius-none' );
        }

        return sanitize_html_class( 'this-button-border-radius' );
    }

    /**
     * Navigation width.
     */
    public function post_thumbnail_display()
    {
        $navigation_width = get_theme_mod( 'featured_image', 'container' );
        echo esc_attr( $navigation_width );
    }

    /**
     * Display tags.
     */
    public function display_tags()
    {
        if ( ! get_theme_mod( 'display_tags', 1 ) ) {
            return sanitize_html_class( 'this-display-none' );
        }

        return sanitize_html_class( 'this-display-show' );
    }

    /**
     * Display Post Categories.
     */
    public function display_post_categories()
    {
        if ( ! get_theme_mod( 'display_post_categories', 1 ) ) {
            return sanitize_html_class( 'this-display-none' );
        }

        return '';
    }

    /**
     * Footer Top Margin.
     */
    public function footer_top_margin()
    {
        if ( false === get_theme_mod( 'footer_remove_top_margin', false ) ) {
            echo sanitize_html_class( 'this-margin-top' );
        } else {
            echo sanitize_html_class( 'no-top-margin' );
        }
    }
}
