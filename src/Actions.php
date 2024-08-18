<?php

namespace Brisko;

use Brisko\Traits\Instance;
use InvalidArgumentException;

/**
 * Manages theme actions.
 *
 * This class is responsible for registering and executing theme-specific actions.
 */
class Actions
{
    use Instance;

    /**
     * Retrieves the list of theme-specific actions.
     *
     * @return array List of action hooks.
     */
    public function get_brisko_actions(): array
    {
        return [
            // Header actions
            'brisko_before_header',
            'brisko_custom_header',
            'brisko_navigation',
            'brisko_nav_menu',
            'brisko_after_header',
            'brisko_homepage_header',

            // Post actions
            'brisko_post_header',
            'brisko_blog_title',
            'brisko_blog_subtitle',
            'brisko_before_entry_meta',
            'brisko_entry_meta',
            'brisko_after_entry_meta',
            'brisko_before_tags',
            'brisko_related_content',
            'brisko_after_post_content',

            // Comments actions
            'brisko_before_comments',
            'brisko_after_comments',

            // Page actions
            'brisko_page_header',
            'brisko_page_footer',

            // Sidebar actions
            'brisko_before_sidebar',
            'brisko_after_sidebar',

            // Footer actions
            'brisko_before_footer',
            'brisko_footer_credit',
            'brisko_footer',
            'brisko_after_footer',
        ];
    }

    /**
     * Executes a specified action if it exists in the list of theme actions.
     *
     * @param string $action The name of the action to execute.
     *
     * @throws InvalidArgumentException If the action name is not valid.
     *
     * @return void
     */
    public function do_action( string $action )
    {
        if ( ! \in_array( $action, $this->get_brisko_actions(), true ) ) {
            throw new InvalidArgumentException( "The specified action '{$action}' is not valid." );
        }

        do_action( $action );
    }
}
