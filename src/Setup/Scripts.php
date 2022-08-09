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
     * Enqueue scripts.
     */
    public function enqueue()
    {
        if ( true === get_theme_mod( 'enable_popper_js', false ) ) {
            wp_enqueue_script( 'brisko-popper' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap_js', false ) ) {
            wp_enqueue_script( 'brisko-bootstrap' );
        }

        if ( true === get_theme_mod( 'enable_uikit_js', false ) ) {
            wp_enqueue_script( 'uikit-js' );
        }

        if ( true === get_theme_mod( 'enable_uikit_icons_js', false ) ) {
            wp_enqueue_script( 'uikit-icons' );
        }

        if ( true === get_theme_mod( 'enable_navigation_js', true ) ) {
            wp_enqueue_script( 'brisko-navigation' );
        }

        if ( true === get_theme_mod( 'enable_smooth_scroll', false ) ) {
            wp_enqueue_script( 'brisko-smooth-scroll' );
        }

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

    protected static function bootstrap5()
    {
        if ( true === get_theme_mod( 'enable_bootstrap5_js', false ) ) {
            wp_enqueue_script( 'brisko-bootstrap5' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_bundle_js', false ) ) {
            wp_enqueue_script( 'brisko-bootstrap5_bundle' );
        }

        if ( true === get_theme_mod( 'enable_bootstrap5_esm_js', false ) ) {
            wp_enqueue_script( 'brisko-bootstrap5_esm' );
        }
    }
}
