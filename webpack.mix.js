let mix = require('laravel-mix');

mix.copy('resources/assets/css/theme-classic.css', 'public/css/theme-classic.css');
mix.copy('resources/assets/js/ext-all.js', 'public/js/ext-all.js');
mix.copy('resources/assets/js/theme/theme-classic.js', 'public/js/theme-classic.js');

mix.setPublicPath('public');

mix.js('resources/assets/js/app.js', 'js')
   .sass('resources/assets/sass/app.scss', 'css');

if (mix.inProduction())
    mix.version();

// mix.browserSync({
//     proxy: 'my-domain.dev'
// });