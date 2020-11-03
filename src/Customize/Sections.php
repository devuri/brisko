<?php

namespace Brisko\Customize;

final class Sections {

	/**
	 * $sections
	 *
	 * @var array $sections
	 */
	private static $sections = array();

	/**
	 * Lets define customizer sections
	 *
	 * Here is where we will add new panel sections
	 *
   	 * @see Customizer sections
	 *
	 * @return array $sections
	 */
	protected static function sections() {

		self::$sections[] = 'general';
		self::$sections[] = 'navigation';
		self::$sections[] = 'header';
		self::$sections[] = 'pages';
		self::$sections[] = 'blog';
		self::$sections[] = 'posts';
		self::$sections[] = 'footer';
		return self::$sections;
	}

	/**
	 * Get the sections list
	 */
	public static function get() {
		return self::sections();
	}
}
