<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div class="post-article">
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title archive-title entry-meta"><?php esc_html_e( 'Nothing Found', 'brisko' ); ?></h1>
	</header><!-- .page-header -->
		<?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) {
            printf(
                '<p>' . wp_kses(
                    // translators: 1: link to WP admin new post page.
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'brisko' ),
                    [
                        'a' => [
                            'href' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );
        } elseif ( is_search() ) {
            ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'brisko' ); ?></p>
			<?php
            get_search_form();
        } else {
            ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'brisko' ); ?></p>
			<?php
            get_search_form();
        }
?>
</div><!-- post-article -->
