<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The main Navigation class.
 *
 * Used for main Navigation
 * this will load template part nav file.
 *
 * @see template-parts/nav
 *
 * @package brisko
 */
final class Navigation
{

	use Singleton;

	/**
	 * Navigation
	 */
	public function navigation() {

		if ( true === get_theme_mod( 'disable_navigation', false ) ) :
			do_action( 'brisko_navigation' );
			return;
		endif;

		get_template_part( 'template-parts/navigation', 'navigation' );
	}

	/**
	 * Navigation Menu
	 */
	public function nav_menu() {

		if ( true === get_theme_mod( 'disable_nav_menu', false ) ) :
			do_action( 'brisko_nav_menu' );
			return;
		endif;

		get_template_part( 'template-parts/nav' );
	}

}
