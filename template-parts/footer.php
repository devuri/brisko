<?php brisko()->action( 'brisko_before_footer' ); ?>
<footer id="colophon" class="site-footer this-site-footer <?php Brisko\Theme::options()->footer_top_margin(); ?>">
	<?php brisko_footer(); ?>
	<div align="center" class="site-info container">
		<div class="brisko-theme-credit">
			<?php Brisko\Theme::footer_credit(); ?>
			<?php do_action( 'brisko_footer_credit' ); ?>
		</div><!-- .brisko-theme-credit -->
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<?php brisko()->action( 'brisko_after_footer' ); ?>
