<?php

namespace Brisko;

use Brisko\View\FooterCredits;
use Brisko\Customize\Customizer;

class Theme
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
	 * Navigation width
	 */
	public static function navigation_width() {
		echo esc_attr( get_theme_mod( 'navigation_width', 'container' ) );
	}

	/**
	 * Page width
	 */
	public static function page_width() {
		echo esc_attr( get_theme_mod( 'page_width', 'container' ) );
	}

	/**
	 * Post width
	 */
	public static function post_width() {
		echo esc_attr( get_theme_mod( 'post_width', 'container' ) );
	}

	/**
	 * Navigation width
	 */
	public static function post_thumbnail_display() {
		$navigation_width = get_theme_mod( 'featured_image', 'container' );
		echo esc_attr( $navigation_width );
	}

	/**
	 * Display tags.
	 */
	public static function display_tags() {
		if ( ! get_theme_mod( 'display_tags', 1 ) ) {
			return sanitize_html_class( 'this-display-none' );
		} else {
			return sanitize_html_class( 'this-display-show' );
		}
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
