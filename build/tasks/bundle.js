
var gulp = require('gulp');
var bundle = require('aurelia-bundler').bundle;

var config = {
    force: true,
    baseURL: '.',                   // baseURL of the application
    configPath: './public/js/config.js',      // config.js file. Must be within `baseURL`
    bundles: {
        "public/js/aurelia": {           // bundle name/path. Must be within `baseURL`. Final path is: `baseURL/dist/app-build.js`.
            includes: [
                '[*.js]',
                '*.html!text',
                '*.css!text',
            ],
            options: {
                inject: true,
                minify: true
            }
        },
        "public": {
            includes: [
                'aurelia-bootstrapper',
                'aurelia-fetch-client',
                'aurelia-router',
                'aurelia-animator-css',
                'github:aurelia/templating-binding',
                'github:aurelia/templating-resources',
                'github:aurelia/templating-router',
                'github:aurelia/loader-default',
                'github:aurelia/history-browser',
                'github:aurelia/logging-console',
                'bootstrap/css/bootstrap.css!text'
            ],
            options: {
                inject: true,
                minify: true
            }
        }
    }
};

gulp.task('bundle', function() {
    return bundle(config);
});