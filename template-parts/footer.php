<?php do_action( 'brisko_before_footer' ); ?>
<footer id="colophon" class="site-footer this-site-footer <?php brisko_options()->footer_top_margin(); ?>">
	<?php do_action( 'brisko_footer' ); ?>
	<div class="site-info <?php brisko_options()->footer_width(); ?>">
		<div class="brisko-theme-credit">
			<?php brisko_footer()->footer_credit(); ?>
			<?php do_action( 'brisko_footer_credit' ); ?>
		</div><!-- .brisko-theme-credit -->
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php do_action( 'brisko_after_footer' ); ?>
