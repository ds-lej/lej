let mix = require('laravel-mix');

mix.copyDirectory('resources/assets/vendor', 'public/assets/vendor');
mix.copyDirectory('resources/assets/themes', 'public/assets/themes');

mix.setPublicPath('public/assets');

mix.js('resources/assets/js/app.js', 'app/js')
   .sass('resources/assets/sass/app.scss', 'app/css');

// mix.browserSync({
//     proxy: 'my-domain.dev'
// });