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
	 * Create the customizer sections array.
	 *
	 * The keys should be lowercase single words, these will be used
	 * to create sections, The array value can be mutitple words
	 * these will be used for section title.
	 */
	private function __construct() {

		$this->sections['pro']        = 'Pro Add-Ons';
		$this->sections['general']    = 'General';
		$this->sections['layout']     = 'Layout';
		$this->sections['navigation'] = 'Navigation';
		$this->sections['header']     = 'Header';
		$this->sections['pages']      = 'Pages';
		$this->sections['blog']       = 'Blog / Archive';

		if ( ! $this->is_disabled_footer() ) {
			$this->sections['footer'] = 'Footer';
		}

		$this->sections['advanced'] = 'Advanced';

	}

	/**
	 * Checks if the footer is disabled
	 *
	 * @return boolean
	 */
	protected static function is_disabled_footer() {
		if ( get_theme_mod( 'disable_footer', false ) ) {
			return true;
		}
		return false;
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
