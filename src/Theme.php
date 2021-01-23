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
	const VERSION = '1.4.3';

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
}
