<?php

namespace Brisko\View;

/**
 *
 */
class Single extends Layout
{

	/**
	 * Display content
	 * @return [type] [description]
	 */
	public static function view(){

		self::head();

		brisko_post_header();

		/**
		 * Post content
		 * @var [type]
		 */
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );

			// custom action
			brisko_after_post_content();

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'brisko' ) . '</span> <h5 class="nav-title">%title</h5>',
				)
			);

			do_action( 'brisko_before_comments' );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			do_action( 'brisko_after_comments' );

		endwhile;

		self::footer();
	}

}
