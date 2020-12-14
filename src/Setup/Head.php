<?php

namespace Brisko\Setup;

use Brisko\Traits\Singleton;
use Brisko\Contracts\SetupInterface;

final class Head implements SetupInterface
{

	use Singleton;

	/**
	 * Singleton
	 *
	 * @return object
	 */
	public static function init() {
		return new Head();
	}

	/**
	 *  Constructor
	 */
	private function __construct() {
		add_action( 'wp_head', array( $this, 'brisko_pingback_header' ) );
		add_filter( 'body_class', array( $this, 'brisko_body_classes' ) );
		add_action( 'after_setup_theme', array( $this, 'brisko_custom_header_setup' ) );
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	public function brisko_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}
		return $classes;
	}

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	public function brisko_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	/**
	 * Set up the WordPress core custom header feature.
	 *
	 * @uses brisko_header_style()
	 *
	 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
	 */
	public function brisko_custom_header_setup() {
		add_theme_support(
			'custom-header',
			apply_filters(
				'brisko_custom_header_args',
				array(
					'default-image'      => '',
					'default-text-color' => '000000',
					'width'              => 1200,
					'height'             => 250,
					'flex-height'        => true,
					'wp-head-callback'   => array( $this, 'brisko_header_style' ),
				)
			)
		);
	}

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see brisko_custom_header_setup().
	 */
	public function brisko_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}

}
