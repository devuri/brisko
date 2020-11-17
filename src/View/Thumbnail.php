<?php

namespace Brisko\View;

use Brisko\Traits\Singleton;
use Brisko\Options;

class Thumbnail
{

	use Singleton;

	/**
	 * Thumbnail for single
	 */
	public function thumbnail_singular() {
		?>
		<div class="post-thumbnail <?php Options::get()->post_thumbnail_display(); ?>">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
		<?php
	}

	/**
	 * Thumbnail for blog
	 */
	public function thumbnail_blog() {
		?>
		<div class="blog-thumbnail">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
			?>
		</a>
	</div><!-- .blog-thumbnail -->
		<?php
	}

	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	public function post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return false;
		}

		if ( is_singular() ) :

			$this->thumbnail_singular();

		else :

			$this->thumbnail_blog();

		endif; // End is_singular().
	}

}
