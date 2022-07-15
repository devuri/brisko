<?php

namespace Brisko\Setup;

use Brisko\Contracts\EnqueueInterface;
use Brisko\Traits\Instance;

class Scripts implements EnqueueInterface
{
    use Instance;

    /**
     *  Assets scripts.
     */
    private function __construct()
    {

        // register.
        add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );

        // enqueue.
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
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
     * Setup static JS files.
     *
     * @return string[] .
     *
     * @psalm-return array{'brisko-popper': string, 'brisko-bootstrap': string, 'brisko-uikit': string, 'brisko-navigation': string, 'brisko-smooth-scroll': string}
     */
    public static function js_files()
    {
        return [
            'brisko-popper'        => Assets::uri() . '/js/bootstrap/popper.min.js',
            'brisko-bootstrap'     => Assets::uri() . '/js/bootstrap/bootstrap.min.js',
            'brisko-uikit'         => Assets::uri() . '/js/uikit.min.js',
            'brisko-navigation'    => Assets::uri() . '/js/navigation.js',
            'brisko-smooth-scroll' => Assets::uri() . '/js/smooth-scroll.js',
        ];
    }

    /**
     * Enqueue styles and script.
     *
     * @return void
     */
    public function register()
    {
        wp_register_script( 'brisko-popper', Assets::uri() . '/js/bootstrap/popper.min.js', [ 'jquery' ], self::ver( 'brisko-popper' ), true );
        wp_register_script( 'brisko-bootstrap', Assets::uri() . '/js/bootstrap/bootstrap.min.js', [ 'jquery' ], self::ver( 'brisko-bootstrap' ), true );

        wp_register_script( 'brisko-navigation', Assets::uri() . '/js/navigation.js', [], self::ver( 'brisko-navigation' ), true );
        wp_register_script( 'brisko-smooth-scroll', Assets::uri() . '/js/smooth-scroll.js', [], self::ver( 'brisko-smooth-scroll' ), true );
    }

    /**
     * Set file version.
     *
     * @param string $handle .
     *
     * @return string .
     */
    public static function ver( $handle )
    {
        return md5_file( self::js_files()[ $handle ] );
    }
}
