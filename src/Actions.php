<?php

namespace Brisko;

use Brisko\Traits\Instance;

/**
 * The main Actions class.
 *
 * Used for Actions
 */
class Actions
{
    use Instance;

    /**
     * List of available actions.
     *
     * @return (mixed|string)[] $actions
     *
     * @psalm-return array<mixed|string>
     */
    public function get_brisko_actions()
    {
        $actions = null;

        // header.
        $actions[] = 'brisko_before_header';
        $actions[] = 'brisko_custom_header';
        $actions[] = 'brisko_navigation';
        $actions[] = 'brisko_nav_menu';
        $actions[] = 'brisko_after_header';
        $actions[] = 'brisko_homepage_header';

        // post.
        $actions[] = 'brisko_post_header';
        $actions[] = 'brisko_blog_title';
        $actions[] = 'brisko_blog_subtitle';
        $actions[] = 'brisko_before_entry_meta';
        $actions[] = 'brisko_after_entry_meta';
        $actions[] = 'brisko_before_tags';
        $actions[] = 'brisko_related_content';
        $actions[] = 'brisko_after_post_content';

        // comments.
        $actions[] = 'brisko_before_comments';
        $actions[] = 'brisko_after_comments';

        // page.
        $actions[] = 'brisko_page_header';
        $actions[] = 'brisko_page_footer';

        // sidebar.
        $actions[] = 'brisko_before_sidebar';
        $actions[] = 'brisko_after_sidebar';

        // footer.
        $actions[] = 'brisko_before_footer';
        $actions[] = 'brisko_footer_credit';
        $actions[] = 'brisko_footer';
        $actions[] = 'brisko_after_footer';

        return $actions;
    }

    /**
     * Creates a Theme action.
     *
     * @param bool|string $action the name of the action.
     *
     * @return false|void
     */
    public function action( $action = false )
    {
        if ( false === $action ) {
            return false;
        }
        // check if this is valid action.
        if ( \in_array( $action, $this->get_brisko_actions(), true ) ) {
            do_action( $action );
        }
    }
}
