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

mix.
    styles([
        'resources/views/components/css/style.css'
    ], 'public/css/style.css')


    .scripts([
        'resources/views/components/js/main.js'
    ], 'public/js/main.js')

    .version();
