<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\EnqueueInterface;
use Brisko\Theme;

final class Styles implements EnqueueInterface
{

	use Singleton;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {
		return new self();
	}

	/**
	 *  Assets scripts
	 */
	private function __construct() {

		// register.
		add_action( 'wp_enqueue_scripts', array( $this, 'register' ) );

		// enqueue.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_css' ) );
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue() {

		// underscores.
		if ( false === get_theme_mod( 'disable_underscores', false ) ) {
			wp_enqueue_style( 'underscores' );
		}

		// brisko.
		if ( false === get_theme_mod( 'disable_brisko', false ) ) {
			wp_enqueue_style( 'brisko' );
		}

		// bootstrap grid.
		if ( false === get_theme_mod( 'disable_bootstrap_grid', false ) ) {
			wp_enqueue_style( 'bootstrap-grid' );
		}

		// bootstrap.
		if ( false === get_theme_mod( 'disable_bootstrap', false ) ) {
			wp_enqueue_style( 'bootstrap' );
		}

		// brisko theme styles.
		if ( false === get_theme_mod( 'disable_theme_styles', false ) ) {
			wp_enqueue_style( 'brisko-theme' );
		}

		// custom styles.
		wp_enqueue_style( 'custom-styles' );

		// rtl .
		wp_style_add_data( 'brisko-style', 'rtl', 'replace' );
	}

	/**
	 * Enqueue styles and script
	 *
	 * @return void
	 */
	public function register() {

		// Bootstrap and underscores.
		wp_register_style( 'underscores', get_template_directory_uri() . '/css/underscores.css', array(), Theme::VERSION );
		wp_register_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap/bootstrap-grid.css', array(), Theme::VERSION );
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), Theme::VERSION );

		// brisko .
		wp_register_style( 'brisko', get_template_directory_uri() . '/css/brisko.min.css', array(), Theme::VERSION );
		wp_register_style( 'brisko-theme', get_stylesheet_uri(), array(), Theme::VERSION );

		// custom .
		wp_register_style( 'custom-styles', get_template_directory_uri() . '/css/custom-styles.css', array(), Theme::VERSION );

	}

	/**
	 * Custom Theme styles
	 */
	public function custom_css() {

		// Get the theme setting.
		$bttns                 = 'button, input[type="button"], input[type="reset"], input[type="submit"]';
		$color                 = get_theme_mod( 'link_color', '#000000' );
		$navigation_background = get_theme_mod( 'nav_background_color', '#fff' );
		$nav_padding           = get_theme_mod( 'navigation_padding', 10 );
		$nav_margin_bottom     = get_theme_mod( 'nav_margin_bottom', 2 );
		$underline_post_links  = get_theme_mod( 'underline_post_links', true );

		// CSS array .
		$custom_styles                   = array();
		$custom_styles['links']          = "body a{color: {$color};}body a:hover{color: {$color};}";
		$custom_styles['link_hover']     = "a:focus, a:hover {color: {$color};}";
		$custom_styles['nav_links']      = "nav.main-navigation a:hover {color: {$color};background-color: #F8F9FA;}";
		$custom_styles['nav_background'] = ".brisko-navigation {background-color: {$navigation_background};}";
		$custom_styles['nav_padding']    = ".brisko-navigation {padding: {$nav_padding}px;}";
		$custom_styles['margin_bottom']  = ".brisko-navigation {margin-bottom: {$nav_margin_bottom}px;}";
		$custom_styles['bttn_color']     = "{$bttns} {display: inline-block;color: #fff;background-color: {$color}; border-color: {$color};}";

		if ( false === $underline_post_links ) {
			$custom_styles['underline_body_links'] = "body a{text-decoration: none;}"; // @codingStandardsIgnoreLine
			$custom_styles['underline_post_links'] = ".post-article a {text-decoration: none;}"; // @codingStandardsIgnoreLine
		}

		// css output.
		$custom_styles = implode( '', $custom_styles );

		wp_add_inline_style( 'custom-styles', $custom_styles );
	}

}
