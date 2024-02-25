<?php

namespace Brisko;

/**
 * The main Navigation class.
 *
 * Used for main Navigation
 * this will load template part nav file.
 *
 * @see template-parts/nav
 */
class Nav
{
	protected $nav_args;

	/**
	 * Initializes the class with default navigation settings.
	 *
	 * This constructor sets up default arguments for a WordPress navigation menu. These defaults can be overridden
	 * by passing an array of arguments to the constructor. The `$nav_args` property is configured to define the
	 * structure and behavior of the navigation menu, adhering to WordPress standards.
	 *
	 * @param array $args {
	 *     Optional. An array of arguments to customize the navigation menu settings.
	 *
	 *     @type string $menu The menu to display. Default empty.
	 *     @type string $container The container element. Default 'ul'.
	 *     @type string $container_id The ID of the container element. Default empty.
	 *     @type string $container_aria_label The aria-label attribute for the container. Default empty.
	 *     @type string $menu_class The class(es) applied to the menu. Default 'menu nav-menu navbar-nav d-flex me-auto mb-2 mb-md-0'.
	 *     @type string $menu_id The ID of the menu. Default empty.
	 *     @type bool $echo Whether to echo the menu or return it. Default false.
	 *     @type callable $fallback_cb The fallback function if the menu doesn't exist. Default 'wp_page_menu'.
	 *     @type string $before Text before the link markup. Default empty.
	 *     @type string $after Text after the link markup. Default empty.
	 *     @type string $link_before Text before the link text. Default empty.
	 *     @type string $link_after Text after the link text. Default empty.
	 *     @type string $items_wrap The format of the menu items. Default '<ul id="%1$s" class="%2$s">%3$s</ul>'.
	 *     @type string $item_spacing How to handle whitespace between menu items. Default 'preserve'.
	 *     @type int $depth The depth of the menu. Default 0.
	 *     @type mixed $walker Instance of a custom walker class. Default empty.
	 *     @type string $theme_location The theme location identifier. Default 'menu-1'.
	 * }
	 */
	public function __construct( array $args = [] ) {
	    $this->nav_args = wp_parse_args(
            $args,
            [
				'menu'                 => '',
				'container'            => 'ul',
				'container_id'         => '',
				'container_aria_label' => '',
				'menu_class'           => 'menu nav-menu navbar-nav d-flex me-auto mb-2 mb-md-0',
				'menu_id'              => '',
				'echo'                 => false,
				'fallback_cb'          => 'wp_page_menu',
				'before'               => '',
				'after'                => '',
				'link_before'          => '',
				'link_after'           => '',
				'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'item_spacing'         => 'preserve',
				'depth'                => 0,
				'walker'               => '',
				'theme_location'       => 'menu-1',
            ]
        );
	}

    public function nav_menu( array $nav_args = [] )
    {
        if ( ! empty( $nav_args ) && \is_array( $nav_args ) ) {
            return wp_nav_menu( $nav_args );
        }

        return wp_nav_menu( $this->nav_args );
    }

    protected function nav_default(): array
    {
        return [
            'menu'                 => '',
            'container'            => 'div',
            'container_class'      => '',
            'container_id'         => '',
            'container_aria_label' => '',
            'menu_class'           => 'menu',
            'menu_id'              => '',
            'echo'                 => true,
            'fallback_cb'          => 'wp_page_menu',
            'before'               => '',
            'after'                => '',
            'link_before'          => '',
            'link_after'           => '',
            'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'item_spacing'         => 'preserve',
            'depth'                => 0,
            'walker'               => '',
            'theme_location'       => '',
        ];
    }
}
