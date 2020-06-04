<?php

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
