<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;

/**
 * The main Jetpack class.
 *
 * Used for Jetpack compatibility
 * this will load the Jetpack compatibility file.
 *
 * @package brisko
 */
final class Jetpack implements SetupInterface
{

	use Singleton;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {
		return new Jetpack();
	}

	/**
	 *  Constructor
	 */
	private function __construct() {
		if ( defined( '\JETPACK__VERSION' ) ) {
			add_action( 'after_setup_theme', array( $this, 'jetpack_setup' ) );
		}
	}

	/**
	 * Jetpack setup function.
	 *
	 * See: https://jetpack.com/support/infinite-scroll/
	 * See: https://jetpack.com/support/responsive-videos/
	 * See: https://jetpack.com/support/content-options/
	 */
	public function jetpack_setup() {
		// Add theme support for Infinite Scroll.
		add_theme_support(
			'infinite-scroll',
			array(
				'container' => 'primary',
				'render'    => array( $this, 'infinite_scroll_render' ),
				'footer'    => 'page',
			)
		);

		// Add theme support for Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		// Add theme support for Content Options.
		add_theme_support(
			'jetpack-content-options',
			array(
				'post-details'    => array(
					'stylesheet' => 'brisko-style',
					'date'       => '.posted-on',
					'categories' => '.cat-links',
					'tags'       => '.tags-links',
					'author'     => '.byline',
					'comment'    => '.comments-link',
				),
				'featured-images' => array(
					'archive' => true,
					'post'    => true,
					'page'    => true,
				),
			)
		);
	}

	/**
	 * Custom render function for Infinite Scroll.
	 */
	public function infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( is_search() ) :
				get_template_part( 'template-parts/content', 'search' );
			else :
				get_template_part( 'template-parts/content', get_post_type() );
			endif;
		}
	}

}
