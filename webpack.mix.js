const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.webpackConfig(require('./webpack.config'));

mix.setResourceRoot('resources')
    .setPublicPath('resources/public');

mix.copy('node_modules/element-ui/lib/theme-chalk/fonts', 'resources/public/fonts');

mix.js('resources/js/app.js', 'resources/public/js')
    .sass('resources/sass/app.scss', 'resources/public/css')
    .tailwind()
    .version();
