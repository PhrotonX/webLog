const mix = require('laravel-mix');

mix.css('resources/css/style.css', 'public/css/app.css')
    .scripts([
        'resources/js/src/forms.js',
        'resources/js/src/months.js',
        'resources/js/src/picture.js',
        'resources/js/src/script.js',
        'resources/js/src/string.js',
        'resources/js/src/view.js',
        'resources/js/src/user/edit.js',
        'resources/js/src/user/forms.js',
    ], 'public/js/app.js')
    .scripts([
        'resources/js/lib/jquery-3.7.1.js'
    ], 'public/js/vendor.js')
    .version();