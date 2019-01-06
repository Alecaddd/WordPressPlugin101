// // Load Gulp...of course
const { src, dest, task, series, watch, parallel } = require('gulp');

// // CSS related plugins
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );

// // JS related plugins
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );

// // Utility plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );

// // Browers related plugins
var browserSync  = require( 'browser-sync' ).create();

// // Project related variables
var projectURL   = 'https://wp.dev';

var styleSRC     = 'src/scss/mystyle.scss';
var styleForm    = 'src/scss/form.scss';
var styleSlider  = 'src/scss/slider.scss';
var styleAuth    = 'src/scss/auth.scss';
var styleURL     = './assets/';
var mapURL       = './';

var jsSRC        = 'src/js/';
var jsAdmin      = 'myscript.js';
var jsForm       = 'form.js';
var jsSlider     = 'slider.js';
var jsAuth       = 'auth.js';
var jsFiles      = [jsAdmin, jsForm, jsSlider, jsAuth];
var jsURL        = './assets/';

var styleWatch   = 'src/scss/**/*.scss';
var jsWatch      = 'src/js/**/*.js';
var phpWatch     = './**/*.php';

function css(done) {
	src([styleSRC, styleForm, styleSlider, styleAuth])
		.pipe( sourcemaps.init() )
		.pipe( sass({
			errLogToConsole: true,
			outputStyle: 'compressed'
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( dest( styleURL ) )
		.pipe( browserSync.stream() );
	done();
}

function js(done) {
	jsFiles.map(function (entry) {
		return browserify({
			entries: [jsSRC + entry]
		})
		.transform( babelify, { presets: [ '@babel/preset-env' ] } )
		.bundle()
		.pipe( source( entry ) )
		.pipe( buffer() )
		.pipe( gulpif( options.has( 'production' ), stripDebug() ) )
		.pipe( sourcemaps.init({ loadMaps: true }) )
		.pipe( uglify() )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( dest( jsURL ) )
		.pipe( browserSync.stream() );
	});
	done();
}

function reload(done) {
	browserSync.reload();
	done();
}

function browser_sync() {
	browserSync.init({
		proxy: projectURL,
		https: {
			key: '/home/alecaddd/.valet/Certificates/wp.dev.key',
			cert: '/home/alecaddd/.valet/Certificates/wp.dev.crt'
		},
		injectChanges: true,
		open: false
	});
}

function watch_files() {
	watch( phpWatch, reload );
	watch( styleWatch, css );
	watch( jsWatch, series( js, reload ) );
	src( jsURL + 'myscript.js' )
		.pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
};

task("css", css);
task("js", js);
task("default", series(css, js));
task("watch", parallel(browser_sync, watch_files));