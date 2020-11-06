<?php
/**
 * Template part for displaying single posts
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
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="post-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
		<?php brisko_before_entry_meta(); ?>
			<div class="entry-meta ">
			<?php brisko_posted_on(); ?>
			<?php brisko_posted_by(); ?>
			</div><!-- .entry-meta -->
		<?php brisko_after_entry_meta(); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
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
	</div><!-- .entry-content -->
	<footer class="entry-footer ">
		<?php brisko_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- post-article -->
