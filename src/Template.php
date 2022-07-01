<?php

namespace Brisko;

use Brisko\Traits\Singleton;
use Brisko\View\IndexPage;
use Brisko\View\Sidebar;
use Brisko\View\Archive;
use Brisko\View\Single;
use Brisko\View\Page404;
use Brisko\View\Page;
use Brisko\View\FullWidthPage;
use Brisko\View\HomePage;
use Brisko\View\CanvasPage;
use Brisko\View\Search;

/**
 * The main Template class.
 *
 * We will use this as the entry point
 * to instantiate and access the views.
 *
 * @package brisko
 */
final class Template
{

	use Singleton;

	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package brisko
	 */
	public function index() {
		static::build('index');
	}

	/**
	 * The sidebar containing the main widget area
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package brisko
	 */
	public function sidebar() {
		Sidebar::get()->view();
	}

	/**
	 * The template for displaying archive pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package brisko
	 */
	public function archive() {
		static::build('archive');
	}

	/**
	 * The template for displaying all single posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	 *
	 * @package brisko
	 */
	public function single() {
		static::build('single');
	}

	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
	 *
	 * @package brisko
	 */
	public function page_404() {
		static::build('404');
	}

	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package brisko
	 */
	public function page() {
		static::build('page');
	}

	/**
	 * Brisko Canvas
	 *
	 * @return void
	 */
	public function canvas_page() {
		static::build('canvas');
	}

	/**
	 * Brisko Canvas
	 *
	 * @return void
	 */
	public function home_page() {
		static::build('home');
	}

	/**
	 * Full Width
	 *
	 * @return void
	 */
	public function full_width_page() {
		static::build('full-width');
	}

	/**
	 * The template for displaying search results pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
	 *
	 * @package brisko
	 */
	public function search() {
		static::build('search');
	}

	/**
	 * Load template view from Brisko\View.
	 *
	 * @param  string $template template item to load.
	 *
	 * @return null|object Brisko\View
	 */
	protected static function load( string $template ){
		$templates = array(
			'index' => IndexPage::get(),
			'archive' => Archive::get(),
			'single' => Single::get(),
			'404' => Page404::get(),
			'page' => Page::get(),
			'canvas' => CanvasPage::get(),
			'home' => HomePage::get(),
			'full-width' => FullWidthPage::get(),
			'search' => Search::get()
		);

		return $templates[$template] ?? null;
	}

	/**
	 * Build the page item.
	 *
	 * @param  string $page the page type
	 * @return void
	 */
	protected static function build( string $page )
	{
		// template view is missing.
		if (! static::load($page)) {
			get_header();
			esc_html_e('theme template view is missing', 'brisko');
			get_footer();
		}

		// canvas page.
		if ( 'canvas' === $page) {
			get_header( 'canvas' );
			static::load($page)->view();
			get_footer( 'canvas' );
		}

		// load template.
		get_header();
		static::load($page)->view();
		get_footer();
	}

}
