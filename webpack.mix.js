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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

// notas.text

// Para evitar refrescar el navegador manualmente cada vez que hagamos un cambio es utilizar browserSync
// mix.browserSync('http://localhost:8000/');

// Entonces, para obligar al navegador a volver cargar los archivos se pueden utilizar versiones que únicamente es cambiar el nombre del archivo (no se necesita en desarrollo).
// if (mix.inProduction())
// {
//  mix.version(); // Si observamos el archivo mix-manifest.json observamos que se le agrega un identificador a cada archivo. Este es el nombre que se debe referenciar en nuestro layout. /css/app.css?id=d4f5s56a4df56as
// }
// Se debería realizar continuamente, por eso Laravel nos prove de la función mix que nos mantiene el archivo siempre actualizado {{ mix('css/app.css') }}