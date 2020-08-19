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

// Frontend

mix.styles([
    'public/css/front/animate.min.css',
    'public/css/front/bootstrap.min.css',
    'public/css/front/owl.carousel.min.css',
    'public/css/front/slicknav.css',
    'public/css/front/fontawesome-all.min.css',
    'public/css/front/magnific-popup.css',
    'public/css/front/fontawesome-all.min.css',
    'public/css/front/themify-icons.css',
    'public/css/front/slick.css',
    'public/css/front/nice-select.css',
    'public/css/front/style.css',
    'public/css/front/responsive.css'
], 'public/css/frontend.css')

mix.scripts([
    'public/js/front/modernizr-3.5.0.min.js',
    'public/js/front/jquery-1.12.4.min.js',
    'public/js/front/popper.min.js',
    'public/js/front/bootstrap.min.js',
    'public/js/front/jquery.slicknav.min.js',
    'public/js/front/owl.carousel.min.js',
    'public/js/front/slick.min.js',
    'public/js/front/wow.min.js',
    'public/js/front/animated.headline.js',
    'public/js/front/jquery.nice-select.min.js',
    'public/js/front/jquery.sticky.js',
    'public/js/front/jquery.magnific-popup.js',
    'public/js/front/contact.js',
    'public/js/front/jquery.form.js',
    'public/js/front/jquery.validate.min.js',
    'public/js/front/mail-script.js',
    'public/js/front/jquery.ajaxchimp.min.js',
    'public/js/front/plugins.js',
    'public/js/front/main.js'
], 'public/js/frontend.js')