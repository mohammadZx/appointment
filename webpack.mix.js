const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

    .copy('resources/js/layout/*', 'public/js/layout')
    .copy('resources/css/layout/*', 'public/css/layout')

    .copy('resources/js/layout/extensions/*', 'public/js/layout/extensions')
    .copy('resources/css/layout/colors_version/*', 'public/css/layout/colors_version')
    .copy('resources/css/layout/icons/*', 'public/css/layout/icons')
    .copy('resources/fonts/*', 'public/fonts')

    .sourceMaps();
