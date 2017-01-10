var gulp = require('gulp');

var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var uglifycss = require('gulp-uglifycss');

var basejs = [
	'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
	'src/js/default.js',
];

var masksjs = [
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
    'node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js',
    'node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js',
    'node_modules/jquery.maskedinput/src/jquery.maskedinput.js',
    'node_modules/jquery-maskmoney/dist/jquery.maskMoney.js',
    'node_modules/select2/dist/js/select2.js',
    'node_modules/select2/dist/js/i18n/pt-BR.js',
    'node_modules/multiselect/js/jquery.multi-select.js',
    'src/js/masks-autocomplete.js',
    'src/js/masks-color.js',
    'src/js/masks-default.js',
    'src/js/masks-multiselect.js',
    'src/js/masks-numbers.js',
    'src/js/masks-tooltip.js'
];

var bootstraptablejs = [
    'node_modules/bootstrap-table/dist/bootstrap-table.js',
    'node_modules/bootstrap-table/src/locale/bootstrap-table-pt-BR.js',
    'src/js/bootstrap.table.formatters.js',
];

var basecss = [
	'node_modules/bootstrap/dist/css/bootstrap.css',
	'src/css/default.css'
]

var maskscss = [
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
    'node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/select2-bootstrap-theme/dist/select2-bootstrap.css',
    'node_modules/multiselect/css/multi-select.css'
]

var bootstraptablecss = [    
    'node_modules/bootstrap-table/dist/bootstrap-table.css'
];

var fonts = [
    'node_modules/bootstrap/dist/fonts/*',
    'node_modules/sb-admin-2/vendor/font-awesome/fonts/*'
];

gulp.task('uglifybasejs', function () {
    gulp.src(basejs)
        .pipe(concat('ocontainer-base.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
});

gulp.task('uglifymasksjs', function () {
    gulp.src(masksjs)
        .pipe(concat('ocontainer-masks.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
});

gulp.task('uglifybootstraptablejs', function () {
    gulp.src(basejs)
        .pipe(concat('ocontainer-table.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
});

gulp.task('uglifybasecss', function () {
    gulp.src(basecss)
        .pipe(concat('ocontainer-base.css'))
        .pipe(uglifycss())
        .pipe(gulp.dest('dist/css'))
});

gulp.task('uglifymaskscss', function () {
    gulp.src(maskscss)
        .pipe(concat('ocontainer-masks.css'))
        .pipe(uglifycss())
        .pipe(gulp.dest('dist/css'))
});

gulp.task('uglifybootstraptablecss', function () {
    gulp.src(bootstraptablecss)
        .pipe(concat('ocontainer-table.css'))
        .pipe(uglifycss())
        .pipe(gulp.dest('dist/css'))
});

gulp.task('copyfonts', function() {
    gulp.src(fonts)
        .pipe(gulp.dest('dist/fonts'))
});

gulp.task('copyimages', function() {
    gulp.src('node_modules/bootstrap-colorpicker/dist/img/bootstrap-colorpicker/*.png')
        .pipe(gulp.dest('dist/img/bootstrap-colorpicker/'));

    gulp.src('src/img/*')
        .pipe(gulp.dest('dist/img/'));
});

gulp.task('default', ['uglifybasejs', 'uglifymasksjs', 'uglifybootstraptablejs', 'uglifybasecss', 'uglifymaskscss', 'uglifybootstraptablecss', 'copyfonts','copyimages']);
