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
<footer id="colophon" class="site-footer this-site-footer bg-white ">
	<?php brisko_footer(); ?>
		<div align="center" class="site-info container">
		<div class="brisko-theme-credit">
			<?php do_action( 'brisko_footer_credit' ); ?>
			</div><!-- .brisko-theme-credit -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
	<?php wp_footer(); ?>
		<?php brisko_after_footer(); ?>
	</body>
</html>
