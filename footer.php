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

?><footer id="colophon" class="site-footer white-bg <?php brisko_secondary_font(); ?>">
		<div align="center" class="site-info container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'brisko' ) ); ?>">
			 <?php printf( esc_html__( 'Powered by %s', 'brisko' ), 'WordPress' );?>
			</a>
			<span class="sep"> | </span>
				<?php
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'brisko' ), 'Brisko', '<a href="http://themeiko.com">Themeiko</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
