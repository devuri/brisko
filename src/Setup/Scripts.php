<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\EnqueueInterface;
use Brisko\Theme;

final class Scripts implements EnqueueInterface
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
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue() {

		if ( false === get_theme_mod( 'disable_bootstrap_js', true ) ) {
			wp_enqueue_script( 'brisko-bootstrap' );
		}

		if ( false === get_theme_mod( 'disable_navigation_js', true ) ) {
			wp_enqueue_script( 'brisko-navigation' );
		}

		if ( true === get_theme_mod( 'enable_smooth_scroll', false ) ) {
			wp_enqueue_script( 'brisko-smooth-scroll' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Enqueue styles and script
	 *
	 * @return void
	 */
	public function register() {

		wp_register_script( 'brisko-bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array( 'jquery' ), Theme::VERSION, true );
		wp_register_script( 'brisko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), Theme::VERSION, true );
		wp_register_script( 'brisko-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), Theme::VERSION, true );

	}

}
