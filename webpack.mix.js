const mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.setResourceRoot('resources')
    .setPublicPath('assets');

// mix.copy('node_modules/line-awesome/fonts', 'public/webfonts');

mix.js('resources/js/app.js', 'assets')
    .sass('resources/sass/app.scss', 'assets')
    .tailwind();
