let mix = require('laravel-mix');

mix.copy('resources/assets/js/ext-all.js', 'public/js/ext-all.js');
mix.copy('resources/assets/themes/classic/theme-classic.css', 'public/theme/theme-classic.css');
mix.copy('resources/assets/themes/classic/theme-classic.js', 'public/theme/theme-classic.js');
mix.copyDirectory('resources/assets/themes/classic/images', 'public/theme/images');

mix.setPublicPath('public');

mix.js('resources/assets/js/app.js', 'js')
   .sass('resources/assets/sass/app.scss', 'css');

if (mix.inProduction())
    mix.version();

// mix.browserSync({
//     proxy: 'my-domain.dev'
// });