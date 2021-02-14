<?php
/**
 * Template part for displaying Header
 *
 * @package brisko
 */

?>
<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'brisko' ); ?>
</a>
<?php brisko_before_header(); ?>
<?php brisko_custom_header(); ?>
<header id="masthead" class="site-header">
	<?php Brisko\Theme::navigation(); ?>
	<?php Brisko\Theme::header_image(); ?>
</header><!-- #masthead -->
<?php brisko_after_header(); ?>
<?php if ( is_front_page() && is_home() ) :
	brisko_homepage_header();
endif; ?>
