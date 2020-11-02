<?php

namespace Brisko;

final class Enqueue
{
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
			self::$instance = new Enqueue();
		}
		return self::$instance;
	}

	/**
	 *  Enqueue scripts
	 */
	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'brisko_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_css' ) );
	}

	/**
	 * Custom Theme styles
	 */
	public function custom_css() {

		// Get the theme setting.
		$defualt = '#E4584B';
		$bttns  = 'button, input[type="button"], input[type="reset"], input[type="submit"]';
		$color = get_theme_mod( 'link_color', $defualt );
		$nav_padding = get_theme_mod( 'navigation_padding', 10 );
		$width = get_theme_mod( 'website_width', 1140 );

		// css output.
		$site_width  = ".container{max-width: {$width}px;}";
		$links  = "body a{color: {$color};}body a:hover{color: {$color};}";
		$nav_links   = "nav.main-navigation a:hover {color: {$color};background-color: #F8F9FA;}";
		$navigation   = ".brisko-navigation {padding: {$nav_padding}px;}";
		$bttn_color = "{$bttns} {display: inline-block;color: #fff;background-color: {$color}; border-color: {$color}";
		$custom_styles = $site_width . $links . $navigation . $nav_links . $bttn_color;

		wp_add_inline_style( 'custom-styles', $custom_styles );
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function brisko_scripts() {
		wp_enqueue_style( 'brisko-theme-style', get_stylesheet_uri(), array( 'underscores', 'bootstrap' ), Theme::VERSION );
		wp_style_add_data( 'brisko-style', 'rtl', 'replace' );

		wp_enqueue_style( 'custom-styles', get_stylesheet_uri(), array( 'brisko-theme-style' ), '/css/custom-styles.css', Theme::VERSION );

		/**
		 * Bootstrap
		 */
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), Theme::VERSION );
		wp_enqueue_style( 'underscores', get_template_directory_uri() . '/css/underscores.css', array(), Theme::VERSION );

		wp_enqueue_script( 'brisko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), Theme::VERSION, true );
		wp_enqueue_script( 'brisko-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), Theme::VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
