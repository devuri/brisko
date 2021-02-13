<?php
/**
 * Template part for displaying Navigation
 *
 * @package brisko
 */

?>
<nav id="site-navigation" class="my-2 my-md-0 mr-md-3 main-navigation ">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<?php esc_html_e( 'Menu', 'brisko' ); ?>
	</button>
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
</nav>
