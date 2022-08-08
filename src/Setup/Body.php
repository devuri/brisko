<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;
use Brisko\Traits\Instance;

class Body implements SetupInterface
{
    /**
     * Get Class.
     *
     * @return void
     */
    public function init()
    {
        $this->body_class();
    }

    /**
     * Add Body Classes.
     */
    public function body_class()
    {
        // Add more body classes by filter.
        add_filter(
            'body_class',
            function( $classes ) {
                return array_merge( $classes, self::add_css_class() );
            }
        );
    }

    /**
     * Lets define css classes.
     *
     * Here is where we will add new css classes to the body_class
     *
     * @return (mixed|string)[] $class
     *
     * @psalm-return array<'brisko-font'|'brisko-font-style'|mixed>
     */
    private function add_css_class()
    {
        $class[] = 'brisko-font';
        $class[] = 'brisko-font-style';

        return $class;
    }
}
