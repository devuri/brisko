<?php

namespace Brisko\View;

use Brisko\Traits\Instance;

class Sidebar
{
    use Instance;

    /**
     * Display content.
     */
    public function view()
    {
        if ( ! is_active_sidebar( 'sidebar-1' ) ) {
            return 0;
        } ?>
		<aside id="secondary" class="widget-area">
		<?php
        /**
         * Sidebar.
         */
        do_action( 'brisko_before_sidebar' );
        dynamic_sidebar( 'sidebar-1' );
        do_action( 'brisko_after_sidebar' ); ?>
		</aside><!-- #secondary -->
		<?php
    }
}
