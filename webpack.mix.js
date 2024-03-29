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

mix.sass('resources/sass/app.scss', 'public/css')
.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
.options({ processCssUrls: false })
mix.js('resources/js/front.js', 'public/js'),
mix.js('resources/js/admin.js', 'public/js'),
mix.js('resources/js/food.js', 'public/js')
