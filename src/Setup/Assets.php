<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;
use Brisko\Theme;

final class Assets implements SetupInterface
{

	use Singleton;

	/**
	 * Disable Theme Styles.
	 *
	 * @var bool
	 */
	private $disable_styles = false;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {
		return new Assets();
	}

	/**
	 *  Assets scripts
	 */
	private function __construct() {

		// get setting.
		$this->disable_styles = get_theme_mod( 'disable_styles', false );

		// enqueue.
		add_action( 'wp_enqueue_scripts', array( $this, 'brisko_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'brisko_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_css' ) );
		do_action( 'brisko_assets' );

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

	/**
	 * Enqueue scripts and styles.
	 */
	public function brisko_styles() {

		/**
		 * We can disable all theme styles.
		 *
		 * Useful for child themes.
		 */
		if ( false === $this->disable_styles ) {
			wp_enqueue_style( 'brisko-theme', get_stylesheet_uri(), array( 'underscores', 'bootstrap', 'brisko' ), Theme::VERSION );
			wp_enqueue_style( 'brisko', get_template_directory_uri() . '/css/brisko.css', array(), Theme::VERSION );
		}

		wp_style_add_data( 'brisko-style', 'rtl', 'replace' );
		wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/css/custom-styles.css', array( 'brisko-theme' ), Theme::VERSION );

		// Bootstrap and underscores.
		wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), Theme::VERSION );
		wp_register_style( 'underscores', get_template_directory_uri() . '/css/underscores.css', array(), Theme::VERSION );

	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function brisko_scripts() {

		wp_enqueue_script( 'brisko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), Theme::VERSION, true );

		if ( true === get_theme_mod( 'enable_smooth_scroll', false ) ) {
			wp_enqueue_script( 'brisko-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), Theme::VERSION, true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
