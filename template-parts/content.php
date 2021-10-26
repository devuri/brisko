<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brisko
 */

?>
<div class="post-article">
	<?php Brisko\Theme::post_thumbnail(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
				<?php
		else :
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
		<?php do_action( 'brisko_before_entry_meta' ); ?>
			<div class="entry-meta ">
				<?php
				brisko_posted_on();
				brisko_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php do_action( 'brisko_after_entry_meta' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'brisko' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			?>
			<footer class="entry-footer ">
				<?php brisko_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php else : ?>
			<div class="post-excerpt" style="font-size: unset;">
				<?php Brisko\Theme::excerpt(); ?>
			</div>
		<div class="read-more ">
			<a class="more-link <?php echo esc_html( Brisko\Theme::options()->button_border_radius() ); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
			<?php echo esc_html__( 'Read More', 'brisko' ); ?>
		</a>
	</div><!-- read-more -->
	<?php endif; ?>
	<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brisko' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- post-article -->
