<?php

namespace Brisko\View;

use Brisko\Theme;

abstract class Layout
{
	/**
	 * Layout background
	 *
	 * @return string
	 */
	public static function main_class() {
		return 'bg-white';
	}

	/**
	 * Display content
	 */
	public static function view() {
		// return the view .
	}

	/**
	 * Head section
	 *
	 * @return void
	 */
	public static function head(){ ?>
		<main id="primary" class="site-main <?php Theme::post_width(); ?> bg-white">
			<div class="row">
				<div class="col-md-8 primary-content">
		<?php
	}

	/**
	 * Footer section
	 */
	public static function footer() {
		?>
		</div><!-- col 8 -->
		<div class="col-md-4">
			<div class="sidebar mb-4  avs-sidebar pad-left-1m">
				<?php get_sidebar(); ?>
			</div><!-- sidebar -->
		</div><!-- col 4 -->
				</div><!-- row -->
			</main><!-- #main -->
		<?php
	}
}
