<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_attr( brisko_options( 'display_page_header' ) ); ?>">
		<?php the_title( '<h2 class="page-title archive-title entry-meta">', '</h2>' ); ?>
	</header><!-- .entry-header -->
	<?php brisko_post_thumbnail(); ?>
	<div class="entry-content">
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
	<?php if ( get_edit_post_link() ) { ?>
		<footer class="entry-footer">
			<!-- edit-link -->
		</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
