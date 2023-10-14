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
    const VERSION = '5.0.0';

    protected static $dir;
    protected $activate;
    protected $assets;
    protected $body;
    protected $head;
    protected $jetpack;
    protected $customizer;
    protected $compat;

    /**
     * construct.
     *
     * @param string $dir the theme dir path.
     */
    public function __construct( $dir )
    {
        static::$dir      = $dir;
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
        $this->component( 'activate' )->init();
        $this->component( 'assets' )->init();
        $this->component( 'body' )->init();
        $this->component( 'head' )->init();
        $this->component( 'jetpack' )->init();
        $this->component( 'customizer' )->init();

        /*
         * Disable wpautop.
         *
         * @link https://developer.wordpress.org/reference/functions/wpautop/
         * @link https://stackoverflow.com/questions/20760598/how-to-remove-extra-p-p-tags-in-wordpress-post-and-pages
         */
        if( get_theme_mod( 'disable_wpautop' ) ) {
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
    }

    public function component( $name = null )
    {
        $components = [
            'activate'   => $this->activate,
            'assets'     => $this->assets,
            'body'       => $this->body,
            'head'       => $this->head,
            'jetpack'    => $this->jetpack,
            'customizer' => $this->customizer,
        ];

        return $components[ $name ];
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
     * Dir path.
     *
     * @return string
     */
    public static function dir_path()
    {
        return static::$dir;
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
