<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;

class Activate implements SetupInterface
{
    /**
     * Activate.
     *
     * @return void
     */
    public function init()
    {
        add_action( 'brisko_blog_title', [ $this, 'blog_title' ] );
        add_action( 'brisko_blog_subtitle', [ $this, 'blog_subtitle' ] );
        add_action( 'after_setup_theme', [ $this, 'brisko_setup' ] );
        add_action( 'after_setup_theme', [ $this, 'brisko_content_width' ], 0 );
        add_action( 'widgets_init', [ $this, 'brisko_widgets_init' ] );

        // The Excerp.
        add_filter( 'excerpt_length', [ $this, 'set_excerpt_length' ], 99 );
        add_filter( 'excerpt_more', [ $this, 'set_excerpt_more' ], 99 );
    }

    /**
     * Blog Title.
     *
     * @return void.
     */
    public static function blog_title()
    {
        if ( get_theme_mod( 'hide_blog_title', true ) ) {
            return;
        }

        echo esc_html( get_theme_mod( 'blog_title' ) );
    }

    /**
     * Blog Subtitle.
     *
     * @return void.
     */
    public static function blog_subtitle()
    {
        if ( get_theme_mod( 'hide_blog_subtitle', true ) ) {
            return;
        }

        echo esc_html( get_theme_mod( 'blog_subtitle' ) );
    }

    /**
     * Excerp Length.
     *
     * @param int $length .
     */
    public function set_excerpt_length( $length )
    {
        return get_theme_mod( 'set_excerpt_length', 30 );
    }

    /**
     * Excerp More.
     *
     * @param int $more .
     */
    public function set_excerpt_more( $more )
    {
        if ( is_admin() ) {
            return $more;
        }

        return get_theme_mod( 'set_excerpt_more', '[…]' );
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/
     */
    public function brisko_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain( 'brisko' );

        // Support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        // Full-Width Gutenberg Blocks.
        add_theme_support( 'align-wide' );
        remove_theme_support( 'block-templates' );
        remove_theme_support( 'widgets-block-editor' );

        // Support for blocks with padding controls.
        add_theme_support( 'custom-spacing' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            [
                'menu-1' => esc_html__( 'Primary', 'brisko' ),
            ]
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );

        // Add post-formats support.
        add_theme_support(
            'post-formats',
            [
                'link',
                'aside',
                'gallery',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            ]
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'brisko_custom_background_args',
                [
                    'default-color' => '#f3f3f3',
                    'default-image' => '',
                ]
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            [
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            ]
        );
    }


    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    public function brisko_content_width()
    {
        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters( 'brisko_content_width', 640 );
    }

    /**
     * Register widget area.
     *
     * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    public function brisko_widgets_init()
    {
        register_sidebar(
            [
                'name'          => esc_html__( 'Sidebar', 'brisko' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here.', 'brisko' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ]
        );
    }
}
