<?php
/**
 * Template part for the head of blog Archives.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

brisko_header()->archive();

?>
<main id="primary" class="site-main <?php echo esc_attr( brisko_options( 'archive_width' ) ); ?> arch bg-white">
	<div class="row">
		<div class="<?php print esc_attr( $args['content_class'] ); ?> primary-content">
