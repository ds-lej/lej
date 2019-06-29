const mix = require('laravel-mix');

mix.setPublicPath('../../public/assets');

mix.js(__dirname + '/Resources/assets-dev/js/app.js', 'modules/demo/demo.js')
   .sass( __dirname + '/Resources/assets-dev/sass/app.scss', 'modules/demo/demo.css');

if (mix.inProduction())
{
    mix.copy('../../public/assets/modules/demo/demo.js', 'Resources/assets/demo.js');
    mix.copy('../../public/assets/modules/demo/demo.css', 'Resources/assets/demo.css');
}