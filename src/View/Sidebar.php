<?php

namespace Brisko\View;

use Brisko\Traits\Singleton;

class Sidebar
{

	use Singleton;

	/**
	 * Display content
	 */
	public function view() {

		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			return 0;
		}

		?>
		<aside id="secondary" class="widget-area">
		<?php
		/**
		 * Sidebar
		 */
		brisko_before_sidebar();
		dynamic_sidebar( 'sidebar-1' );
		brisko_after_sidebar();

		?>
		</aside><!-- #secondary -->
		<?php
	}


}
