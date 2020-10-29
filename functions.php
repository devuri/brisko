<?php
/**
 * brisko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brisko
 */

	/**
	 * release version
	 */
	if ( ! defined( 'BRISKO_VERSION' ) ) {
	 	define( 'BRISKO_VERSION', '0.5.6' );
	}

	/**
	 * Lets Define Some Constants
	 */
	if ( ! defined( 'BRISKO_THEME_DIR' ) ) {
	define( 'BRISKO_THEME_DIR', trailingslashit( get_template_directory() ) );
	}

	/**
	 * Load some helpers
	 */
	require_once BRISKO_THEME_DIR . 'inc/core/actions.php';

	/**
	 * Get Brisko theme option.
	 *
	 * Retrieves brisko theme option value based on the option key
	 * Returns false if the option does not exist.
	 *
	 * @param string $key .
	 * @return bool      .
	 */
	function brisko_theme_mod( $key = 'featured_image' ) {

		$brisko_options = get_option( 'brisko_options', false );
		if ( $brisko_options === false ) {
			return false;
		}

		if ( ! array_key_exists( $key, $brisko_options ) ) {
			return false;
		}
		return $brisko_options[ $key ];
	}

/**
 * Theme Setup
 */
if ( ! function_exists( 'brisko_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brisko_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'brisko' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'brisko' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'brisko_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'brisko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brisko_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'brisko_content_width', 640 );
}
add_action( 'after_setup_theme', 'brisko_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brisko_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'brisko' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'brisko' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'brisko_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function brisko_scripts() {
	wp_enqueue_style( 'brisko-theme-style', get_stylesheet_uri(), array( 'underscores', 'bootstrap' ), BRISKO_VERSION );
	wp_style_add_data( 'brisko-style', 'rtl', 'replace' );

	/**
	 * Bootstrap
	 */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), BRISKO_VERSION );
	wp_enqueue_style( 'underscores', get_template_directory_uri() . '/css/underscores.css', array(), BRISKO_VERSION );

	wp_enqueue_script( 'brisko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), BRISKO_VERSION, true );
	wp_enqueue_script( 'brisko-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), BRISKO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brisko_scripts' );


/**
 * Custom Theme styles
 */
add_action( 'wp_enqueue_scripts', function() {

	// Get the theme setting.
	if ( brisko_theme_mod( 'link_color' ) ) {
		$color = brisko_theme_mod( 'link_color' );
	} else {
		$color  = '#E4584B';
	}

	$bttns  = 'button, input[type="button"], input[type="reset"], input[type="submit"]';
	$links  = "body a{color: {$color};}body a:hover{color: {$color};}";
	$navs   = "nav.main-navigation a:hover {color: {$color};background-color: #F8F9FA;}";
	$bttn_color = "{$bttns} {display: inline-block;color: #fff;background-color: {$color}; border-color: {$color}";
	$custom_styles = $links . $navs . $bttn_color;
		wp_add_inline_style( 'brisko-theme-style', $custom_styles );
	}
);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
