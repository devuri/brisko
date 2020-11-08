<?php

namespace Brisko\Contracts;

interface View
{

	/**
	 * Get the instance.
	 */
	public static function get();

	/**
	 * The view.
	 */
	public function view();

	/**
	 * Head.
	 */
	public function head();

	/**
	 * The Footer.
	 */
	public function footer();
}
