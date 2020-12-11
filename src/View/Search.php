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
				<h1 class="page-title archive-title entry-meta">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'brisko' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
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

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );
		endif;

			$this->footer();
	}
}
