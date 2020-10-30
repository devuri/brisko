<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brisko
 */
?>
<?php brisko_before_footer(); ?>
<footer id="colophon" class="site-footer bg-white secondary-font">
	<?php brisko_footer(); ?>
		<div align="center" class="site-info container">
		<div class="brisko-theme-credit"><?php

			/**
			 * Copyright info
			 */
			if ( get_theme_mod( 'footer_copyright' ) !== false ) {
				$copyright = '<span class="brisko-footer-copyright">' . esc_html__( get_theme_mod( 'footer_copyright' ) ) . '</span>';
			} else {
				$copyright = get_bloginfo('name');
			}

			/**
			 * Brisko Theme credit powered by
			 */
			if ( get_theme_mod( 'poweredby' ) !== false ) {
 				$poweredby = wp_kses_post( get_theme_mod( 'poweredby' ) );
 			} else {
 				$poweredby = 'Powered by <a href="https://wpbrisko.com">Brisko WordPress Theme</a>';
 			}
			printf( esc_html__( '%1$s %2$s %3$s', 'brisko' ), $copyright, '   ', $poweredby );

				?></div><!-- .brisko-theme-credit -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php brisko_after_footer(); ?>
</body>
</html>
