<?php

namespace Tests\Unit;

use Tests\BriskoTest;

/**
 * @internal
 *
 * @coversNothing
 */
class HelperTest extends BriskoTest
{
    public function test_brisko_object_attributes(): void
    {
        $brisko = brisko();

        static::assertIsObject($brisko);

        static::assertObjectHasAttribute('activate',$brisko);
        static::assertObjectHasAttribute('assets',$brisko);
        static::assertObjectHasAttribute('body',$brisko);
        static::assertObjectHasAttribute('head',$brisko);
        static::assertObjectHasAttribute('jetpack',$brisko);
        static::assertObjectHasAttribute('customizer',$brisko);
    }
}
