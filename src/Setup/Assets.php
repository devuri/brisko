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
     * @param string     $asset path to the asset like: assets/dist/style.css
     * @param null|mixed $path
     *
     * @return string
     */
    public static function uri( $asset, $path = null )
    {
        if ( $path ) {
            return $path . $asset;
        }

        return get_template_directory_uri() . '/assets/dist/' . $asset;
    }
}
