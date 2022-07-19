<?php

namespace Brisko\Setup;

use Brisko\Contracts\SetupInterface;
use Brisko\Theme;
use Brisko\Traits\Instance;

class Assets implements SetupInterface
{
    use Instance;

    /**
     *  Assets scripts.
     */
    private function __construct()
    {
        Styles::init();
        Scripts::init();
    }

    /**
     * Singleton.
     *
     * @return self
     */
    public static function init()
    {
        return new self();
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
