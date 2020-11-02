<?php
/**
 * Brisko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brisko
 */

	/**
	 * Header Image
	 */
	function brisko_header_image() {

		if ( 'this-disabled' === Brisko\Theme::options()->header_image_display() ) {
			return false;
		}

		if ( 'this-home-page-only' === Brisko\Theme::options()->header_image_display() ) {
			if ( false === is_front_page() ) {
				return false;
			}
		}

		?>
			<div class="container-fluid brisko-header-img <?php Brisko\Theme::options()->header_image_display(); ?>" style="padding:0px">
				<?php
					the_header_image_tag( array( 'class' => 'brisko-header-img' ) );
				?>
			</div>
		<?php
	}


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
 	require get_template_directory() . 'src/Includes/jetpack.php';
}
