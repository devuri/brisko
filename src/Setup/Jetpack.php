<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;
use Brisko\Traits\Instance;

/**
 * The main Jetpack class.
 *
 * Used for Jetpack compatibility
 * this will load the Jetpack compatibility file.
 */
class Jetpack implements SetupInterface
{
    use Instance;

    /**
     *  Constructor.
     */
    private function __construct()
    {
        if ( \defined( '\JETPACK__VERSION' ) ) {
            add_action( 'after_setup_theme', [ $this, 'jetpack_setup' ] );
        }
    }

    /**
     * Singleton.
     *
     * @return self
     */
    public static function init()
    {
        return new self();
    }

    /**
     * Jetpack setup function.
     *
     * See: https://jetpack.com/support/infinite-scroll/
     * See: https://jetpack.com/support/responsive-videos/
     * See: https://jetpack.com/support/content-options/
     */
    public function jetpack_setup()
    {
        // Add theme support for Infinite Scroll.
        add_theme_support(
            'infinite-scroll',
            [
                'container' => 'primary',
                'render'    => [ $this, 'infinite_scroll_render' ],
                'footer'    => 'page',
            ]
        );

        // Add theme support for Responsive Videos.
        add_theme_support( 'jetpack-responsive-videos' );

        // Add theme support for Content Options.
        add_theme_support(
            'jetpack-content-options',
            [
                'post-details'    => [
                    'stylesheet' => 'brisko-style',
                    'date'       => '.posted-on',
                    'categories' => '.cat-links',
                    'tags'       => '.tags-links',
                    'author'     => '.byline',
                    'comment'    => '.comments-link',
                ],
                'featured-images' => [
                    'archive' => true,
                    'post'    => true,
                    'page'    => true,
                ],
            ]
        );
    }

    /**
     * Custom render function for Infinite Scroll.
     */
    public function infinite_scroll_render()
    {
        while ( have_posts() ) {
            the_post();
            if ( is_search() ) {
                get_template_part( 'template-parts/content', 'search' );
            } else {
                get_template_part( 'template-parts/content', get_post_type() );
            }
        }
    }
}
