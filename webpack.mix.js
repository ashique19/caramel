const { mix } = require('laravel-mix');

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

mix.js([
            'resources/assets/js/custom-jquery-plugins.js',
            'resources/assets/js/front.js'
            
       ], 'public/js/front.js')
   
   .js([
            'resources/assets/js/custom-jquery-plugins.js',
            'resources/assets/js/calendar7.js',
            'resources/assets/js/cart.js',
            'resources/assets/js/front.js',
            'resources/assets/js/back.js'
            
       ], 'public/js/back.js');


mix.sass('resources/assets/sass/front.sass', 'public/css/front.css');

mix.sass('resources/assets/sass/back.sass', 'public/css/back.css');
