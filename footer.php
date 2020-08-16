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
			 * Brisko Theme credit
			 * @var [type]
			 */
			$copyright = '<span class="brisko-footer-copyright">'.get_option('briskotheme_options')['copyright'].'</span>';
			printf( esc_html__( '%1$s %2$s Theme %3$s by %4$s.', 'brisko' ), $copyright , ' | ' ,' Brisko', '<a href="https://switchwebdev.com/brisko-wordpress-theme/">SwitchWebdev</a>' );

				?></div><!-- .brisko-theme-credit -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php brisko_after_footer(); ?>
</body>
</html>
