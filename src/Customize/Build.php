<?php

namespace Brisko\Customize;

use Brisko\Customize\Settings\General;
use Brisko\Customize\Settings\Header;
use Brisko\Customize\Settings\Navigation;
use Brisko\Customize\Settings\Pages;
use Brisko\Customize\Settings\Blog;
use Brisko\Customize\Settings\Posts;
use Brisko\Customize\Settings\Footer;
use Brisko\Customize\Settings\SelectiveRefresh;

final class Build {

	/**
	 * Private $instance
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new Build();
		}
		return self::$instance;
	}

	/**
	 * [__construct description]
	 */
	private function __construct() {
		// nothing to see here .
	}

	/**
	 * Lets build out the customizer sections
	 *
	 * Add new customizer sections to the Build.
	 *
	 * @param WP_Customize_Manager $wp_customize .
	 */
	public static function sections( $wp_customize ) {
		General::settings( $wp_customize );
		Navigation::settings( $wp_customize );
		Header::settings( $wp_customize );
		Pages::settings( $wp_customize );
		Blog::settings( $wp_customize );
		Posts::settings( $wp_customize );
		Footer::settings( $wp_customize );
		SelectiveRefresh::settings( $wp_customize );
	}

}
