<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;

/**
 * The Compatibility class.
 *
 * Used for for Header Footer Blocks plugin.
 *
 * @package brisko
 */
final class Compat implements SetupInterface
{

	use Singleton;

	/**
	 * Get Class
	 *
	 * @return Compat ..
	 */
	public static function init() {
		return new self();
	}

	/**
	 * [__construct description]
	 */
	private function __construct() {
		$this->hfe_header();
		$this->hfe_footer();
	}

	/**
	 * Compatibility for Header Footer Blocks plugin
	 *
	 * @link https://wordpress.org/plugins/header-footer-elementor
	 */
	public function hfe_header() {

		if ( function_exists( 'hfe_header_enabled' ) && hfe_header_enabled() ) {
			add_action( 'hfe_header', function() {
				get_template_part( 'template-parts/header', 'header' );
			}, 99 );  // @codingStandardsIgnoreLine
		}

	}

	/**
	 * Compatibility for Header Footer Blocks plugin
	 *
	 * @link https://wordpress.org/plugins/header-footer-elementor
	 */
	public function hfe_footer() {

		if ( function_exists( 'hfe_header_enabled' ) && hfe_header_enabled() ) {
			add_action( 'hfe_footer', function() {
				if ( ! get_theme_mod( 'disable_footer', false ) ) :
					get_template_part( 'template-parts/footer', 'footer' );
				endif;
			}, 99 );  // @codingStandardsIgnoreLine
		}
	}
}
