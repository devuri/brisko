<?php

namespace Brisko;

use Brisko\Contracts\ViewInterface;
use Brisko\Traits\Instance;

/**
 * The main theme Layout class.
 *
 * We will use this as the base for all main views.
 */
class Layout implements ViewInterface
{
    use Instance;

    /**
     * Layout background.
     *
     * @return string
     *
     * @psalm-return 'bg-white'
     */
    public function main_class()
    {
        return 'bg-white';
    }

    /**
     * Display content.
     *
     * this here for PHP compatability, will be declared in child class.
     */
    public function view()
    {
        print 'method Layout::view() must be overridden in a subclass.';
    }

    /**
     * Disabled Sidebar.
     */
    public function disable_sidebar()
    {
        if ( 1 === get_theme_mod( 'disable_sidebar', false ) ) {
            return true;
        }

        return false;
    }

    /**
     * Head section.
     *
     * @return void
     *
     * @see https://developer.wordpress.org/reference/functions/get_template_part/
     */
    public function head()
    {
        // check if sidebar or not .
        $sidebar_display = null;

		// set the $content_class.
		if ( $this->disable_sidebar() ) {
			$content_class = 'col-md';
		} else {
			$content_class = 'col-md-8';
		}

        // params .
        $args = [ 'content_class' => $content_class ];
        get_template_part( 'template-parts/head', 'blog', $args );
    }

	/**
	 * Sanitize string
	 * @param  string $string
	 * @return string
	 */
	protected static function sanitize( $string )
	{
		return sanitize_html_class( $string );
	}

    /**
     * Get the sidebar.
     */
    public function sidebar()
    {
        if ( $this->disable_sidebar() ) {
            return false;
        }
        get_template_part( 'template-parts/sidebar' );
    }

    /**
     * Footer section.
     */
    public function footer()
    {
        ?>
		</div><!-- col 8 -->
				<?php $this->sidebar(); ?>
			</div><!-- row -->
		</main><!-- #main -->
		<?php
    }
}
