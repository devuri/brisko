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
use Brisko\View\Excerpt;
use Brisko\View\Thumbnail;

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

	protected static $dir;
	protected $activate;
	protected $assets;
	protected $body;
	protected $head;
	protected $jetpack;
	protected $customizer;
	protected $compat;

    /**
     * Define Theme Version.
     */
    const VERSION = '3.3.3';

    /**
     * [__construct description].
     */
    public function __construct( $dir )
    {
		static::$dir = $dir;
		$this->activate = new Activate();
		$this->assets = new Assets();
		$this->body = new Body();
		$this->head = new Head();
		$this->jetpack = new Jetpack();
		$this->customizer = new Customizer();
		// $this->compat = new Compat(); @codingStandardsIgnoreLine
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
		// $this->compat->init(); @codingStandardsIgnoreLine
    }

    /**
     * Theme Header.
     *
     * @return SiteHeader .
     */
    public static function header()
    {
        return SiteHeader::get()->site_header();
    }

    /**
     * Theme Navigation.
     *
     * @return Navigation .
     */
    public static function navigation()
    {
        return Navigation::get()->navigation();
    }

    /**
     * Theme Header.
     *
     * @return SiteHeader .
     */
    public static function header_image()
    {
        return SiteHeader::get()->header_image();
    }

    /**
     * Archive Header.
     *
     * @return SiteHeader .
     */
    public static function archive_header()
    {
        return SiteHeader::get()->archive();
    }

    /**
     * Displays an optional post thumbnail.
     */
    public static function post_thumbnail()
    {
        Thumbnail::get()->post_thumbnail();
    }

    /**
     * Displays an optional post excerpt.
     */
    public static function excerpt()
    {
        Excerpt::get()->post_excerpt();
    }

    /**
     * Theme Options.
     *
     * @return Options .
     */
    public static function options()
    {
        return Options::get();
    }

    /**
     * Template.
     *
     * @return Template
     */
    public static function template()
    {
        return Template::get();
    }

    /**
     * Template.
     *
     * @return Template
     */
    public static function content()
    {
        return static::template()->content();
    }

    /**
     * Footer.
     *
     * @return Footer
     */
    public static function footer()
    {
        return Footer::get()->site_footer();
    }

    /**
     * Footer Credit.
     *
     * @return string
     */
    public static function footer_credit()
    {
        return Footer::get()->footer_credit();
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
