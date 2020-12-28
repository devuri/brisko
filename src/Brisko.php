<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The Brisko class.
 *
 * @package brisko
 */
final class Brisko
{

	use Singleton;

	/**
	 * Theme Actions
	 *
	 * @param  string $action the name of the action.
	 * @return Actions .
	 */
	public function action( $action = null ) {
		return Actions::get()->action( $action );
	}

}
