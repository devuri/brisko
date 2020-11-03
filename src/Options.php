<?php

namespace Brisko;

final class Options
{

	/**
	 * Class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Get Options
	 *
	 * @return Options ..
	 */
	public static function get() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Options();
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
	 * Header Image
	 */
	public function header_image_display() {
		return esc_attr( get_theme_mod( 'header_image_display', 'this-entire-site' ) );
	}

	/**
	 * Header Image width
	 */
	public function header_image_width() {
		echo esc_attr( get_theme_mod( 'header_image_width', 'container' ) );
	}

	/**
	 * Navigation width
	 */
	public function navigation_width() {
		echo esc_attr( get_theme_mod( 'navigation_width', 'container' ) );
	}

	/**
	 * Display Page header.
	 */
	public function display_page_header() {
		if ( ! get_theme_mod( 'display_page_header', 0 ) ) {
			return sanitize_html_class( 'this-display-none' );
		} else {
			return sanitize_html_class( 'this-display-show' );
		}
	}

	/**
	 * Page width
	 */
	public function page_width() {
		echo esc_attr( get_theme_mod( 'page_width', 'container' ) );
	}

	/**
	 * Post width
	 */
	public function post_width() {
		echo esc_attr( get_theme_mod( 'post_width', 'container' ) );
	}

	/**
	 * Button border radius
	 */
	public function button_border_radius() {
		if ( ! get_theme_mod( 'read_more_border_radius', 1 ) ) {
			return sanitize_html_class( 'this-button-border-radius-none' );
		} else {
			return sanitize_html_class( 'this-button-border-radius' );
		}
	}

	/**
	 * Navigation width
	 */
	public function post_thumbnail_display() {
		$navigation_width = get_theme_mod( 'featured_image', 'container' );
		echo esc_attr( $navigation_width );
	}

	/**
	 * Display tags.
	 */
	public function display_tags() {
		if ( ! get_theme_mod( 'display_tags', 1 ) ) {
			return sanitize_html_class( 'this-display-none' );
		} else {
			return sanitize_html_class( 'this-display-show' );
		}
	}

	/**
	 * Display Post Categories.
	 */
	public function display_post_categories() {
		if ( ! get_theme_mod( 'display_post_categories', 1 ) ) {
			return sanitize_html_class( 'this-display-none' );
		} else {
			return '';
		}
	}

}
