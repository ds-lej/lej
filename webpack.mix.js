let mix = require('laravel-mix');

mix.copy('resources/assets/js/ext-all.js', 'public/assets/vendor/extjs/ext-all.js');
mix.copy('resources/assets/themes/classic/theme-classic.css', 'public/assets/theme/css/theme-classic.css');
mix.copy('resources/assets/themes/classic/theme-classic.js', 'public/assets/theme/js/theme-classic.js');
mix.copyDirectory('resources/assets/themes/classic/images', 'public/assets/theme/css/images');

mix.setPublicPath('public/assets');

mix.js('resources/assets/js/app.js', 'theme/js')
   .sass('resources/assets/sass/app.scss', 'theme/css');

if (mix.inProduction())
    mix.version();

// mix.browserSync({
//     proxy: 'my-domain.dev'
// });