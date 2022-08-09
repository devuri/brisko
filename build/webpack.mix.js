let mix = require('laravel-mix')

mix.setPublicPath('build').version()

mix.options({ manifest: false })

mix.copy('vendor', 'build/brisko/vendor')
mix.copy('template-parts', 'build/brisko/template-parts')
mix.copy('src', 'build/brisko/src')
mix.copy('assets/dist', 'build/brisko/assets/dist')

mix.copy([
    '404.php',
    'archive.php',
    'comments.php',
    'footer.php',
    'footer-canvas.php',
    'functions.php',
    'header.php',
    'header-canvas.php',
    'index.php',
    'LICENSE',
    'page.php',
    'page-canvas.php',
    'page-full-width.php',
    'page-home.php',
    'readme.txt',
    'screenshot.png',
    'search.php',
    'sidebar.php',
    'single.php',
    'style.css',
    'style-rtl.css'
], 'build/brisko/')
