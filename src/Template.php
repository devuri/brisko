<?php

namespace Brisko;

use Brisko\Traits\Instance;
use Brisko\View\Archive;
use Brisko\View\CanvasPage;
use Brisko\View\FullWidthPage;
use Brisko\View\HomePage;
use Brisko\View\IndexPage;
use Brisko\View\Page;
use Brisko\View\Page404;
use Brisko\View\Search;
use Brisko\View\Sidebar;
use Brisko\View\Single;

/**
 * The main Template class.
 *
 * We will use this as the entry point
 * to instantiate and access the views.
 */
class Template
{
    use Instance;

	/**
	 * Load header template.
	 *
	 * @param  string $name  The name of the specialised header.
	 * @param  array  $args  Additional arguments passed to the header template.
	 * @return void|false    Void on success, false if the template does not exist.
	 *
	 * @see https://developer.wordpress.org/reference/functions/get_header/
	 */
	public static function header( $name = null, $args = array() )
	{
		get_header( $name, $args );
	}

	/**
	 * Load footer template.
	 *
	 * @param  string $name  The name of the specialised footer.
	 * @param  array  $args   Additional arguments passed to the footer template.
	 * @return void|false    Void on success, false if the template does not exist.
	 *
	 * @see https://developer.wordpress.org/reference/functions/get_header/
	 */
	public static function footer( $name = null, $args = array() )
	{
		get_footer( $name, $args );
	}

    /**
     * The main template file.
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
     *
     * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
     */
    public function index()
    {
        self::header();
        IndexPage::get()->view();
        self::footer();
    }

    /**
     * The sidebar containing the main widget area.
     *
     * @see https://developer.wordpress.org/themes/basics/template-files/
     */
    public function sidebar()
    {
        Sidebar::get()->view();
    }

    /**
     * The template for displaying archive pages.
     *
     * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
     */
    public function archive()
    {
        self::header();
        Archive::get()->view();
        self::footer();
    }

    /**
     * The template for displaying all single posts.
     *
     * @see https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
     */
    public function single()
    {
        self::header();
        Single::get()->view();
        self::footer();
    }

    /**
     * The template for displaying 404 pages (not found).
     *
     * @see https://codex.wordpress.org/Creating_an_Error_404_Page
     */
    public function page_404()
    {
        self::header();
        Page404::get()->view();
        self::footer();
    }

    /**
     * The template for displaying all pages.
     *
     * This is the template that displays all pages by default.
     * Please note that this is the WordPress construct of pages
     * and that other 'pages' on your WordPress site may use a
     * different template.
     *
     * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
     */
    public function page()
    {
        self::header();
        Page::get()->view();
        self::footer();
    }

    /**
     * Brisko Canvas.
     *
     * @return void
     */
    public function canvas_page()
    {
        self::header( 'canvas' );
        CanvasPage::get()->view();
        self::footer( 'canvas' );
    }

    /**
     * Brisko Canvas.
     *
     * @return void
     */
    public function home_page()
    {
        self::header();
        HomePage::get()->view();
        self::footer();
    }

    /**
     * Full Width.
     *
     * @return void
     */
    public function full_width_page()
    {
        self::header();
        FullWidthPage::get()->view();
        self::footer();
    }

    /**
     * The template for displaying search results pages.
     *
     * @see https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
     */
    public function search()
    {
        self::header();
        Search::get()->view();
        self::footer();
    }
}
