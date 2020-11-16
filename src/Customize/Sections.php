<?php

namespace Brisko\Customize;

use Brisko\Traits\Singleton;

final class Sections {

	use Singleton;

	/**
	 * $sections
	 *
	 * @var array $sections
	 */
	private $sections = array();

	/**
	 * Create the customizer sections array
	 * The keys should be lowercase single words,
	 * these will be used to create sections
	 * The array value can be mutitple words
	 * these will be used for section title
	 */
	private function __construct() {

		$this->sections['general']    = 'General';
		$this->sections['navigation'] = 'Navigation';
		$this->sections['header']     = 'Header';
		$this->sections['pages']      = 'Pages';
		$this->sections['blog']       = 'Blog';
		$this->sections['posts']      = 'Posts';
		$this->sections['footer']     = 'Footer';

	}

	/**
	 * Lets define customizer sections
	 *
	 * Here is where we will add new panel sections
	 *
	 * @see Customizer sections
	 *
	 * @return array $sections
	 */
	public function sections() {
		return $this->sections;
	}

}
