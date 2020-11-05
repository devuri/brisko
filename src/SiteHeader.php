<?php

namespace Brisko;

final class SiteHeader
{

	/**
	 * Class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Get Class
	 *
	 * @return SiteHeader ..
	 */
	public static function get() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new SiteHeader();
		}
		return self::$instance;
	}

	/**
	 * [__construct description]
	 */
	private function __construct() {
		// nothing to see here .
	}


	/**
	 * Site Header
	 */
	public function site_header() {
		$this->head();
		Navigation::get()->navigation();
		$this->header_image();
		$this->foot();
	}

	/**
	 * Header Image
	 */
	public function header_image() {

		if ( 'this-disabled' === Options::get()->header_image_display() ) {
			return false;
		}

		if ( 'this-home-page-only' === Options::get()->header_image_display() ) {
			if ( false === is_front_page() ) {
				return false;
			}
		}

		?>
			<div class="<?php Options::get()->header_image_width(); ?> brisko-header-img <?php Options::get()->header_image_display(); ?>" style="padding:0px">
				<?php
					the_header_image_tag( array( 'class' => 'brisko-header-img' ) );
				?>
			</div>
		<?php
	}

	/**
	 * Header Image
	 */
	public function head() {
		?>
			<header id="masthead" class="site-header">
		<?php
	}

	/**
	 * Header Image
	 */
	public function foot() {
		?>
		</header><!-- #masthead -->
		<?php
	}
}
