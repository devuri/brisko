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
	 * Header Image
	 */
	public function site_footer() {
		?>
		<footer id="colophon" class="site-footer this-site-footer bg-white <?php Options::get()->footer_top_margin(); ?>">
			<?php brisko_footer(); ?>
			<div align="center" class="site-info container">
				<div class="brisko-theme-credit">
					<?php $this->footer_credit(); ?>
					<?php do_action( 'brisko_footer_credit' ); ?>
				</div><!-- .brisko-theme-credit -->
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<?php
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
