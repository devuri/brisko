<?php

use Brisko\Footer;
use Brisko\Navigation;
use Brisko\Options;
use Brisko\SiteHeader;
use Brisko\Thumbnail;

if ( ! \function_exists( 'brisko' ) ) {
    /**
     * Get the Brisko Theme.
     *
     * Helper function to get the Bisko Theme Object.
     *
     * @return Brisko
     */
    function brisko()
    {
        static $_brisko = null;

        if ( \is_null( $_brisko ) ) {
            $_brisko = new Brisko\Theme();
        }

        return $_brisko;
    }
}

/*
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! \function_exists( 'brisko_posted_on' ) ) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function brisko_posted_on()
    {
        if ( ! get_theme_mod( 'display_post_date' ) ) {
            return null;
        }

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = \sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = \sprintf(
            // translators: %s: post date.
            esc_html_x( 'Posted on %s by', 'post date', 'brisko' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        edit_post_link(
            \sprintf(
                wp_kses(
                    // translators: %s: Name of current post. Only visible to screen readers
                    __( ' Edit <span class=" screen-reader-text"> %s </span>', 'brisko' ),
                    [
                        'span' => [
                            'class' => [],
                        ],
                    ]
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );

        echo '<span class="posted-on">' . wp_kses_post( $posted_on ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if ( ! \function_exists( 'brisko_posted_by' ) ) {
    /**
     * Prints HTML with meta information for the current author.
     */
    function brisko_posted_by()
    {
        if ( ! get_theme_mod( 'display_post_author' ) ) {
            return null;
        }

        $byline = \sprintf(
            // translators: %s: post author.
            esc_html_x( '%s', 'post author', 'brisko' ), // phpcs:ignore
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo get_avatar( get_the_author_meta( 'ID' ), 32 );
        echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if ( ! \function_exists( 'brisko_entry_footer' ) ) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function brisko_entry_footer()
    {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            $categories_list         = get_the_category_list( ' ' );
            $display_post_categories = get_theme_mod( 'display_post_categories' );
            if ( $categories_list && $display_post_categories ) {
                // translators: 1: list of categories.
                printf( '<div class="cat-links entry-meta %2$s">' . esc_html__( 'Posted in %1$s', 'brisko' ) . '</div>', $categories_list, esc_attr( brisko_options( 'display_post_categories' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            do_action( 'brisko_before_tags' );

            // translators: used between list items, there is a space after the comma
            $tags_list = get_the_tag_list( ' ' );
            if ( $tags_list ) {
                // translators: 1: list of tags.
                printf( '<br/><span class="tags-links %2$s">' . esc_html__( 'Tags: %1$s ', 'brisko' ) . '</span>', $tags_list, esc_attr( brisko_options( 'display_tags' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                \sprintf(
                    wp_kses(
                        // translators: %s: post title
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'brisko' ),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
            echo '</span>';
        }
    }
}

/**
 * Outputs the entry meta information for posts.
 *
 * This function displays the post date and author, if enabled in the theme customizer.
 * If both are disabled, it triggers the 'brisko_entry_meta' action and returns null.
 *
 * @return null|void Returns null if both post date and author are disabled.
 */
function brisko_entry_meta()
{
    $display_author = get_theme_mod( 'display_post_author' );
    $display_date   = get_theme_mod( 'display_post_date' );

    if ( ! $display_author && ! $display_date ) {
        do_action( 'brisko_entry_meta' );

        return null;
    }
    ?>
    <div class="entry-meta">
        <?php brisko_posted_on(); ?> <?php brisko_posted_by(); ?>
        <?php do_action( 'brisko_entry_meta' ); ?>
    </div>
    <?php
}


/**
 * Generates inline CSS for entry content based on theme settings.
 *
 * This function checks whether the display of the post author or post date
 * is enabled in the theme customizer. If either is disabled, it returns
 * a style attribute to unset margin, otherwise returns null.
 *
 * @return null|string Inline CSS if needed, or null if both options are enabled.
 */
function brisko_entry_content_css()
{
    $display_author = get_theme_mod( 'display_post_author' );
    $display_date   = get_theme_mod( 'display_post_date' );

    if ( $display_author || $display_date ) {
        return null;
    }

    return 'style="margin: unset;"';
}

/**
 * Post Navigation.
 *
 * @see https://wordpress.org/plugins/wp-pagenavi/
 */
function brisko_posts_navigation()
{
    if ( \function_exists( 'wp_pagenavi' ) ) {
        wp_pagenavi();

        return;
    }

    the_posts_navigation();
}

/**
 * Check if PHP 5.6.
 */
function brisko_is_php5_6()
{
    if ( '5.6.39' === PHP_VERSION ) {
        return true;
    }

    return false;
}

/**
 * Get the sidebar.
 *
 * @return void
 */
function brisko_sidebar()
{
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        ?>
	   <aside id="secondary" class="widget-area">
	   <?php
        do_action( 'brisko_before_sidebar' );
        dynamic_sidebar( 'sidebar-1' );
        do_action( 'brisko_after_sidebar' ); ?>
	   </aside><!-- #secondary -->
	   <?php
    }
}

/**
 * Head section.
 *
 * @param null|string $header_type
 *
 * @return void
 */
function brisko_layout_head( $header_type = null )
{
    // check if sidebar or not .
    if ( get_theme_mod( 'disable_sidebar' ) ) {
        $display_col = sanitize_html_class( 'col-md' );
    } else {
        $display_col = sanitize_html_class( 'col-md-8' );
    }
    $args = [ 'content_class' => $display_col ];

    do_action( 'brisko_layout_header', get_the_ID() );

    if ( 'page' === $header_type ) {
        do_action( 'brisko_page_header' );

        ?>
		<main id="primary" class="site-main <?php echo esc_attr( brisko_options( 'page_width' ) ); ?> bg-white">
		<?php
    } elseif ( 'full-width' === $header_type ) {
        do_action( 'brisko_page_header' );

        ?>
		<main id="primary" class="full-width-template bg-white">
		<?php
    } elseif ( 'canvas' === $header_type ) {
        do_action( 'brisko_page_header' );

        ?>
		<main id="primary" class="full-width-template bg-white">
		<?php
    } elseif ( 'archive' === $header_type ) {
        get_template_part( 'template-parts/head', 'archive', $args );
    } else {
        get_template_part( 'template-parts/head', 'blog', $args );
    }
}

/**
 * Get the sidebar.
 */
function brisko_layout_sidebar()
{
    if ( 1 === get_theme_mod( 'disable_sidebar', false ) ) {
        return true;
    }
    get_template_part( 'template-parts/sidebar' );
}


/**
 * Footer section.
 *
 * @param null|string $footer_type
 *
 * @return void
 */
function brisko_layout_footer( $footer_type = null )
{
    if ( 'page' === $footer_type ) {
        ?>
		</main><!-- #main -->
		<?php
        do_action( 'brisko_page_footer' );
    } else {
        ?>
		</div><!-- col 8 -->
				<?php brisko_layout_sidebar(); ?>
			</div><!-- row -->
		</main><!-- #main -->
		<?php
    }
}

/**
 * Display content only.
 *
 * pure content will bypass `the_content` and use `get_the_content`
 * works better for pure content management and will not break html.
 *
 * note: filters on `the_content` will not work.
 */
function brisko_layout_content()
{
    if ( get_theme_mod( 'enable_pure_content', false ) ) {
        echo get_the_content( null, false ); // @codingStandardsIgnoreLine.
    } else {
        the_content();
    }
}

/**
 * Displays an optional post excerpt.
 */
function brisko_excerpt()
{
    if ( false === get_theme_mod( 'blog_excerpt', true ) ) {
        return false;
    }
    the_excerpt();
}

/**
 * Theme Options.
 *
 * @param string $theme_mod .
 *
 * @return Options .
 */
function brisko_options( string $theme_mod )
{
    return Options::init()->get( $theme_mod );
}

/**
 * Displays an optional post thumbnail.
 */
function brisko_post_thumbnail()
{
    Thumbnail::get()->post_thumbnail();
}

/**
 * Footer.
 *
 * @return Footer
 */
function brisko_footer()
{
    return Footer::get();
}

/**
 * Theme Navigation.
 *
 * @return Navigation .
 */
function brisko_navigation()
{
    return Navigation::get()->navigation();
}

/**
 * Theme Header.
 *
 * @return SiteHeader .
 */
function brisko_header()
{
    return SiteHeader::get();
}
