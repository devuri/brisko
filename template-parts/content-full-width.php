<?php
/**
 * Template part for displaying full width page content in page-full-width.php.
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php brisko()::post_thumbnail(); ?>
	<div class="full-width-content">
		<?php
        /**
         * pure content will bypass `the_content` and use `get_the_content`
         * works better for pure content management and will not break html.
         *
         * note: filters on `the_content` will not work.
         */
        brisko_layout_content();

wp_link_pages(
    [
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brisko' ),
        'after'  => '</div>',
    ]
);
?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
