var gulp = require("gulp"),
    connect = require("gulp-connect"),
    opn = require("opn"),
    sass = require("gulp-sass"),
    jade = require("gulp-jade");

var gulpFilter = require('gulp-filter'),
    rename = require('gulp-rename'),
    rimraf = require('rimraf'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    cssmin = require('gulp-cssmin'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    watch = require('gulp-watch'),
    rigger = require('gulp-rigger'),
    sourcemaps = require('gulp-sourcemaps');

var dest_path = 'public';
function log(error) {
    console.log([
        '',
        "----------ERROR MESSAGE START----------",
        ("[" + error.name + " in " + error.plugin + "]"),
        error.message,
        "----------ERROR MESSAGE END----------",
        ''
    ].join('\n'));
    this.end();
}
// Работа с jade
gulp.task('jade', function() {
    gulp.src('app/templates/*.jade')
        .pipe(jade({pretty: true}))
        .on('error', log)
        .pipe(gulp.dest(dest_path + '/'))
        .pipe(connect.reload());
});

var autoprefixerOptions = {
    browsers: ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']
};
// Работа с Sass
gulp.task('sass', function() {
    gulp.src('app/sass/*.scss')
        .pipe( sass().on( 'error', function( error )
            {
                console.log( error );
            } )
        )
        .pipe(sass({
            // sourceComments: 'map'
        }))
        //        .pipe(prefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(cssmin())
        .pipe(gulp.dest( dest_path ))
        .pipe(connect.reload());
});

// Работа с js
gulp.task('js', function() {
    gulp.src('./app/js/*.js')
        .pipe(rigger())
        .pipe(uglify())
        .pipe(gulp.dest( dest_path + '/js/'))
        .pipe(connect.reload());
});

// Сборка IMG
gulp.task('image', function () {
    gulp.src('./app/images/**/*.*') //Выберем наши картинки
        .pipe(imagemin({ //Сожмем их
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(dest_path + '/images/')) //И бросим в public/images/
        .pipe(connect.reload());
});

// Сборка Fonts
gulp.task('fonts', function () {
    gulp.src('./app/fonts/**/*.*')
        .pipe(gulp.dest(dest_path + '/fonts/')) //И бросим в public/css/fonts/
        .pipe(connect.reload());
});

// Такс запускает одной командой все предыдущие таски
gulp.task('build', [
    'jade',
    'sass',
    'js',
    'image',
    'fonts'
]);

// Если вы добавите какую-нибудь картинку, потом запустите задачу image и потом картинку удалите — она останется в папке public.
// Так что было бы удобно — периодически подчищать ее. Создадим для этого простой таск
gulp.task('clean', function (cb) {
    rimraf(dest_path, cb);
});


// Слежка

gulp.task('watch', function() {
    watch(['./app/images/**/*.*'], function(event, cb) {
        gulp.start('image');
    });
    watch(['./app/templates/**/*.jade'], function(event, cb) {
        gulp.start('jade');
    });
    watch(['./app/sass/**/*.scss'], function(event, cb) {
        gulp.start('sass');
    });
    watch(['./app/js/**/*.js'], function(event, cb) {
        gulp.start('js');
    });
    watch(['./app/sass/fonts/**/*.*'], function(event, cb) {
        gulp.start('fonts');
    });
    // gulp.watch(['], ['jade']);
    // gulp.watch(['./app/sass/**/*.scss'], ['sass']);
    // gulp.watch(['./app/js/**/*.js'], ['js']);
    // gulp.watch(['./app/images/**/*.*'], ['image']);
    // gulp.watch(['./app/sass/fonts/**/*.*'], ['fonts']);
});

// Запуск сервера c лайврелоадом
gulp.task('serv_livereload', function() {
    connect.server({
        root: dest_path,
        livereload: true,
        port: 8888
    });
    opn('http://localhost:8888');
});

// Запуск сервера без лайврелоада
gulp.task('serv_no_livereload', function() {
    connect.server({
        root: dest_path,
        port: 8888
    });
    opn('http://localhost:8888');
});


// Задача по-умолчанию 
gulp.task('default', ['serv_livereload', 'watch']);

// Для ie
gulp.task('serv', ['serv_no_livereload', 'watch']);

