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

	/**
	 * Related Content.
	 *
	 * Adds Related Content in Brisko Pro.
	 *
	 * @return void.
	 */
	public static function related_content() {
		$post = get_post();
		do_action( 'brisko_related_content', $post );
	}

}
