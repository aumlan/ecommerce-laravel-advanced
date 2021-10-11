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

mix.sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/template/css/custom.css',
], 'public/css/all.css');

mix.js([
    'resources/js/app.js',
    'public/template/js/app.js',
], 'public/js/all.js');

mix.version();


// "public/template/js/jquery-3.3.1.min.js",
//     "public/template/js/popper.min.js",
//     "public/template/js/bootstrap.min.js",
//     "public/template/js/main.js",
//     "public/template/js/plugins/pace.min.js",
//     "public/template/js/plugins/select2.min.js",
//     "public/template/js/plugins/chart.js",
//     "public/template/js/all.min.js",
//     "public/template/js/plugins/jquery.dataTables.min.js",
//     "public/template/js/plugins/dataTables.bootstrap.min.js",
//     "public/template/js/toastr.min.js",
//     "public/template/js/sweetalert2.min.js",
//     "public/template/js/plugins/bootstrap-datepicker.min.js"
