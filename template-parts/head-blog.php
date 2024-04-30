<?php
/**
 * Template part for the head section for blog and single posts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

brisko_header()->archive();

?>
<main id="primary" class="site-main <?php echo esc_attr( brisko_options( 'blog_width' ) ); ?> bg-white">
	<div class="row">
		<div class="<?php print esc_attr( $args['content_class'] ); ?> primary-content">
