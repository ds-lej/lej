let mix = require('laravel-mix');

mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('resources/assets/vendor', 'public/assets/vendor');
mix.copyDirectory('resources/assets/themes', 'public/assets/themes');
mix.copyDirectory('resources/assets/fonts/Nunito', 'public/assets/fonts/Nunito');
mix.copyDirectory('node_modules/font-awesome/fonts', 'public/assets/fonts/font-awesome');

mix.setPublicPath('public/assets');

mix.js('resources/assets/js/app-preloader.js', 'app/js')
   .js('resources/assets/js/app.js', 'app/js')
   .sass('resources/assets/sass/app.scss', 'app/css');

mix.js('resources/assets/modules/auth/js/app.js', 'modules/auth/auth.js');

// mix.browserSync({
//     proxy: process.env.MIX_BROWSER_SYNC_PROXY
// });