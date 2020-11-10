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
	 * [__construct description]
	 */
	private function __construct() {

		$this->sections[] = 'general';
		$this->sections[] = 'navigation';
		$this->sections[] = 'header';
		$this->sections[] = 'pages';
		$this->sections[] = 'blog';
		$this->sections[] = 'posts';
		$this->sections[] = 'footer';

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
