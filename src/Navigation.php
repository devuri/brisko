<?php

namespace Brisko;

use Brisko\Traits\Singleton;

final class Navigation
{

	use Singleton;

	/**
	 * Get Class
	 *
	 * @return Navigation ..
	 */
	public static function get() {
		return new Navigation();
	}

	/**
	 * Header Image
	 */
	public function navigation() {
		get_template_part( 'template-parts/nav', 'navigation' );
	}

}
