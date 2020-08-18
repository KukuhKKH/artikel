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
    .sass('resources/sass/app.scss', 'public/css');

// Dashboard

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/animate.css',
    'public/vendor/toastr/toastr.min.css',
    'public/css/style.css'
], 'public/css/dashboard.css')

mix.scripts([
    'public/js/jquery-3.1.1.min.js',
    'public/js/popper.min.js',
    'public/js/bootstrap.min.js',
    'public/vendor/metisMenu/jquery.metisMenu.js',
    'public/vendor/slimscroll/jquery.slimscroll.min.js',
    'public/js/inspinia.js',
    'public/vendor/toastr/toastr.min.js',
    'public/vendor/pace/pace.min.js'
], 'public/js/dashboard.js')

// Comming Soon

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/icon.min.css',
    'public/css/coming.min.css'
], 'public/css/soon.css')

mix.scripts([
    'public/js/vendor.min.js',
    'public/vendor/countdown/jquery.countdown.min.js',
    'public/js/comming-soon.min.js',
    'public/js/coming.min.js'
], 'public/js/soon.js')