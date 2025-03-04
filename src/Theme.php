<?php

namespace Brisko;

use Brisko\Customize\Customizer;
use Brisko\Setup\Activate;
use Brisko\Setup\Assets;
use Brisko\Setup\Body;
use Brisko\Setup\Compat;
use Brisko\Setup\Head;
use Brisko\Setup\Jetpack;
use Brisko\Traits\Instance;

/**
 * The main Brisko theme class.
 * Brisko theme instance for all the other classes.
 *
 * We will use this as the entry point
 * to instantiate and access other classes.
 */
class Theme
{
    use Instance;

    /**
     * Define Theme Version.
     */
    const VERSION = '6.1.2';

    protected $activate;
    protected $assets;
    protected $body;
    protected $head;
    protected $jetpack;
    protected $customizer;
    protected $compat;

    /**
     * construct.
     */
    public function __construct()
    {
        $this->activate   = new Activate();
        $this->assets     = new Assets();
        $this->body       = new Body();
        $this->head       = new Head();
        $this->jetpack    = new Jetpack();
        $this->customizer = new Customizer();
        // $this->compat = new Compat(); @codingStandardsIgnoreLine
    }

    /**
     * Setup Theme.
     *
     * @return void
     */
    public function setup()
    {
        $this->activate->init();
        $this->assets->init();
        $this->body->init();
        $this->head->init();
        $this->jetpack->init();
        $this->customizer->init();

        // define sudo user.
        if ( ! \defined( 'BRISKO_ADMIN_USER' ) ) {
            \define( 'BRISKO_ADMIN_USER', 1 );
        }

        /*
         * Disable wpautop.
         *
         * @link https://developer.wordpress.org/reference/functions/wpautop/
         * @link https://stackoverflow.com/questions/20760598/how-to-remove-extra-p-p-tags-in-wordpress-post-and-pages
         */
        if ( get_theme_mod( 'disable_wpautop' ) ) {
            remove_filter( 'the_content', 'wpautop' );
        }

        // load customizer preview.
        add_action( 'customize_preview_init', 'brisko_customize_preview_js' );

        /*
         * Compatibility for Elementor Header and Footer.
         *
         * @link https://developers.elementor.com/theme-locations-api/registering-locations
         */
        if ( did_action( 'elementor/loaded' ) ) {
            add_action(
                'elementor/theme/register_locations',
                function ( $elementor_theme_manager ) {
                    $elementor_theme_manager->register_location( 'header' );
                    $elementor_theme_manager->register_location( 'footer' );
                }
            );
        }

        /*
         * Filters the block editor settings to restrict certain capabilities for non-admin users.
         *
         * This filter modifies the block editor settings to disable block locking and code editing.
         *
         * @since 1.0.0
         *
         * @param array  $settings Block editor settings.
         * @param string $context  The editor context (e.g., 'post', 'site').
         *
         * @return array Modified block editor settings.
         */
        add_filter(
            'block_editor_settings_all',
            function ( $settings, $context ) {
                $admin_user_id   = \defined( 'BRISKO_ADMIN_USER' ) && is_numeric( BRISKO_ADMIN_USER ) ? (int) BRISKO_ADMIN_USER : null;
                $current_user_id = get_current_user_id();

                if ( current_user_can( 'edit_theme_options' ) && $current_user_id === $admin_user_id ) {
                    return $settings;
                }

                if ( $current_user_id !== $admin_user_id ) {
                    $settings['canLockBlocks']      = false;
                    $settings['codeEditingEnabled'] = false;
                }

                return $settings;
            },
            10,
            2
        );
    }

    /**
     * Get theme version.
     *
     * @return string
     */
    public function version()
    {
        return self::VERSION;
    }

    /**
     * Theme Actions.
     *
     * @param string $action the name of the action.
     *
     * @return Actions .
     */
    public function action( $action = null )
    {
        return Actions::get()->action( $action );
    }

    /**
     * Easily enqueue  additional styles.
     *
     * @param string $handle Name of the stylesheet. Should be unique.
     * @param string $src    Full URL of the stylesheet, or path of the stylesheet.
     * @param string $ver    Stylesheet version number, added to the URL as a query string for cache busting.
     * @param array  $deps   An array of registered stylesheet handles this stylesheet depends on.
     *
     * @return void
     */
    public static function enqueue_style( $handle, $src, $ver = '', $deps = [] )
    {
        if ( empty( $ver ) ) {
            $ver = self::VERSION;
        }
        wp_enqueue_style( $handle, get_stylesheet_directory_uri() . '/' . $src, $deps, $ver );
    }
}
