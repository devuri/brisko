<?php

namespace Brisko;

use Brisko\Traits\Instance;

/**
 * The Brisko class.
 */
class Brisko
{
    use Instance;

    /**
     * Theme Actions.
     *
     * @param string $action the name of the action.
     *
     * @return Actions .
     */
    public function action( $action = null )
    {
        return Actions::get()->action( $action );
    }

    /**
     * Related Content.
     *
     * Adds Related Content in Brisko Plugin.
     *
     * Includes "get_post()" Retrieves post object.
     *
     * @see https://developer.wordpress.org/reference/functions/get_post/
     * @see https://gist.github.com/devuri/b0a86f75a86abfcdd7d41ed05e99de73
     *
     * @return void.
     */
    public static function related_content()
    {
        do_action( 'brisko_related_content', get_post() );
    }
}
