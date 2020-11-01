<?php

namespace Brisko\View;

/**
 *
 */
class Page extends Layout
{

	/**
	 * Display content
	 * @return [type] [description]
	 */
	public static function view(){

		self::head();

		/**
		 * Page content
		 */
		 while ( have_posts() ) :
 			the_post();
 			get_template_part( 'template-parts/content', 'page' );
 			if ( comments_open() || get_comments_number() ) :
 				comments_template();
 			endif;
 		endwhile;

		self::footer();
	}

	/**
	 * head section
	 * @return [type] [description]
	 */
	public static function head() {
		brisko_page_header(); ?>
		<main id="primary" class="site-main container bg-white">
		<?php
	}

	/**
	 * Footer section
	 */
	public static function footer(){ ?>
			</main><!-- #main -->
		<?php brisko_page_footer();
	}
}
