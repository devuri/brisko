<?php
/**
 * Custom actions for Brisko
 * https://developer.wordpress.org/reference/functions/do_action/
 *
 * @package brisko
 */

// @codingStandardsIgnoreFile

/**
 * Brisko actions list
 */
if ( ! function_exists( 'brisko_actions' ) ) :
	function brisko_actions() {
		return Brisko\Actions::actions();
	}
endif;

/**
 * Brisko_before_header
 */
if ( ! function_exists( 'brisko_before_header' ) ) :
	function brisko_before_header() {
		/**
		 * Before the header tag.
		 */
		do_action( 'brisko_before_header' );
	}
endif;

/**
 * Brisko_custom_header
 */
if ( ! function_exists( 'brisko_custom_header' ) ) :
	function brisko_custom_header() {
		/**
		 * Custom header.
		 */
		do_action( 'brisko_custom_header' );
	}
endif;

/**
 * brisko_after_header
 */
if ( ! function_exists( 'brisko_after_header' ) ) :
	function brisko_after_header() {
		/**
		 * after the closing header tag.
		 */
		do_action( 'brisko_after_header' );
	}
endif;

/**
 * brisko_homepage_header
 */
if ( ! function_exists( 'brisko_homepage_header' ) ) :
	function brisko_homepage_header() {
		/**
		 * after the closing header tag.
		 */
		do_action( 'brisko_homepage_header' );
	}
endif;

/**
 * brisko_post_header
 */
if ( ! function_exists( 'brisko_post_header' ) ) :
	function brisko_post_header() {
			/**
			 * header section on posts.
			 */
			do_action( 'brisko_post_header' );
	}
endif;

/**
 * brisko_page_header
 */
if ( ! function_exists( 'brisko_page_header' ) ) :
	function brisko_page_header() {
			/**
			 * header section on pages.
			 */
			do_action( 'brisko_page_header' );
	}
endif;

/**
 * brisko_page_footer
 */
if ( ! function_exists( 'brisko_page_footer' ) ) :
	function brisko_page_footer() {
			/**
			 * footer section on pages.
			 */
			do_action( 'brisko_page_footer' );
	}
endif;

/**
 * brisko_after_entry_meta
 */
if ( ! function_exists( 'brisko_after_entry_meta' ) ) :
	function brisko_after_entry_meta() {
		/**
		 * before the entry meta.
		 */
		do_action( 'brisko_after_entry_meta' );
	}
endif;

/**
 * brisko_before_entry_meta
 */
if ( ! function_exists( 'brisko_before_entry_meta' ) ) :
	function brisko_before_entry_meta() {
		/**
		 * after the closing post-article tag.
		 */
		do_action( 'brisko_before_entry_meta' );
	}
endif;

/**
 * brisko_after_post_content
 */
if ( ! function_exists( 'brisko_after_post_content' ) ) :
	function brisko_after_post_content() {
		/**
		 * after the closing post-article tag.
		 */
		do_action( 'brisko_after_post_content' );
	}
endif;

/**
 * brisko_before_sidebar
 */
if ( ! function_exists( 'brisko_before_sidebar' ) ) :
	function brisko_before_sidebar() {
		/**
		 * before the sidebar.
		 */
		do_action( 'brisko_before_sidebar' );
	}
endif;

/**
 * brisko_after_sidebar
 */
if ( ! function_exists( 'brisko_after_sidebar' ) ) :
	function brisko_after_sidebar() {
		/**
		 * after the sidebar.
		 */
		do_action( 'brisko_after_sidebar' );
	}
endif;

/**
 * brisko_before_footer
 */
if ( ! function_exists( 'brisko_before_footer' ) ) :
	function brisko_before_footer() {
		/**
		 * before the opening footer tag.
		 */
		do_action( 'brisko_before_footer' );
	}
endif;

/**
 * brisko_footer
 */
if ( ! function_exists( 'brisko_footer' ) ) :
	function brisko_footer() {
			/**
			 * after the opening <footer> tag.
			 */
			do_action( 'brisko_footer' );
	}
endif;

/**
 * brisko_after_footer
 */
if ( ! function_exists( 'brisko_after_footer' ) ) :
	function brisko_after_footer() {
		/**
		 * after the closing footer tag.
		 * wp_footer happens just before this action
		 */
		do_action( 'brisko_after_footer' );
	}
endif;
