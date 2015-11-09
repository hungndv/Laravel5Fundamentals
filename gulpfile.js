var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss', 'resources/css');

    //mix.less('app.less');

    // default directory is resources\assets\css\
    mix.styles([
        'normalize.css',
        'libs/bootstrap.min.css',
        'libs/select2.min.css',
        'app.css'
    ]);

    // default directory is resources\assets\js\
    mix.scripts([
        'libs/modernizr-2.8.3.min.js',
        'libs/jquery-1.11.3.min.js',
        'libs/bootstrap.min.js',
        'libs/select2.min.js',
        'plugins.js',
        'app.js'
    ]);

});
