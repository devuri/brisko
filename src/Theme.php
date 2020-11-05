<?php

namespace Brisko;

use Brisko\Traits\Singleton;
use Brisko\View\Thumbnail;
use Brisko\Customize\Customizer;

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
	const VERSION = '0.9.6';

	/**
	 * [__construct description]
	 */
	private function __construct() {
		Activate::init();
		Assets::init();
		Body::init();
		Head::init();
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
	 * Displays an optional post thumbnail.
	 */
	public static function post_thumbnail() {
		Thumbnail::get()->post_thumbnail();
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
		return Template::init();
	}

	/**
	 * Footer
	 *
	 * @return Footer
	 */
	public static function footer() {
		return Footer::get()->site_footer();
	}
}
