<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header <?php echo esc_attr( Brisko\Theme::options()->display_page_header() ); ?>">
		<?php the_title( '<h2 class="page-title archive-title entry-meta">', '</h2>' ); ?>
	</header><!-- .entry-header -->
	<?php Brisko\Theme::post_thumbnail(); ?>
	<div class="entry-content">
		<?php
		/**
		 * pure content will bypass `the_content` and use `get_the_content`
		 * works better for pure content management and will not break html.
		 *
		 * note: filters on `the_content` will not work.
		 *
		 */
		Brisko\Theme::content();
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
			<?php
    edit_post_link(
        sprintf(
            wp_kses(
                // translators: %s: Name of current post. Only visible to screen readers
                __( 'Edit <span class="screen-reader-text">%s</span>', 'brisko' ),
                [
                    'span' => [
                        'class' => [],
                    ],
                ]
            ),
            wp_kses_post( get_the_title() )
        ),
        '<span class="edit-link">',
        '</span>'
    );
	    ?>
		</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
