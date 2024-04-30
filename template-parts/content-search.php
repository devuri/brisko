<?php
/**
 * Template part for displaying results in search pages.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div class="post-article">
	<?php brisko_post_thumbnail(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
            the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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
		<?php the_excerpt(); ?>
		<div class="read-more ">
			<a class="more-link <?php echo esc_html( brisko_options('button_border_radius') ); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
			<?php echo esc_html__( 'Read More', 'brisko' ); ?>
		</a>
	</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- post-article -->
