<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\Setup;

final class Body implements Setup
{

	use Singleton;

	/**
	 * Get Class
	 *
	 * @return Body ..
	 */
	public static function init() {
		return new Body();
	}

	/**
	 * [__construct description]
	 */
	private function __construct() {
		$this->body_class();
	}

	/**
	 * Lets define css classes
	 *
	 * Here is where we will add new css classes to the body_class
	 *
	 * @return array $class
	 */
	private function add_css_class() {

		$class[] = 'brisko-font';
		$class[] = 'brisko-font-style';
		return $class;
	}

	/**
	 * Add Body Classes
	 */
	public function body_class() {
			// Add more body classes by filter.
			add_filter( 'body_class', function( $classes ) {
				return array_merge( $classes, self::add_css_class() );
			}
		);
	}

}
