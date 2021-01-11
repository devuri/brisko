<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The main Actions class.
 *
 * Used for Actions
 *
 * @package brisko
 */
final class Actions
{

	use Singleton;

	/**
	 * List of available actions
	 *
	 * @return array $actions
	 */
	public function actions() {
		$actions   = array();
		$actions[] = 'brisko_before_header';
		$actions[] = 'brisko_after_header';
		$actions[] = 'brisko_homepage_header';
		$actions[] = 'brisko_post_header';
		$actions[] = 'brisko_before_entry_meta';
		$actions[] = 'brisko_after_entry_meta';
		$actions[] = 'brisko_before_comments';
		$actions[] = 'brisko_after_comments';
		$actions[] = 'brisko_page_header';
		$actions[] = 'brisko_page_footer';
		$actions[] = 'brisko_after_post_content';
		$actions[] = 'brisko_before_sidebar';
		$actions[] = 'brisko_after_sidebar';
		$actions[] = 'brisko_before_footer';
		$actions[] = 'brisko_footer_credit';
		$actions[] = 'brisko_footer';
		$actions[] = 'brisko_after_footer';
		return $actions;
	}

	/**
	 * Creates a Theme action
	 *
	 * @param  string $action the name of the action.
	 * @return void|false
	 */
	public function action( $action = false ) {
		if ( false === $action ) {
			return false;
		}
		// check if this is valid action.
		if ( in_array( $action, $this->actions(), true ) ) {
			do_action( $action );
		}
	}

}
