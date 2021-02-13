<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The Footer class.
 *
 * Used for the <footer> section.
 *
 * @package brisko
 */
final class Footer
{

	use Singleton;

	/**
	 * Site Footer
	 */
	public function site_footer() {

		if ( true === get_theme_mod( 'disable_footer', false ) ) :
			brisko_footer();
			do_action( 'brisko_footer_credit' );
			return;
		endif;

		// checks for elementor footer.
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) :
			get_template_part( 'template-parts/footer', 'footer' );
		endif;
	}

	/**
	 * Footer credit section
	 *
	 * @return void
	 */
	public function footer_credit() {
		printf( esc_html__( '%1$s %2$s %3$s', 'brisko' ), wp_kses_post( $this->copyright() ), '   ', wp_kses_post( $this->poweredby() ) ); // @codingStandardsIgnoreLine
	}

	/**
	 * Copyright info
	 *
	 * @return string $copyright
	 */
	public function copyright() {

		if ( get_theme_mod( 'footer_copyright' ) !== false ) {
			$copyright = '<span class="brisko-footer-copyright">' . esc_html( get_theme_mod( 'footer_copyright' ) ) . '</span>'; // @codingStandardsIgnoreLine
		} else {
			$copyright = get_bloginfo( 'name' );
		}
		return $copyright;
	}

	/**
	 * Brisko Theme credit powered by
	 *
	 * @return string $poweredby
	 */
	public function poweredby() {

		if ( get_theme_mod( 'poweredby' ) !== false ) {
			$poweredby = '<span class="brisko-footer-poweredby">' . wp_kses_post( get_theme_mod( 'poweredby' ) ) . '</span>';
		} else {
			$poweredby = ' | Powered by <a href="https://wpbrisko.com">Brisko WordPress Theme</a>';
		}
		return $poweredby;
	}

}
