<?php

namespace Brisko;

use Brisko\Traits\Singleton;

/**
 * The Footer class.
 *
 * Used for the <footer> section.
 */
class Footer
{
	use Singleton;

	/**
	 * Site Footer.
	 */
	public function site_footer()
	{

		// elementor footer.
		Element::get()->location( 'footer' );

		if ( true === get_theme_mod( 'disable_footer', false ) ) {
			do_action( 'brisko_before_footer' );
			do_action( 'brisko_footer' );
			do_action( 'brisko_footer_credit' );
			do_action( 'brisko_after_footer' );

			return;
		}

		get_template_part( 'template-parts/footer', 'footer' );
	}

	/**
	 * Footer credit section.
	 *
	 * @return void
	 */
	public function footer_credit()
	{
		printf( esc_html__( '%1$s %2$s %3$s', 'brisko' ), wp_kses_post( $this->copyright() ), '   ', wp_kses_post( $this->poweredby() ) ); 
	}

	/**
	 * Copyright info.
	 *
	 * @return string $copyright
	 */
	public function copyright()
	{
		if ( false !== get_theme_mod( 'footer_copyright' ) ) {
			$copyright = '<span class="brisko-footer-copyright">' . esc_html( get_theme_mod( 'footer_copyright' ) ) . '</span>'; 
		} else {
			$copyright = get_bloginfo( 'name' );
		}

		return $copyright;
	}

	/**
	 * Brisko Theme credit powered by.
	 *
	 * @return string $poweredby
	 */
	public function poweredby()
	{
		if ( false !== get_theme_mod( 'poweredby' ) ) {
			$poweredby = '<span class="brisko-footer-poweredby">' . wp_kses_post( get_theme_mod( 'poweredby' ) ) . '</span>';
		} else {
			$poweredby = ' | Powered by <a href="https://wpbrisko.com">Brisko WordPress Theme</a>';
		}

		return $poweredby;
	}
}
