var elixir = require('laravel-elixir');
require('require-dir')('build/tasks');
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
    mix.sass('app.scss');
    mix.copy('jspm_packages','public/jspm_packages');
    mix.copy('resources/assets/js/aurelia', 'public/js/aurelia');
    mix.scripts([
        '../../../jspm_packages/github/jspm/nodelibs-process@0.1.2.js',
        '../../../jspm_packages/github/jspm/nodelibs-process@0.1.2/index.js',
        '../../../jspm_packages/npm/process@0.11.2.js',
        '../../../jspm_packages/npm/process@0.11.2/browser.js',
        '../../../jspm_packages/npm/aurelia-loader-default@1.0.0-beta.1.1.2.js',
        '../../../jspm_packages/npm/aurelia-loader-default@1.0.0-beta.1.1.2/aurelia-loader-default.js',
        '../../../jspm_packages/npm/aurelia-bootstrapper@1.0.0-beta.1.1.2.js',
        '../../../jspm_packages/npm/aurelia-bootstrapper@1.0.0-beta.1.1.2/aurelia-bootstrapper.js',
        '../../../jspm_packages/npm/aurelia-pal@1.0.0-beta.1.1.1.js'
    ],'public/js/aurelia/framework.aurelia.js');
});
