const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/repository/*'
    ], 'public/js/scripts.js')
    .sass('resources/sass/app.scss', 'public/css')
    .extract();