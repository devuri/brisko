<?php

namespace Brisko\View;

use Brisko\Layout;

class Archive extends Layout
{
	/**
	 * Header title section.
	 *
	 * @return void
	 */
	public function header()
	{
		?><div class="archive-header container-fluid">
			<div class="archive-header-title container">
				<h2>
					<?php do_action( 'brisko_blog_title' ); ?>
				</h2>
				<p>
					<?php do_action( 'brisko_blog_subtitle' ); ?>
				</p>
			</div>
		</div>
		<?php
	}

	/**
	 * Display content.
	 */
	public function view()
	{
		$this->head();

		do_action( 'brisko_post_header' );

		// Post content
		if ( have_posts() ) {
			?>
			<header class="page-header">
				<?php
				the_archive_title( '<h2 class="page-title archive-title entry-meta">', '</h2> <br/>' );
			the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header><!-- .page-header -->
			<?php
			// Start the Loop
			while ( have_posts() ) {
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			}
			brisko_posts_navigation();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		$this->footer();
	}
}
