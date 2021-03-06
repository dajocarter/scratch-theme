// Require our dependencies
const $ = require( 'gulp-load-plugins' )();
const autoprefixer = require( 'autoprefixer' );
const bourbon = require( 'bourbon' ).includePaths;
const browserSync = require( 'browser-sync' );
const del = require( 'del' );
const gulp = require( 'gulp' );
const merge = require( 'merge-stream' );
const mqpacker = require( 'css-mqpacker' );
const neat = require( 'bourbon-neat' ).includePaths;
const reload = browserSync.reload;

// Set assets paths.
const paths = {
  'css': [ 'assets/css/*.css', '!assets/css/*.min.css' ],
  'fonts': 'assets/fonts/*',
  'images': [ 'assets/img/*', '!assets/img/*.svg'],
  'php': [ './**/*.php', '!node_modules/**/*.php' ],
  'sass': 'assets/scss/**/*.scss',
  'scripts': 'assets/js/scripts/*.js',
  'js': [ 'assets/js/*.js', '!assets/js/*.min.js' ]
};

/**
 * Handle errors and alert the user.
 */
function handleErrors () {
  const args = Array.prototype.slice.call( arguments );

  $.notify.onError( {
    'title': 'Task Failed [<%= error.message %>',
    'message': 'See console.',
    'sound': 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
  } ).apply( this, args );

  $.util.beep(); // Beep 'sosumi' again.

  // Prevent the 'watch' task from stopping.
  this.emit( 'end' );
}

/**
 * Compile Sass and run stylesheet through PostCSS.
 *
 * https://www.npmjs.com/package/gulp-sass
 * https://www.npmjs.com/package/gulp-postcss
 * https://www.npmjs.com/package/gulp-autoprefixer
 * https://www.npmjs.com/package/css-mqpacker
 */
gulp.task( 'postcss', () =>
  gulp.src( paths.sass )

    // Deal with errors.
    .pipe( $.plumber( { 'errorHandler': handleErrors } ) )

    // Wrap tasks in a sourcemap.
    .pipe( $.sourcemaps.init() )

      // Compile Sass using LibSass.
      .pipe( $.sass( {
        'includePaths': [
          // Include paths for any npm package to use @import
          'node_modules/animate-sass/',
          'node_modules/include-media/dist/',
          'node_modules/magnific-popup/dist/',
          'node_modules/normalize.css/',
          'node_modules/family.scss/source/src/',
          'node_modules/font-awesome/scss/',
          'node_modules/slick-carousel/slick/'
        ].concat( bourbon, neat ),
        'errLogToConsole': true,
        'outputStyle': 'expanded' // Options: nested, expanded, compact, compressed
      } ) )

      // Parse with PostCSS plugins.
      .pipe( $.postcss( [
        autoprefixer( ),
        mqpacker( {
          'sort': true
        } )
      ] ) )

    // Create sourcemap.
    .pipe( $.sourcemaps.write() )

    // Create style.css.
    .pipe( gulp.dest( 'assets/css' ) )
    .pipe( browserSync.stream() )
);

/**
 * Minify and optimize style.css.
 *
 * https://www.npmjs.com/package/gulp-cssnano
 */
gulp.task( 'cssnano', [ 'postcss' ], () =>
  gulp.src( paths.css )
    .pipe( $.plumber( { 'errorHandler': handleErrors } ) )
    .pipe( $.cssnano( {
      'safe': true // Use safe optimizations.
    } ) )
    .pipe( $.rename( { 'suffix': '.min' } ) )
    .pipe( gulp.dest( 'assets/css' ) )
    .pipe( browserSync.stream() )
);

/**
 * Copy font assets.
 *
 * https://www.npmjs.com/package/merge-stream
 */
gulp.task('copy:fonts', function() {
  var toAssetsCss = gulp.src([
      'node_modules/slick-carousel/slick/ajax-loader.gif'
    ])
    .pipe(gulp.dest('assets/css'));

  var toAssetsFonts = gulp.src([
      'node_modules/font-awesome/fonts/*',
      'node_modules/slick-carousel/slick/fonts/*'
    ])
    .pipe(gulp.dest('assets/fonts'));

  return merge(toAssetsCss, toAssetsFonts);
});

/**
 * Optimize images.
 *
 * https://www.npmjs.com/package/gulp-imagemin
 */
gulp.task( 'imagemin', () =>
  gulp.src( paths.images )
    .pipe( $.plumber( { 'errorHandler': handleErrors } ) )
    .pipe( $.imagemin( {
      'optimizationLevel': 5,
      'progressive': true,
      'interlaced': true
    } ) )
    .pipe( gulp.dest( 'assets/img' ) )
);

/**
 * Concatenate and transform JavaScript.
 *
 * https://www.npmjs.com/package/gulp-concat
 * https://github.com/babel/gulp-babel
 * https://www.npmjs.com/package/gulp-sourcemaps
 */
gulp.task( 'concat', () =>
  gulp.src( [
      'node_modules/headroom.js/dist/headroom.js',
      'node_modules/headroom.js/dist/jQuery.headroom.js',
      'node_modules/magnific-popup/dist/jquery.magnific-popup.js',
      'node_modules/slick-carousel/slick/slick.js',
      'node_modules/velocity-animate/velocity.js',
      'node_modules/velocity-animate/velocity.ui.js',
      'node_modules/waypoints/lib/jquery.waypoints.js',
      paths.scripts
    ])

    // Deal with errors.
    .pipe( $.plumber( { 'errorHandler': handleErrors } ) )

    // Start a sourcemap.
    .pipe( $.sourcemaps.init() )

    // Convert ES6+ to ES2015.
    /*.pipe( $.babel( {
      presets: [ 'es2015' ]
    } ) )*/

    // Concatenate partials into a single script.
    .pipe( $.concat( 'project.js' ) )

    // Append the sourcemap to project.js.
    .pipe( $.sourcemaps.write() )

    // Save project.js
    .pipe( gulp.dest( 'assets/js' ) )
    .pipe( browserSync.stream() )
);

/**
  * Minify compiled JavaScript.
  *
  * https://www.npmjs.com/package/gulp-uglify
  */
gulp.task( 'uglify', [ 'concat' ], () =>
  gulp.src( paths.js )
    .pipe( $.rename( { 'suffix': '.min' } ) )
    .pipe( $.uglify( { 'mangle': false } ) )
    .pipe( gulp.dest( 'assets/js' ) )
);

/**
 * Sass linting.
 *
 * https://www.npmjs.com/package/sass-lint
 */
gulp.task( 'lint:sass', () =>
  gulp.src( [
    paths.sass,
    '!node_modules/**'
  ] )
    .pipe( $.sassLint() )
    .pipe( $.sassLint.format() )
    .pipe( $.sassLint.failOnError() )
);

/**
 * JavaScript linting.
 *
 * https://www.npmjs.com/package/gulp-eslint
 */
gulp.task( 'lint:js', () =>
  gulp.src( [
    paths.scripts,
    'assets/js/*.js',
    '!assets/js/*.min.js',
    '!assets/js/project.js',
    '!Gruntfile.js',
    '!Gulpfile.js',
    '!node_modules/**'
  ] )
    .pipe( $.eslint() )
    .pipe( $.eslint.format() )
    .pipe( $.eslint.failAfterError() )
);

/**
 * Process tasks and reload browsers on file changes.
 *
 * https://www.npmjs.com/package/browser-sync
 */
gulp.task( 'watch', function () {

  // Kick off BrowserSync.
  browserSync( {
    'injectChanges': true,     // Auto inject changes instead of full reload.
    'proxy': 'tweek.dev',    // Use http://localhost:3000 to use BrowserSync.
    'watchOptions': {
      'debounceDelay': 1000  // Wait 1 second before injecting.
    }
  } );

  // Run tasks when files change.
  gulp.watch( paths.fonts, [ 'copy:fonts' ] );
  gulp.watch( paths.sass, [ 'sass' ] );
  gulp.watch( paths.js, [ 'js' ] );
  gulp.watch( paths.scripts, [ 'js' ] );
  gulp.watch( paths.php, [ 'markup' ] );
} );

/**
 * Create individual tasks.
 */
gulp.task( 'markup', browserSync.reload );
gulp.task( 'copy', [ 'copy:fonts' ] );
gulp.task( 'js', [ 'uglify' ] );
gulp.task( 'sass', [ 'cssnano' ] );
gulp.task( 'lint', [ 'lint:sass', 'lint:js' ] );
gulp.task( 'build', [ 'copy', 'sass', 'js', 'imagemin' ] );
gulp.task( 'default', [ 'build', 'watch' ] );
