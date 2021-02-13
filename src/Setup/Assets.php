<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;
use Brisko\Theme;

final class Assets implements SetupInterface
{

	use Singleton;

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
		Styles::init();
		Scripts::init();
	}
}
