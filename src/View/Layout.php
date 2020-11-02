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
		<main id="primary" class="site-main <?php Theme::options()->post_width(); ?> bg-white">
			<div class="row">
				<!-- col-md-8  -->
				<div class="col-md primary-content">
		<?php
	}

	/**
	 * Get the sidebar.
	 */
	public static function sidebar() {

		if ( 1 === get_theme_mod( 'disable_sidebar', false ) ) {
			return false;
		}

		?>
		<!-- col-md-4 -->
		<div class="col-md-4">
			<div class="sidebar mb-4  avs-sidebar pad-left-1m">
				<?php get_sidebar(); ?>
			</div><!-- sidebar -->
		</div><!-- col 4 -->
		<?php
	}

	/**
	 * Footer section
	 */
	public static function footer() {
		?>
		</div><!-- col 8 -->
				<?php self::sidebar(); ?>
			</div><!-- row -->
		</main><!-- #main -->
		<?php
	}
}
