<?php

namespace Brisko\View;

use Brisko\Traits\Instance;

class Content
{
    use Instance;

	/**
	 * Display content only.
	 *
	 * pure content will bypass `the_content` and use `get_the_content`
	 * works better for pure content management and will not break html.
	 *
	 * note: filters on `the_content` will not work.
	 *
	 */
    public function view()
    {
		if ( get_theme_mod( 'enable_pure_content', false ) ) {
            echo wp_kses_post( $this->the_content() );
        } else {
            the_content();
        }
    }

	/**
     * Display content.
     */
    protected function the_content()
    {
		return get_the_content( null, false );
    }

}
