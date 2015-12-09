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

// Elixir configs
elixir.config.sourcemaps = false;

var paths = {
    'jquery': './bower_components/jquery/',
    'jquery_ui': './bower_components/jquery-ui/',
    'bootstrap': './bower_components/bootstrap-sass/',
    'typeahead': './bower_components/typeahead.js/',
    'handlebars': './bower_components/handlebars/',
    'js': './resources/assets/js/'
}

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/css/app.css');
    mix.scripts([
        paths.jquery + 'dist/jquery.js',
        //paths.jquery_ui + 'jquery-ui.js',
        paths.bootstrap + 'assets/javascripts/bootstrap.js',
        paths.typeahead + 'dist/typeahead.bundle.js',
        paths.handlebars + 'handlebars.js',
        paths.js + 'scripts.js'
    ], 'public/js/app.js');

    mix.version(['public/css/app.css', 'public/js/app.js']);
});
