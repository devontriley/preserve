'use strict';

//VARS

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

//SCSS

//look for every scss file in whatever directory we tell the function to look
gulp.task('sass', function () {
  return gulp.src('./../sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./../'));
});

//watch for the changes, tells us where to watch
gulp.task('default', function () {
  gulp.watch('./../sass/**/*.scss', ['sass']);
});


// JS

gulp.task('scripts', function() {
  return gulp.src([
    './bower_components/jquery/dist/jquery.min.js',
    './../javascripts/src/**/*.js'
    ])
    .pipe(concat('all.js'))
    .pipe(gulp.dest('./../javascripts/dist/'));
});

//auto watch
gulp.task('watchScripts', function() {
  gulp.watch('./../javascripts/src/*.js', ['scripts'])
});
