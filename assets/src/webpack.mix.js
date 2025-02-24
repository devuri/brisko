let mix = require('laravel-mix')

mix.setPublicPath('assets').version()

mix.options({ manifest: false })

// css assets.
let assets = 'assets/src/css/'

// js assets.
let js_assets = 'assets/src/js/'

// dist dir.
let dist = 'assets/dist/'

// core + grid.
mix.combine(
	[
		assets + 'core.css',
		'assets/src/bootstrap/css/bootstrap-grid.css'
	],
	dist + 'css/core.min.css'
);

// brisko.
mix.css(assets + 'brisko.css', dist + 'css/brisko.min.css')
	.css(assets + 'custom-styles.css', dist + 'css/custom-styles.min.css')
	.css(assets + 'toggle-buttons.css', dist + 'css/toggle-buttons.min.css')
	.css(assets + 'underscores.css', dist + 'css/underscores.min.css')
	.css(assets + 'normalize.css', dist + 'css/normalize.min.css')

// JS.
mix.js(js_assets + 'customizer.js', dist + 'js/customizer.min.js')
	.js(js_assets + 'navigation.js', dist + 'js/navigation.min.js')
	.js(js_assets + 'smooth-scroll.js', dist + 'js/smooth-scroll.min.js')
	.js(js_assets + 'toggle-button-control.js', dist + 'js/toggle-button-control.min.js')

// milligram.
mix.copy('assets/src/milligram/', 'assets/dist/milligram/');

// fonts
mix.copy('assets/src/fonts/', 'assets/fonts/');

// uikit.
mix.copy('assets/src/uikit/', 'assets/dist/uikit/');

// bootstrap.
mix.copy('assets/src/bootstrap/', 'assets/dist/bootstrap/');
