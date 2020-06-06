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
				<?php
				printf( esc_html__( 'Copyright &copy; %1$s %2$s. Theme %3$s by %4$s.', 'brisko' ), date_i18n( __( 'Y' , 'brisko' ) ), get_bloginfo( 'name' ), 'Brisko', '<a href="http://themeiko.com">Themeiko</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php brisko_after_footer(); ?>
</body>
</html>
