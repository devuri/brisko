<?php

namespace Brisko;

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
	 * [__construct description]
	 */
	private function __construct() {
		Customizer::init();
		add_action( 'brisko_footer_credit', array( FooterCredits::class, 'init' ) );
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
