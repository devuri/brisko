<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brisko
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('brisko-font brisko-font-style'); ?>>
<?php wp_body_open(); ?>

<div class="container">
	<?php the_header_image_tag(array( 'class' => 'brisko-header-img') ); ?>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'brisko' ); ?></a>
<?php brisko_before_header(); ?>
	<header id="masthead" class="site-header">

		<div class="site-branding bg-white">
			<div class="container">
			<div class="logo-header d-flex flex-column flex-md-row align-items-center bg-white">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();	?>
					<?php endif; ?>
					<h1 class="site-title pt-3 mr-md-auto">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<?php $brisko_description = get_bloginfo( 'description', 'display' );
				if ( $brisko_description || is_customize_preview() ) : ?>
					<span class="site-description text-muted">
						<?php echo $brisko_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</span>
				<?php endif; ?>
			</div><!--logo-header-->
		</div><!-- .container-->
		</div><!-- .site-branding -->

		<div class="brisko-navigation container-fluid">
		<div class="container bg-white">
			<nav id="site-navigation" class="main-navigation secondary-font">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'brisko' ); ?></button>
				<?php wp_nav_menu(array('theme_location' => 'menu-1',) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</div><!-- .brisko-navigation -->

</header><!-- #masthead -->
<?php brisko_after_header(); ?>
<?php if ( is_front_page() && is_home() ) :
	brisko_homepage_header();
endif; ?>
