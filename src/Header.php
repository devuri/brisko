<?php

namespace Brisko;

final class Header
{
	/**
	 * Private $instance
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function get() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new Header();
		}
		return self::$instance;
	}

	/**
	 *  Constructor
	 */
	private function __construct() {
	}

	/**
	 * Header Image
	 */
	public function image() {

		if ( 'this-disabled' === Theme::options()->header_image_display() ) {
			return false;
		}

		if ( 'this-home-page-only' === Theme::options()->header_image_display() ) {
			if ( false === is_front_page() ) {
				return false;
			}
		}

		?>
			<div class="container-fluid brisko-header-img <?php Theme::options()->header_image_display(); ?>" style="padding:0px">
				<?php
					the_header_image_tag( array( 'class' => 'brisko-header-img' ) );
				?>
			</div>
		<?php
	}

}
