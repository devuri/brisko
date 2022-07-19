<?php
/**
 * Shim for sites older than 5.2.
 *
 * IMPORTANT function should remain here so that we can exclude during phpstan runs.
 * see phpstan neon file.
 *
 * @see https://core.trac.wordpress.org/ticket/12563
 * @see https://make.wordpress.org/core/2019/04/24/miscellaneous-developer-updates-in-5-2/
 */

if ( ! \function_exists( 'wp_body_open' ) ) {
    function wp_body_open()
    {
        do_action( 'wp_body_open' );
    }
}
