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
		get_template_part( 'template-parts/nav', 'navigation' );
	}

}
