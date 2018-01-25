'use strict';

//VARS

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var merge = require('merge-stream');

//SCSS

//look for every scss file in whatever directory we tell the function to look
gulp.task('sass', function () {
    var sassStream,
        cssStream;

    sassStream = gulp.src('./../sass/**/*.scss')
      .pipe(sass({errLogToConsole: true}))
      .pipe(autoprefixer());

    cssStream = gulp.src('./../sass/font-awesome.css');

    return merge(sassStream, cssStream)
      .pipe(concat('style.css'))
      .pipe(gulp.dest('./../'));
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

// watch scss and js
gulp.task('default', function(){
  gulp.watch('./../sass/**/*.scss', ['sass']);
  gulp.watch('./../javascripts/src/*.js', ['scripts'])
});
