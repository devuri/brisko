<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;
use Brisko\Theme;

class Assets implements SetupInterface
{
    /**
     * Assets.
     *
     * @return void
     */
    public function init()
    {
        ( new Styles() )->init();
        ( new Scripts() )->init();
    }

    /**
     * Theme Assets uri.
     *
     * @return string
     */
    public static function uri()
    {
        return get_template_directory_uri() . '/assets/static';
    }
}
