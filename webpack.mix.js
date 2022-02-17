const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
//
// mix.scripts([
//     'public/js/admin.js',
//     'public/js/dashboard.js'
// ], 'public/js/all.js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.styles([
    'resources/css/main.css',
    'resources/css/show-gift.css',
    'resources/css/custom.css',
], 'public/css/app.css');
