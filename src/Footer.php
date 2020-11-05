<?php

namespace Brisko;

final class Footer
{

	/**
	 * Class instance.
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * Get Class
	 *
	 * @return Footer ..
	 */
	public static function get() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Footer();
		}
		return self::$instance;
	}

	/**
	 * [__construct description]
	 */
	private function __construct() {
		// nothing to see here .
	}

	/**
	 * Header Image
	 */
	public function site_footer() {
		?>
		<footer id="colophon" class="site-footer this-site-footer bg-white this-margin-top">
			<?php brisko_footer(); ?>
			<div align="center" class="site-info container">
				<div class="brisko-theme-credit">
					<?php do_action( 'brisko_footer_credit' ); ?>
				</div><!-- .brisko-theme-credit -->
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<?php
	}

}
