<?php

namespace Brisko;

use Brisko\Traits\Singleton;

final class Navigation
{

	use Singleton;

	/**
	 * Header Image
	 */
	public function navigation() {
		get_template_part( 'template-parts/nav', 'navigation' );
	}

}
