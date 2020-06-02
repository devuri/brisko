<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brisko
 */

get_header(); ?>
	<main id="primary" class="site-main container white-bg">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				the_archive_title( '<h2 class="page-title archive-title entry-meta">', '</h2> <br/>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<div class="row">
		<div class="col-md-8 primary-content">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
				the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
	</div><!-- col 8 -->
<div class="col-md-4">
	<div class="sidebar mb-4  avs-sidebar pad-left-1m">
				<?php get_sidebar(); ?>
			</div><!-- sidebar -->
		</div><!-- col 4 -->
	</div><!-- row -->
</main><!-- #main -->
<?php get_footer();
