<?php
/**
 * Template part for displaying Header.
 */

?>
<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'brisko' ); ?>
</a>
<?php do_action( 'brisko_before_header' ); ?>
<?php do_action( 'brisko_custom_header' ); ?>
<header id="masthead" class="site-header">
	<?php Brisko\Theme::navigation(); ?>
	<?php Brisko\Theme::header_image(); ?>
</header><!-- #masthead -->
<?php do_action( 'brisko_after_header' ); ?>
<?php if ( is_front_page() && is_home() ) {
    do_action( 'brisko_homepage_header' );
} ?>
