'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('js', function() {
    return gulp.src([
        './bower_components/underscore/underscore.js',
        './bower_components/angular/angular.js',
        './bower_components/angular-animate/angular-animate.js',
        './bower_components/angular-cookies/angular-cookies.js',
        './bower_components/angular-resource/angular-resource.js',
        './bower_components/angular-messages/angular-messages.js',
        './bower_components/angular-ui-router/release/angular-ui-router.js',
        './bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
        './src/AppBundle/Resources/public/js/app.js',
        './src/AppBundle/Resources/public/js/directive/*.js',
        './src/AppBundle/Resources/public/js/filter/*.js',
        './src/AppBundle/Resources/public/js/factory/*.js',
        './src/AppBundle/Resources/public/js/controller/*.js'])
        .pipe(sourcemaps.init({largeFile: true}))
        .pipe(concat('app.js'))
        .pipe(sourcemaps.write('./', {
            sourceMappingURL: function(file) {
                return file.relative + '.map';
            }
        }))
        .pipe(gulp.dest('./web/assets/js'));
});

gulp.task('css', function() {
    return gulp.src([
        './src/AppBundle/Resources/public/sass/app.scss'])
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('app.css'))
        .pipe(gulp.dest('./web/assets/css'));
});

gulp.task('fonts', function() {
    return gulp
        .src(['./bower_components/bootstrap-sass/assets/fonts/bootstrap/*'])
        .pipe(gulp.dest('./web/assets/fonts/bootstrap'));
});

gulp.task('default', ['js', 'css', 'fonts']);

gulp.task('watch', function() {
    gulp.watch('src/*/Resources/public/*/**', ['default']);
});
