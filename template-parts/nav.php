<?php
/**
 * Template part for displaying Navigation
 *
 * @package brisko
 */

?>
<div class="align-items-center brisko-navigation">
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
