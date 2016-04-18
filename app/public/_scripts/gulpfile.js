var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');

var eslint = require('gulp-eslint');
var uglify = require('gulp-uglify');

var browserSync = require('browser-sync');
var browserify = require('browserify');
var stringify = require('stringify');
var babelify = require('babelify');
var riotify = require('riotify');

var source = require('vinyl-source-stream');
var streamify = require('gulp-streamify');

var presetEs2015 = require('babel-preset-es2015');

var appDirectory = '../app/';

gulp.task('browser-sync', ['build'], function ()
{
});

// Eslint
gulp.task('lint', function ()
{
    return gulp.src(appDirectory + 'core/**/*.js')
        .pipe(eslint({
            parserOptions: {
                sourceType: 'module'
            }
        }))
        .on('error', errorHandler)
        .pipe(eslint.format());
});

// Html
gulp.task('html', function ()
{
    return gulp.src('../index.html')
        .on('error', errorHandler)
        .pipe(gulp.dest('dist'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('build', ['browserify', 'html']);

gulp.task('browserify', ['lint'], function ()
{
    var b = browserify({
        paths: ['./node_modules', appDirectory + 'core'],
        debug: true,
        entries: [appDirectory + 'app.js']
    });

    b.on('error', errorHandler);

    return b
        .transform(stringify, {
            appliesTo: { includeExtensions: ['.html'] },
            minify: true
        })
        .transform(babelify, {presets: [presetEs2015]})
        .transform(riotify)
        .bundle()
        .on('error', errorHandler)
        .pipe(source('app.js'))
        .pipe(plumber({
            errorHandler: function (error)
            {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .on('error', errorHandler)
        .pipe(gulp.dest(appDirectory + 'build/'))
        .pipe(rename({suffix: '.min'}))
        // .pipe(streamify(uglify({ mangle: true })))
        .pipe(gulp.dest(appDirectory + 'build/'))
        .pipe(browserSync.reload({stream: true}))
});

gulp.task('default', ['browser-sync'], function ()
{
    gulp.watch(appDirectory + 'core/**/*.js', ['browserify']);
    gulp.watch(appDirectory + 'core/**/*.html', ['browserify']);
    gulp.watch(appDirectory + 'app.js', ['browserify']);
    gulp.watch(appDirectory + 'init.js', ['browserify']);
    gulp.watch('*.html', ['html']);
});

// Handle the error
function errorHandler (error) {
    console.log(error.toString());
    this.emit('end');
}
