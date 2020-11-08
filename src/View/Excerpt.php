<?php

namespace Brisko\View;

use Brisko\Traits\Singleton;

class Excerpt
{

	use Singleton;

	/**
	 * Displays an optional post excerpt.
	 */
	public function post_excerpt() {

		if ( false === get_theme_mod( 'blog_excerpt', true ) ) {
			return false;
		}
		the_excerpt();
	}

}
