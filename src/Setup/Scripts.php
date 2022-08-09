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
        self::mod( 'brisko-navigation', 'enable_navigation_js', true );
        self::mod( 'brisko-popper', 'enable_popper_js' );
        self::mod( 'brisko-bootstrap', 'enable_bootstrap_js' );
        self::mod( 'uikit-js', 'enable_uikit_js' );
        self::mod( 'uikit-icons', 'enable_uikit_icons_js' );
        self::mod( 'brisko-smooth-scroll', 'enable_smooth_scroll' );

        // bootstrap 5.
        self::mod( 'brisko-bootstrap5', 'enable_bootstrap5_js' );
        self::mod( 'brisko-bootstrap5_bundle', 'enable_bootstrap5_bundle_js' );
        self::mod( 'brisko-bootstrap5_esm', 'enable_bootstrap5_esm_js' );

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
        wp_register_script( 'brisko-popper', Assets::uri( 'bootstrap/js/popper.min.js' ), [ 'jquery' ], md5( 'brisko-popper' ), true );
        wp_register_script( 'brisko-bootstrap', Assets::uri( 'bootstrap/js/bootstrap.min.js' ), [ 'jquery' ], md5( 'brisko-bootstrap' ), true );

        // uikit.
        wp_register_script( 'uikit-js', Assets::uri( 'uikit/js/uikit.min.js' ), [], md5( 'uikit-js' ), true );
        wp_register_script( 'uikit-icons', Assets::uri( 'uikit/js/uikit-icons.min.js' ), [], md5( 'uikit-icons' ), true );

        // bootstrap 5
        wp_register_script( 'brisko-bootstrap5', Assets::uri( 'bootstrap5/js/bootstrap.min.js' ), [], md5( 'brisko-bootstrap5' ), true );
        wp_register_script( 'brisko-bootstrap5-bundle', Assets::uri( 'bootstrap5/js/bootstrap.bundle.min.js' ), [], md5( 'brisko-bootstrap5-bundle' ), true );
        wp_register_script( 'brisko-bootstrap5-esm', Assets::uri( 'bootstrap5/js/bootstrap.esm.min.js' ), [], md5( 'brisko-bootstrap5-esm' ), true );

        wp_register_script( 'brisko-navigation', Assets::uri( 'js/navigation.min.js' ), [], md5( 'brisko-navigation' ), true );
        wp_register_script( 'brisko-smooth-scroll', Assets::uri( 'js/smooth-scroll.js' ), [], md5( 'brisko-smooth-scroll' ), true );
    }
}
