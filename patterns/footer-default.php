<?php
/**
 * Title: Default Footer
 * Slug: brisko/footer-default
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer with site title and powered by WordPress.
 */
?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--40)">
		<!-- wp:site-title {"level":0} /-->
		<!-- wp:paragraph {"align":"right"} -->
		<p class="has-text-align-right">
		<?php
        printf(
            // Translators: WordPress link.
            esc_html__( 'Powered by %s', 'brisko' ),
            '<a href="' . esc_url( __( 'https://wpbrisko.com', 'brisko' ) ) . '" rel="nofollow">Brisko WordPress Theme</a>'
        );
?>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
