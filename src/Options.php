<?php

namespace Brisko;

/**
 * Handles the theme options.
 *
 * This class serves as the entry point for all theme options using get_theme_mod.
 */
class Options
{
    /**
     * @var array Theme options array.
     */
    private $theme_options = [];

    /**
     * Initialize theme options by fetching them from WordPress.
     */
    public function set_theme_options()
    {
        $this->theme_options = [
            'header_image_display'     => get_theme_mod( 'header_image_display', 'this-entire-site' ),
            'enable_archive_header'    => (bool) get_theme_mod( 'enable_archive_header', false ),
            'enable_post_header'       => (bool) get_theme_mod( 'enable_post_header', false ),
            'header_image_width'       => get_theme_mod( 'header_image_width', 'container' ),
            'navigation_width'         => get_theme_mod( 'navigation_width', 'container' ),
            'page_width'               => get_theme_mod( 'page_width', 'container' ),
            'blog_width'               => get_theme_mod( 'blog_width', 'container' ),
            'archive_width'            => get_theme_mod( 'archive_width', 'container' ),
            'footer_width'             => get_theme_mod( 'footer_width', 'container' ),
            'display_page_header'      => get_theme_mod( 'display_page_header', 'this-display-none' ),
            'read_more_border_radius'  => get_theme_mod( 'read_more_border_radius', 'this-button-border-radius-none' ),
            // post_thumbnail_display.
            'featured_image'           => get_theme_mod( 'featured_image', 'container' ),
            'display_post_date'        => get_theme_mod( 'disable_post_date', true ),
            'display_post_author'      => get_theme_mod( 'disable_post_author', true ),
            'display_tags'             => get_theme_mod( 'display_tags', 'this-display-show' ),
            'display_post_categories'  => get_theme_mod( 'display_post_categories' ),
            'footer_remove_top_margin' => get_theme_mod( 'footer_remove_top_margin', 'this-margin-top' ),
        ];
    }

    /**
     * Get a single theme option value.
     *
     * @param string $key_id The theme mod to retrieve.
     *
     * @return mixed The value of the specified theme mod.
     */
    public function get( string $key_id )
    {
        if ( isset( $this->theme_options[ $key_id ] ) ) {
            return $this->theme_options[ $key_id ];
        }

        return null;
    }

    /**
     * Initializes and returns an instance of this class.
     *
     * @return self
     */
    public static function init()
    {
        $options = new self();
        $options->set_theme_options();

        return $options;
    }
}
