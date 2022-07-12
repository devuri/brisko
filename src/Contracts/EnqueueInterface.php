<?php

namespace Brisko\Contracts;

interface EnqueueInterface
{
	/**
	 * Initialize instance.
	 */
	public static function init();

	/**
	 * Enqueue.
	 */
	public function enqueue();

	/**
	 * Register.
	 */
	public function register();
}
