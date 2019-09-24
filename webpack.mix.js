const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.webpackConfig(require('./webpack.config'));

mix.setResourceRoot('resources')
    .setPublicPath('resources/assets');

mix.copy('node_modules/element-ui/lib/theme-chalk/fonts', 'resources/assets/fonts');

mix.js('resources/js/app.js', 'resources/assets')
    .sass('resources/sass/app.scss', 'resources/assets')
    .tailwind()
    .version();
