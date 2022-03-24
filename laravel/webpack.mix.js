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

// mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
// require('tailwindcss'),
//     require('autoprefixer'),
// ]);

// mix.js(['resources/js/js/jquery.js',
//     'resources/js/js/popper.min.js',
//     'resources/js/js/bootstrap.min.min.js',
//     'resources/js/js/jquery.mCustomScrollbar.concat.min.js',
//     'resources/js/js/jquery.fancybox.js',
//     'resources/js/js/appear.js',
//     'resources/js/js/parallax.min.js',
//     'resources/js/js/tilt.jquery.min.js',
//     'resources/js/js/jquery.paroller.min.js',
//     'resources/js/js/owl.js',
//     'resources/js/js/nav-tool.js',
//     'resources/js/js/jquery-ui.js',
//     'resources/js/js/script.js'], 'public/js/app.js');
mix.styles([
    'resources/css/css/*.css'
], 'resources/css/app.css');
mix.postCss('resources/css/app.css', 'public/css/app.css').options({
    processCssUrls: false,
    postCss: [require('autoprefixer')],
})
