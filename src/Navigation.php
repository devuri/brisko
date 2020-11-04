<?php

namespace Brisko;

final class Navigation
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
	 * @return Navigation ..
	 */
	public static function get() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Navigation();
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
	public function navigation() {
		get_template_part( 'template-parts/nav', 'navigation' );
	}

}
