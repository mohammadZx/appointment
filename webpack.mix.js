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

mix.copy('resources/js/layout/*', 'public/js/layout')
    .copy('resources/css/layout/*', 'public/css/layout')
    .copy('resources/fonts/*', 'public/fonts')
    .copy('resources/images/*', 'public/images')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/user.css', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .sourceMaps();
