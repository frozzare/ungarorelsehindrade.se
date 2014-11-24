/**
 * Gulpfile
 * Copyright (c) 2014 Johnie Hjelm
 * Using Browser Sync http://www.browsersync.io/, Autoprefixer, Sass, Uglify etc
 */

/*-------------------------------------------------------------------

    Required plugins

-------------------------------------------------------------------*/
 
var
  gulp        = require('gulp'),
  package     = require('./package.json'),
  clean       = require('gulp-clean'),
  concat      = require('gulp-concat'),
  cssmin      = require('gulp-cssmin'),
  filter      = require('gulp-filter'),
  gulpif      = require('gulp-if'),
  imagemin    = require('gulp-imagemin'),
  header      = require('gulp-header'),
  rename      = require('gulp-rename'),
  sass        = require('gulp-ruby-sass'),
  uglify      = require('gulp-uglify'),
  browserSync = require('browser-sync'),
  prefix      = require('gulp-autoprefixer'),
  pngcrush    = require('imagemin-pngcrush'),
  reload      = browserSync.reload;
 
/*-------------------------------------------------------------------
 
  1. Configuration
  Base paths
 
-------------------------------------------------------------------*/
 
var basePaths = {
  assets: {
    dist: 'assets/dist/'
  },
  scripts: {
    base: 'assets/js/views/',
    dist: 'assets/dist/'
  },
  bowerjs: {
    base: 'bower_components/',
  },
  scss: {
    base: 'assets/style/',
    dist: 'assets/dist/'
  },
  php: {
    base: './',
    dist: './'
  },
  twig: {
    base: './',
    dist: './'
  },
  html: {
    base: './',
    dist: './'
  },
  images: {
    base: 'assets/images/',
    dist: 'assets/images/'
  },
};
 
/*-------------------------------------------------------------------
 
  2. Application paths
 
-------------------------------------------------------------------*/
 
var appFiles = {
  versioning: [
    './package.json',
    './bower.json'
  ],
 
  scripts: basePaths.scripts.base + '*.js',
  scss: basePaths.scss.base + '**/*.scss',
  html: basePaths.php.base + '**/*.php',
  html: basePaths.twig.base + 'views/**/*.twig',
  html: basePaths.html.base + '**/*.html',
  images: basePaths.images.base + '**/*'
};
 
/*-------------------------------------------------------------------
 
  Banner using meta data from package.json
 
-------------------------------------------------------------------*/
 
var banner = [
  '/*!\n' +
  ' * <%= package.name %>\n' +
  ' * <%= package.description %>\n' +
  ' * <%= package.homepage %>\n' +
  ' * @author <%= package.author %>\n' +
  ' * @version <%= package.version %>\n' +
  ' * Copyright ' + new Date().getFullYear() + '. <%= package.license %> licensed.\n' +
  ' */',
  '\n'
].join('');
 
/*-------------------------------------------------------------------
 
    Tasks
 
-------------------------------------------------------------------*/
 
// Clean /dist folder
gulp.task('clean:before', function() {
  return gulp.src(
      basePaths.assets.dist
    )
    .pipe(clean({
      force: true
    }))
});
 
// Compile, concat and Uglify Javascript
gulp.task('scripts', function() {
  return gulp.src([
      basePaths.bowerjs.base + 'jquery/dist/jquery.js',
      basePaths.bowerjs.base + 'fastclick/lib/fastclick.js',
      basePaths.bowerjs.base + 'svgeezy/svgeezy.js',
      basePaths.bowerjs.base + 'slick.js/slick/slick.js',
      basePaths.scripts.base + '*.js'
    ])
    .pipe(concat(
      'main.js'
    ))
    .pipe(reload({
      stream: true
    }))
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(header(banner, {
      package: package
    }))
    .pipe(gulp.dest(
      basePaths.scripts.dist
    ))
});
 
// Handle images with imagemin and pngcrush
gulp.task('images', function() {
  return gulp.src(appFiles.images)
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{
        removeViewBox: false
      }],
      use: [pngcrush()]
    }))
    .pipe(gulp.dest(
      basePaths.images.dist
    ))
  browserSync.reload();
});
 
// Compile Sass with Ruby-Sass, compressed format without line numbers. Console log errors.
gulp.task('sass', function() {
  return gulp.src(appFiles.scss)
    .pipe(sass({
      style: 'expanded',
      lineNumbers: true
    }))
    .on('error', function(err) {
      // console.log(err.message);
    })
    // .pipe(cssmin())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(prefix('>1%', 'last 4 versions',  'android', 'ios'))
    .pipe(header(banner, {
      package: package
    }))
    .pipe(gulp.dest(
      basePaths.scss.dist
    ))
    .pipe(reload({
      stream: true
    }));
});
 
// Browser sync using proxy vhost, open in Google Chrome. Use port 5000. Don't output default Browser Sync notify alerts
gulp.task('browser-sync', function() {
  browserSync({
    proxy: 'ungarh.dev',
    browser: "google chrome",
    port: 5000,
    notify: false,
    files: ['./vendor/**', './views/**', './controllers/**', './lib/**', './assets/**'],
    exclude: ['./wp/*']
  });
});
 
// Browser sync reload
gulp.task('bs-reload', function() {
  browserSync.reload();
});
 
// Task: Watch files
gulp.task('watch', function() {
 
  // Watch scripts
  gulp.watch(appFiles.scripts, ['scripts', browserSync.reload]);
 
  // Watch Sass
  gulp.watch(appFiles.scss, ['sass']);
 
  // Watch PHP, and reload browser
  gulp.watch(appFiles.php, ['bs-reload']);

  // Watch Twig, and reload browser
  gulp.watch(appFiles.twig, ['bs-reload']);
 
  // Watch HTML, and reload browser
  gulp.watch(appFiles.html, ['bs-reload']);
 
});
 
/*-------------------------------------------------------------------
 
    Main tasks
 
-------------------------------------------------------------------*/
 
// Default. Just runs once.
// Type 'gulp' in the terminal
gulp.task('default', ['clean:before'], function() {
  gulp.start(
    'sass',
    'images',
    'scripts'
  );
});
 
 
// Production process. Watch, inject, and reload.
// Type 'gulp serve' in the terminal
gulp.task('serve', ['clean:before'], function() {
  gulp.start(
    'browser-sync',
    'sass',
    'scripts',
    'watch'
  );
});
