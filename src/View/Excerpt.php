<?php

namespace Brisko\View;

use Brisko\Traits\Instance;

class Excerpt
{
    use Instance;

    /**
     * Displays an optional post excerpt.
     */
    public function post_excerpt()
    {
        if ( false === get_theme_mod( 'blog_excerpt', true ) ) {
            return false;
        }
        the_excerpt();
    }
}
