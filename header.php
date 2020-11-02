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

<body <?php body_class( 'brisko-font brisko-font-style' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'brisko' ); ?></a>
<?php brisko_before_header(); ?>
	<header id="masthead" class="site-header">
		<div class="align-items-center bg-white brisko-navigation">
			<div class="<?php Brisko\Theme::options()->navigation_width(); ?> d-flex flex-column flex-md-row align-items-center">
				<div class="mr-md-auto d-flex flex-column flex-md-row align-items-center">
					<?php if ( has_custom_logo() ) : ?>
						<div id="the-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif; ?>
					<div class="site-title">
							<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
							<?php
								$brisko_description = get_bloginfo( 'description', 'display' );
								if ( $brisko_description || is_customize_preview() ) :
								?>
								<small class="site-description text-muted align-items-center">
									<?php echo $brisko_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</small>
							<?php endif; ?>
					</div>
				</div>
					<nav id="site-navigation" class="my-2 my-md-0 mr-md-3 main-navigation ">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'brisko' ); ?></button>
					    <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
					</nav>
			</div>
		</div>
	<?php Brisko\Theme::header()->image(); ?>
</header><!-- #masthead -->
<?php brisko_after_header(); ?>
<?php if ( is_front_page() && is_home() ) :
	brisko_homepage_header();
endif; ?>
