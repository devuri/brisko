<?php
/**
 * Template part for displaying Navigation.
 */

?>
<div id="navigation" class="align-items-center brisko-navigation">
	<div class="<?php Brisko\Theme::options()->navigation_width(); ?> d-flex flex-column flex-md-row align-items-center">
		<div class="mr-md-auto d-flex flex-column flex-md-row align-items-center">
			<?php if ( has_custom_logo() ) { ?>
				<div id="the-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } ?>
			<div class="site-title">
					<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
					<?php
                        $brisko_description = get_bloginfo( 'description', 'display' );
if ( $brisko_description || is_customize_preview() ) {
    ?>
						<small class="site-description text-muted align-items-center">
							<?php echo esc_html( $brisko_description ); ?>
						</small>
					<?php
} ?>
			</div>
		</div>
			<?php Brisko\Navigation::get()->nav_menu(); ?>
	</div>
</div>
