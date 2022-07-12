<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;
use Brisko\Theme;
use Brisko\Traits\Singleton;

class Assets implements SetupInterface
{
	use Singleton;

	/**
	 *  Assets scripts.
	 */
	private function __construct()
	{
		Styles::init();
		Scripts::init();
	}

	/**
	 * Singleton.
	 *
	 * @return object
	 */
	public static function init()
	{
		return new self();
	}

	/**
	 * Theme Assets uri.
	 *
	 * @return object
	 */
	public static function uri()
	{
		return get_template_directory_uri() . '/assets/static';
	}
}
