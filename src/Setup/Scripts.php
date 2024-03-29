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
     * @param bool   $default true|false if this should be enabled by default.
     *
     * @return void
     */
    public static function enqueue_script( $handle, $mod, $default = false )
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
        self::enqueue_script( 'navigationjs', 'enable_navigation_js', self::maybe() );
        self::enqueue_script( 'popperjs', 'enable_popper_js', self::maybe() );
        self::enqueue_script( 'bootstrapjs', 'enable_bootstrap_js', self::maybe() );
        self::enqueue_script( 'uikitjs', 'enable_uikit_js' );
        self::enqueue_script( 'uikit-icons', 'enable_uikit_icons_js' );
        self::enqueue_script( 'smooth-scrolljs', 'enable_smooth_scroll', self::maybe() );

        // bootstrap 5.
        self::enqueue_script( 'bootstrap5js', 'enable_bootstrap5_js', self::maybe() );
        self::enqueue_script( 'bootstrap5js-bundle', 'enable_bootstrap5_bundle_js', self::maybe() );
        self::enqueue_script( 'bootstrap5js-esm', 'enable_bootstrap5_esm_js', self::maybe() );

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
        self::register_script( 'popperjs', 'bootstrap/js/popper.min.js', [ 'jquery' ] );
        self::register_script( 'bootstrapjs', 'bootstrap/js/bootstrap.min.js', [ 'jquery' ] );

        // uikit.
        self::register_script( 'uikitjs', 'uikit/js/uikit.min.js' );
        self::register_script( 'uikit-icons', 'uikit/js/uikit-icons.min.js' );

        // bootstrap 5
        self::register_script( 'bootstrap5js', 'bootstrap5/js/bootstrap.min.js' );
        self::register_script( 'bootstrap5js-bundle', 'bootstrap5/js/bootstrap.bundle.min.js' );
        self::register_script( 'bootstrap5js-esm', 'bootstrap5/js/bootstrap.esm.min.js' );

        self::register_script( 'navigationjs', 'js/navigation.min.js' );
        self::register_script( 'smooth-scrolljs', 'js/smooth-scroll.min.js' );
    }

    /**
     * Register a new script.
     *
     * @param string $handle    Name of the script. Should be unique.
     * @param string $src       path of the script relative to the Theme directory.
     * @param array  $deps      An array of registered script handles this script depends on.
     * @param bool   $in_footer Whether to enqueue the script before </body> instead of in the <head>.
     *
     * @see https://developer.wordpress.org/reference/functions/wp_register_script/
     *
     * @return void
     */
    protected static function register_script( $handle, $src, $deps = [], $in_footer = true )
    {
        wp_register_script( $handle, Assets::uri( $src ), $deps, md5( $handle ), $in_footer );
    }

    /**
     * Check if the 'brisko_elements_loaded' action has been executed.
     *
     * Determine whether to load theme modifications by default.
     *
     * This method checks if the 'brisko_elements_loaded' action has been executed. If the action
     * has not been fired, it indicates that the Brisko Elements plugin is not active. In this case,
     * we need to load certain theme modifications like theme styles by default. However, if the
     * action has been fired, it means the plugin is active and can control theme mods, so we return
     * false to prevent default loading.
     *
     * @return bool Returns true if the 'brisko_elements_loaded' action has NOT been executed,
     *              indicating the need to load theme modifications by default. Returns false if
     *              the action has been fired, indicating that the plugin can control theme mods,
     *              and we should not load them by default.
     */
    private static function maybe()
    {
        return ! did_action( 'brisko_elements_loaded' );
    }
}
