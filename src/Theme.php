<?php

namespace Brisko;

use Brisko\View\Thumbnail;
use Brisko\View\FooterCredits;
use Brisko\Customize\Customizer;

final class Theme
{

	/**
	 * Class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Setup Theme
	 *
	 * @return object ..
	 */
	public static function setup() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Theme();
		}
		return self::$instance;
	}

	/**
	 * Define Theme Version
	 */
	const VERSION = '0.9.5';

	/**
	 * [__construct description]
	 */
	private function __construct() {
		Activate::init();
		Enqueue::init();
		Header::init();
		Customizer::init();
		add_action( 'brisko_footer_credit', array( FooterCredits::class, 'init' ) );
	}

	/**
	 * Theme Header
	 *
	 * @return Header .
	 */
	public static function header() {
		return Header::init();
	}

	/**
	 * Displays Main Navigation.
	 */
	public static function navigation() {
		Navigation::get()->navigation();
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

}
