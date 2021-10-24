<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;
use Brisko\Theme;

final class Assets implements SetupInterface
{

	use Singleton;

	/**
	 *  Assets scripts
	 */
	private function __construct() {
		Styles::init();
		Scripts::init();
	}

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {
		return new Assets();
	}

	/**
	 * Theme Assets uri.
	 *
	 * @return object
	 */
	public static function uri() {
		return get_stylesheet_directory_uri() . '/assets/static';
	}

}
