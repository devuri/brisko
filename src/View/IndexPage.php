<?php

namespace Brisko\View;

class IndexPage extends Layout
{

	/**
	 * Display content
	 */
	public static function view() {

		self::head();

		/**
		 * Index Page content
		 */
		if ( have_posts() ) :
 			if ( is_home() && ! is_front_page() ) : ?>
 				<header>
 					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
 				</header>
 				<?php
			endif;
 			/* Start the Loop */
 			while ( have_posts() ) :
 				the_post();
 				get_template_part( 'template-parts/content', get_post_type() );
 			endwhile;
 				the_posts_navigation();
 			else :
 				get_template_part( 'template-parts/content', 'none' );
 		endif;

		self::footer();
	}

}
