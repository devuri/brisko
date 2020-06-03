<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package brisko
 */
get_header(); ?>
<main id="primary" class="site-main container">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title archive-title entry-meta">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'brisko' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->
		<br/>
	<div class="row">
	<div class="col-md-8 primary-content">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
					the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
			endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;	?>
		</div><!-- col 8 -->
	<div class="col-md-4">
		<div class="sidebar mb-4  avs-sidebar pad-left-1m">
					<?php get_sidebar(); ?>
				</div><!-- sidebar -->
			</div><!-- col 4 -->
		</div><!-- row -->
	</main><!-- #main -->
<?php get_footer();
