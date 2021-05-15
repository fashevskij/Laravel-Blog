const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
//создание сборки с помощью вебпак для стилей
mix.styles([
    //то откуда забираем
    'resources/assets/admin/plugins/fontawesome-free/css/all.css',
    'resources/assets/admin/css/adminlte.css',
    'resources/assets/admin/css/select2.min.css',
], 'public/assets/admin/css/admin.css');//куда положить минифицированные файлы стилей (в один файл)
//создание сборки с помощью вебпак для js файлов
mix.scripts([
    //то откуда абираем
    'resources/assets/admin/plugins/jquery/jquery.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.js',
    'resources/assets/admin/js/adminlte.js',
    'resources/assets/admin/js/select2.full.min.js',
    'resources/assets/admin/js/demo.js'
], 'public/assets/admin/js/admin.js');//куда положить минифицированные файлы js файлов (в один файл)

//копируем папку c одной директории в другую
mix.copy('resources/assets/admin/plugins/fontawesome-free/webfonts','public/assets/admin/webfonts');
mix.copy('resources/assets/admin/img','public/assets/admin/img');


// обычная сборка проэкта
//npm run dev

// минифицирует файлы стоит исп если менять ничего не планируем
//npm run prod
