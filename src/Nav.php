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
    public function __construct( array $args = [] )
    {
        $this->nav_args = [
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
        ];
    }

    public function nav_menu( array $nav_args = [] )
    {
        if ( ! \empty( $nav_args ) && \is_array( $nav_args ) ) {
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
