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

mix.js('resources/js/app.js', 'public/js')
    // .js('resources/js/aos.js', 'public/js')
    // .js('resources/js/custom.js', 'public/js')
    // .js('resources/js/jquery.min.js', 'public/js')
    // .js('resources/js/smoothscroll.js', 'public/js')
    // .postCss('resources/css/aos.css', 'public/css')
    // .postCss('resources/css/base_template.css', 'public/css')
    // .postCss('resources/css/font-awesome.min.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
