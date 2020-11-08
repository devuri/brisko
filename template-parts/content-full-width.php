<?php
/**
 * Template part for displaying full width page content in page-full-width.php
 *
 * @package brisko
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php Brisko\Theme::post_thumbnail(); ?>
	<div class="full-width-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brisko' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
