const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir.config.sourcemaps = false;

elixir(function(mix)
{
    /**
     *  Css
     *  ---------------------------------
     */

    mix.styles([
        './public/css/vendor/*.css',
        './public/css/app.css'
    ], './public/css/app.min.css');


    /**
     *  Scripts
     *  ----------------------------------
     */

    // mix.scripts([
    //     './public/vendors/*.js',
    //     './public/js/app.js',
    //     './public/js/angular/*'
    // ], './public/dist/app.min.js');


    /**
     *  Versioning
     *  -----------------------------------
     */

    mix.version([
        './public/css/app.min.css',
        // './public/dist/app-rtl.min.css',
        // './public/dist/app.min.js'
    ]);
});
