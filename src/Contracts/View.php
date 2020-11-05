<?php

namespace Brisko\Contracts;

interface View
{
	/**
	 * Get the view.
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
