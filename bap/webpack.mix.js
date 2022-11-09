const ImageminPlugin = require('imagemin-webpack-plugin').default
const mix = require('laravel-mix');
const path = require('path');
const global = require('glob');

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
//**************** coreui ********************
// mix.copy(
//     'node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js',
//     'public/vendor/coreui/js'
// );
// mix.copy(
//     'node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js.map',
//     'public/vendor/coreui/js'
// );
//*********images*******************
mix.copy('resources/images/', 'public/assets/images');
module.exports = {
    plugins: [
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i ,
            pngquant: {  quality: '95-100' },
            maxFileSize: 10000, // Only apply this one to files equal to or under 10kb
            jpegtran: { progressive: false }
        })
    ]
}
//************scss**********************
const sassBase = 'resources/sass';
global.sync(path.join('resources/sass/**', '*.scss'), {
    ignore: []
}).map((file) => {
    let destPath = 'public/assets/css/';
    destPath = path.join(destPath, file.replace(sassBase, ''));
    destPath = destPath.replace('.scss', '.css');
    mix.sass(file, destPath).version().sourceMaps();
})



//*********javascript*******************
const jsBase = 'resources/js';
//resource/js/**/*.js
global.sync(path.join('resources/js/**', '*.js'), {
    ignore: []
}).map((file) => {
    let destPath = 'public/assets/js/';
    //replace : /**/*.js
    //path.join: public/js/**/*.js
    destPath = path.join(destPath, file.replace(jsBase, ''));
    mix.js(file, destPath).version().sourceMaps();
})
