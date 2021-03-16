<?php
/**
 * Template part for the head section for blog and single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brisko
 */

?>
<div class="archive-header container-fluid">
	<div class="archive-header-title container">
		<h2><?php do_action( 'brisko_blog_title' ); ?></h2>
		<p><?php do_action( 'brisko_blog_subtitle' ); ?></p>
	</div>
</div>
<main id="primary" class="site-main <?php Brisko\Theme::options()->blog_width(); ?> bg-white">
	<div class="row">
		<div class="<?php print( esc_attr( $args['content_class'] ) ); ?> primary-content">
