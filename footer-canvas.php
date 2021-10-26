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
</div><!-- #page -->
<?php do_action( 'brisko_before_footer' ); ?>
<?php do_action( 'brisko_footer' ); ?>
	<?php wp_footer(); ?>
		<?php do_action( 'brisko_after_footer' ); ?>
	</body>
</html>
