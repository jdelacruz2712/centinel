let mix = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/centinel/css/app.css',
    'resources/assets/centinel/css/blocks.css',
    'resources/assets/centinel/plugins/style-switcher.css',
    'resources/assets/centinel/css/style.css'
], 'public/css/global.css').version();

mix.styles([
    'resources/assets/centinel/plugins/animate.css',
    'resources/assets/centinel/plugins/line-icons/line-icons.css',
    'resources/assets/centinel/plugins/font-awesome/css/font-awesome.min.css',
    'resources/assets/centinel/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
    'resources/assets/centinel/plugins/img-hover/imagehover.css',
    'node_modules/daterangepicker/daterangepicker.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css'
], 'public/css/implement.css').version();

mix.styles([
    'resources/assets/centinel/css/pages/page_log_reg_v2.css',
    'resources/assets/centinel/css/custom.css'
], 'public/css/login.css').version();

mix.styles([
    'resources/assets/centinel/css/theme-colors/default.css',
    'resources/assets/centinel/css/theme-skins/dark.css',
    'resources/assets/centinel/css/custom.css',
    'resources/assets/centinel/css/headers/header-default.css',
    'resources/assets/centinel/css/footers/footer-v1.css',
    'resources/assets/centinel/css/pages/profile.css'
], 'public/css/centinel.css').version();

mix.js([
    'resources/assets/js/app.js'
], 'public/js/app.js').version();

mix.babel([
    'resources/assets/centinel/js/custom.js'
], 'public/js/centinel.js').version();

mix.babel([
    'resources/assets/centinel/js/app.js',
    'resources/assets/centinel/js/plugins/datepicker.js',
    'resources/assets/centinel/plugins/backstretch/jquery.backstretch.min.js',
    'resources/assets/centinel/plugins/counter/waypoints.min.js',
    'resources/assets/centinel/plugins/counter/jquery.counterup.min.js',
    'resources/assets/centinel/plugins/smoothScroll.js',
    'resources/assets/centinel/plugins/back-to-top.js',
    'resources/assets/centinel/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js',
    'resources/assets/centinel/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js',
    'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
    'resources/assets/centinel/js/routes.js',
], 'public/js/implement.js').version();

mix.copy('resources/assets/favicon.ico', 'public/favicon.ico');
mix.copy('resources/centinel/.htaccess', 'public/.htaccess');
mix.copy('resources/centinel/index.php', 'public/index.php');

mix.copyDirectory([
    'resources/assets/centinel/plugins/line-icons/fonts'
],'public/fonts');

mix.copyDirectory([
    'resources/assets/img'
],'public/assets/img');