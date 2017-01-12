// htdocs内のプロジェクトフォルダ指定
var dir = 'taxi';
var path = '../../htdocs/' + dir + '/wp-content/themes/sakura/';
/*-------------------------------------------------*/

var gulp = require('gulp');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var autoPrefixer = require('gulp-autoprefixer');
var cssComb = require('gulp-csscomb');
var cmq = require('gulp-merge-media-queries');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var imageMin = require('gulp-imagemin');
var cache = require('gulp-cache');
var sass = require('gulp-sass')
var connect = require('gulp-connect-php');

gulp.task('browser-sync', function() {
  connect.server({
    port:80,
    base:dir + '/',
  }, function (){
    browserSync({
      proxy: 'localhost:80/' + dir + '/'
    });
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('css',function(){
  gulp.src([path + 'src/css/**/*.scss'])
  .pipe(plumber({
    handleError: function (err) {
      console.log(err);
      this.emit('end');
    }
  }))
  .pipe(sass())
  .pipe(autoPrefixer())
  .pipe(cssComb())
//  .pipe(cmq({log:true}))
  .pipe(concat('style.css'))
  .pipe(gulp.dest('dist/css'))
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(cleanCss())
  .pipe(gulp.dest(path + 'dist/css/'),reload())
});

gulp.task('js',function(){
  gulp.src([path + 'src/js/**/*.js'])
  .pipe(plumber({
    handleError: function (err) {
      console.log(err);
      this.emit('end');
    }
  }))
  .pipe(concat('script.js'))
  .pipe(gulp.dest('dist/js'))
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(uglify())
  .pipe(gulp.dest(path + 'dist/js'),reload())
});

gulp.task('img',function(){
  gulp.src([path + 'src/img/**/*'])
  .pipe(plumber({
    handleError: function (err) {
      console.log(err);
      this.emit('end');
    }
  }))
  .pipe(cache(imageMin()))
  .pipe(gulp.dest(path + 'dist/img'),reload())
});

gulp.task('default', ['browser-sync'], function(){
  gulp.watch(path + "src/css/**/*.scss", ['css']);
  gulp.watch(path + "src/js/**/*.js", ['js']);
  gulp.watch(path + "src/img/**/*", ['img']);
  gulp.watch(path + "*.php", ['bs-reload']);
});
