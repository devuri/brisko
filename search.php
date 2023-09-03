<?php
/**
 * The template for displaying the search results pages.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/
 */

get_header();

brisko_layout_head();

if ( have_posts() ) { ?>
	<header class="page-header">
		<h3 class="page-title archive-title entry-meta">
			<?php
            // translators: %s: search query.
            printf( esc_html__( 'Search: %s', 'brisko' ), '<span>' . esc_html( get_bloginfo( 'name' ) ) . '</span>' );
    ?>
		</h3>
		<?php get_search_form(); ?>
		<br>
		<h2 class="page-title archive-title">
			<?php
    // translators: %s: search query.
    printf( esc_html__( 'Search Results for: %s', 'brisko' ), '<span>' . get_search_query() . '</span>' );
    ?>
		</h2>
	</header><!-- .page-header -->
	<br/>
	<?php
    // Start the Loop.
    while ( have_posts() ) {
        the_post();

        /*
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part( 'template-parts/content', 'search' );
    }

    brisko_posts_navigation();
} else {
    get_template_part( 'template-parts/content', 'none' );
}

brisko_layout_footer();

get_footer();
