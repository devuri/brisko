<?php

namespace Brisko\Setup;

use Brisko\AbstractEnq;

class Scripts extends AbstractEnq
{
    public function enqueue()
    {
        if ( get_theme_mod( 'use_block_templates', false ) ) {
            return;
        }

        self::enqueue_script( 'uikitjs', 'enable_uikit_js' );
        self::enqueue_script( 'uikit-icons', 'enable_uikit_icons_js' );

        self::enqueue_script( 'navigationjs', 'enable_navigation_js', self::maybe() );
        self::enqueue_script( 'smooth-scrolljs', 'enable_smooth_scroll', self::maybe() );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }

    public function register()
    {
        self::register_script( 'uikitjs', 'uikit/js/uikit.min.js' );
        self::register_script( 'uikit-icons', 'uikit/js/uikit-icons.min.js' );

        self::register_script( 'navigationjs', 'js/navigation.min.js' );
        self::register_script( 'smooth-scrolljs', 'js/smooth-scroll.min.js' );
    }
}
