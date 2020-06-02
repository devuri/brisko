<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brisko
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php brisko_post_thumbnail(); ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			brisko_posted_on();
			brisko_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-summary">
		<?php
		the_excerpt();
		printf( esc_html__( '%1$s', 'brisko' ), '<div class="read-more"><a class="more-link" href="'.get_permalink().'">Read More</a></div>' );
		?></div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->
