<?php
/**
 * Template part for displaying Navigation menu.
 */

$navigation = new Brisko\Nav();

?>
<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"> -->
<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-collapse collapse" id="navbarCollapse" style="">
	<nav id="site-navigation" class="my-2 my-md-0 mr-md-3 main-navigation">
		<?php echo $navigation->nav_menu(); ?>
	</nav>
</div>
