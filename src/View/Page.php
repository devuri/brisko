<?php

namespace Brisko\View;

use Brisko\Layout;

class Page extends Layout
{
    /**
     * Display content.
     */
    public function view()
    {
        $this->head();

        // Page content
        while ( have_posts() ) {
            the_post();
			self::template_part();
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }

        $this->footer();
    }

	/**
	 * Page template part.
	 *
	 * @return void
	 */
	protected static function template_part()
	{
		get_template_part( 'template-parts/content', 'page' );
	}

    /**
     * Head section.
     */
    public function head()
    {
        do_action( 'brisko_page_header' );
        get_template_part( 'template-parts/head', 'page' );
    }

    /**
     * Footer section.
     */
    public function footer()
    {
        ?>
			</main><!-- #main -->
		<?php
        do_action( 'brisko_page_footer' );
    }
}
