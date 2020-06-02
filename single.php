<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package brisko
 */

get_header(); ?>
<main id="primary" class="site-main container white-bg">
		<div class="row">
		<div class="col-md-8 primary-content">
		<?php while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'brisko' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'brisko' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; ?>
		</div><!-- col 8 -->
	<div class="col-md-4">
		<div class="sidebar mb-4  avs-sidebar pad-left-1m">
					<?php get_sidebar(); ?>
				</div><!-- sidebar -->
			</div><!-- col 4 -->
		</div><!-- row -->
	</main><!-- #main -->
<?php get_footer();
