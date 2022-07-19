<?php

namespace Brisko\Traits;

use Brisko\Contracts\ThemeInterface;

trait Instance
{
    /**
     * Instantiate.
     *
     * @return ThemeInterface
     */
    public static function get()
    {
        $called_class = static::class;

        return new $called_class();
    }
}
