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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="container">
	<?php the_header_image_tag(array( 'class' => 'brisko-header-img') ); ?>
</div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'brisko' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding container white-bg">
			<div class="row">
			<div class="logo-header col-sm">
				<?php
				if ( has_custom_logo() ) :
					the_custom_logo();	?>
					<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php 	endif; ?>
			</div><!--logo-header-->
			<div class="description col-sm">
				<?php $brisko_description = get_bloginfo( 'description', 'display' );
				if ( $brisko_description || is_customize_preview() ) :
					?>
					<div class="site-description text-muted">
						<?php echo $brisko_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				<?php endif; ?>
			</div><!--site-description-->
		</div><!-- .row -->
		</div><!-- .site-branding -->
		<div class="brisko-navigation container-fluid">
		<div class="container white-bg">
			<nav id="site-navigation" class="main-navigation open-sans-font">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'brisko' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'container_class' => 'nav-menu',
						'menu_class' => 'nav-menu',
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</div><!-- .brisko-navigation -->
</header><!-- #masthead -->
<?php brisko_after_header(); ?>
