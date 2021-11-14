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

let assets_path = 'resources/assets';


// Сайт
mix.js(assets_path + '/scripts/app.js', 'public/js')
    .sass(assets_path + '/styles/app.scss', 'public/css')
    .sourceMaps();


// Админка
mix.js(assets_path + '/scripts/admin.js', 'public/js')
    .sass(assets_path + '/styles/admin.scss', 'public/css')
    .sourceMaps();


mix.copyDirectory('node_modules/toastr/build/toastr.min.js', 'public/js')
mix.copyDirectory('node_modules/jquery/dist/jquery.js', 'public/js')
mix.copyDirectory('node_modules/toastr/build/toastr.min.css', 'public/css')


if (mix.inProduction()) {
    mix.version();
}
