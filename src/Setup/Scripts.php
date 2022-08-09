<?php

namespace Brisko\Setup;

use Brisko\Contracts\EnqueueInterface;

class Scripts implements EnqueueInterface
{
    /**
     * Scripts.
     *
     * @return void
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
    }

    /**
     * Setup a style mod.
     *
     * @param string $handle  the enqueue handle example 'bootstrap'
     * @param string $mod     the theme_mod name example 'enable_bootstrap'
     * @param bool   $default true|false if this shopuld be enabled by default.
     *
     * @return void
     */
    public static function mod( $handle, $mod, $default = false )
    {
        if ( true === get_theme_mod( $mod, $default ) ) {
            wp_enqueue_script( $handle );
        }
    }

    /**
     * Enqueue scripts.
     */
    public function enqueue()
    {
        self::mod( 'navigationjs', 'enable_navigation_js', true );
        self::mod( 'popperjs', 'enable_popper_js' );
        self::mod( 'bootstrapjs', 'enable_bootstrap_js' );
        self::mod( 'uikitjs', 'enable_uikit_js' );
        self::mod( 'uikit-icons', 'enable_uikit_icons_js' );
        self::mod( 'smooth-scrolljs', 'enable_smooth_scroll' );

        // bootstrap 5.
        self::mod( 'bootstrap5js', 'enable_bootstrap5_js' );
        self::mod( 'bootstrap5js-bundle', 'enable_bootstrap5_bundle_js' );
        self::mod( 'bootstrap5js-esm', 'enable_bootstrap5_esm_js' );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

    /**
     * Enqueue styles and script.
     *
     * @return void
     */
    public function register()
    {
        wp_register_script( 'popperjs', Assets::uri( 'bootstrap/js/popper.min.js' ), [ 'jquery' ], md5( 'popperjs' ), true );
        wp_register_script( 'bootstrapjs', Assets::uri( 'bootstrap/js/bootstrap.min.js' ), [ 'jquery' ], md5( 'bootstrapjs' ), true );

        // uikit.
        wp_register_script( 'uikitjs', Assets::uri( 'uikit/js/uikit.min.js' ), [], md5( 'uikitjs' ), true );
        wp_register_script( 'uikit-icons', Assets::uri( 'uikit/js/uikit-icons.min.js' ), [], md5( 'uikit-icons' ), true );

        // bootstrap 5
        wp_register_script( 'bootstrap5js', Assets::uri( 'bootstrap5/js/bootstrap.min.js' ), [], md5( 'bootstrap5js' ), true );
        wp_register_script( 'bootstrap5js-bundle', Assets::uri( 'bootstrap5/js/bootstrap.bundle.min.js' ), [], md5( 'bootstrap5js-bundle' ), true );
        wp_register_script( 'bootstrap5js-esm', Assets::uri( 'bootstrap5/js/bootstrap.esm.min.js' ), [], md5( 'bootstrap5js-esm' ), true );

        wp_register_script( 'navigationjs', Assets::uri( 'js/navigation.min.js' ), [], md5( 'navigationjs' ), true );
        wp_register_script( 'smooth-scrolljs', Assets::uri( 'js/smooth-scroll.js' ), [], md5( 'smooth-scrolljs' ), true );
    }
}
