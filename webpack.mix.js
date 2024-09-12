const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .css('resources/css/app.css', 'public/css')  // Compiling plain CSS
   .sourceMaps();  // Optional: enables source maps for easier debugging in the browser
