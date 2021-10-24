<?php

namespace Brisko;

use Brisko\Traits\Singleton;
use Brisko\View\Thumbnail;
use Brisko\View\Excerpt;
use Brisko\Setup\Activate;
use Brisko\Setup\Assets;
use Brisko\Setup\Body;
use Brisko\Setup\Head;
use Brisko\Setup\Jetpack;
use Brisko\Setup\Compat;
use Brisko\Customize\Customizer;

/**
 * The main Brisko theme class.
 * Brisko theme instance for all the other classes.
 *
 * We will use this as the entry point
 * to instantiate and access other classes.
 *
 * @package brisko
 */
final class Theme
{

	use Singleton;

	/**
	 * Setup Theme
	 *
	 * @return object ..
	 */
	public static function setup() {
		return new Theme();
	}

	/**
	 * Define Theme Version
	 */
	const VERSION = '3.0.6';

	/**
	 * [__construct description]
	 */
	private function __construct() {
		Activate::init();
		Assets::init();
		Body::init();
		Head::init();
		Jetpack::init();
		Customizer::init();
		// Compat::init();  @codingStandardsIgnoreLine
	}

	/**
	 * Theme Header
	 *
	 * @return SiteHeader .
	 */
	public static function header() {
		return SiteHeader::get()->site_header();
	}

	/**
	 * Theme Navigation
	 *
	 * @return Navigation .
	 */
	public static function navigation() {
		return Navigation::get()->navigation();
	}

	/**
	 * Theme Header
	 *
	 * @return SiteHeader .
	 */
	public static function header_image() {
		return SiteHeader::get()->header_image();
	}

	/**
	 * Archive Header
	 *
	 * @return SiteHeader .
	 */
	public static function archive_header() {
		return SiteHeader::get()->archive();
	}

	/**
	 * Displays an optional post thumbnail.
	 */
	public static function post_thumbnail() {
		Thumbnail::get()->post_thumbnail();
	}

	/**
	 * Displays an optional post excerpt.
	 */
	public static function excerpt() {
		Excerpt::get()->post_excerpt();
	}

	/**
	 * Theme Options
	 *
	 * @return Options .
	 */
	public static function options() {
		return Options::get();
	}

	/**
	 * Template
	 *
	 * @return Template
	 */
	public static function template() {
		return Template::get();
	}

	/**
	 * Footer
	 *
	 * @return Footer
	 */
	public static function footer() {
		return Footer::get()->site_footer();
	}

	/**
	 * Footer Credit
	 *
	 * @return string
	 */
	public static function footer_credit() {
		return Footer::get()->footer_credit();
	}

	/**
	 * Easily enqueue  additional styles.
	 *
	 * @param  string $handle Name of the stylesheet. Should be unique.
	 * @param  string $src    Full URL of the stylesheet, or path of the stylesheet.
	 * @param  string $ver    Stylesheet version number, added to the URL as a query string for cache busting.
	 * @param  array  $deps   An array of registered stylesheet handles this stylesheet depends on.
	 * @return void
	 */
	public static function enqueue_style( $handle, $src, $ver = '', $deps = array() ) {
		if ( empty( $ver ) ) {
			$ver = Theme::VERSION;
		}
		wp_enqueue_style( $handle, get_stylesheet_directory_uri() . '/' . $src, $deps, $ver );
	}
}
