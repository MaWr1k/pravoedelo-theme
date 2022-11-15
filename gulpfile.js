'use strict';

const
    gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create();

gulp.task('styles', function () {
    return gulp.src("app/styles/style.scss")
        // .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}))
        // .pipe(sass())
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest('assets/css/'));
});


gulp.task('watch', function () {
    gulp.watch(['app/styles/*.scss','app/styles/**/*.scss'], gulp.parallel('styles'));

});

gulp.task('serve-proxy', function () {
    browserSync.init({
        proxy: "http://pug.loc/"
    });
    gulp.watch(["*.php", "*.html", 'assets/css/*.*', 'assets/js/*.*']).on('change', browserSync.reload);
});

gulp.task('serve-loc', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
    gulp.watch(["*.php", "*.html", 'assets/css/*.*', 'assets/js/*.*']).on('change', browserSync.reload);
});

gulp.task('default', gulp.series('styles', gulp.parallel('watch', 'serve-loc')));