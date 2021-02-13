<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The SiteHeader class.
 *
 * Used for the <header> section
 * <header id="masthead" class="site-header">
 *
 * @package brisko
 */
final class SiteHeader
{

	use Singleton;

	/**
	 * Site Header
	 */
	public function site_header() {

		// elementor header.
		Element::get()->location( 'header' );

		get_template_part( 'template-parts/header', 'header' );
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
			<div class="<?php Options::get()->header_image_width(); ?> brisko-header-img" style="padding:0px">
				<?php
					the_header_image_tag( array( 'class' => 'brisko-header-img' ) );
				?>
			</div>
		<?php
	}

}
