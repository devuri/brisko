<?php

namespace Brisko\View;

use Brisko\Layout;

class Search extends Layout
{

	/**
	 * Display content
	 */
	public function view() {

		$this->head();

		if ( have_posts() ) : ?>
			<header class="page-header">
				<h3 class="page-title archive-title entry-meta">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search: %s', 'brisko' ), '<span>' . get_bloginfo( 'name' ) . '</span>' );
					?>
				</h3>
				<form role="search" method="get" class="search-form" action="https://dev.toyotajamaica.com/">
				<label>
					<span class="screen-reader-text">Search for:</span>
					<input type="search" class="search-field" placeholder="Search …" value="" name="s">
				</label>
				<input type="submit" class="search-submit" value="Search">
			</form><br>
				<h2 class="page-title archive-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'brisko' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
				<hr>
			</header><!-- .page-header -->
			<br/>
			<?php
			// Start the Loop.
			while ( have_posts() ) :
						the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
			endwhile;

			brisko_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
		endif;

			$this->footer();
	}
}
