let gulp = require('gulp')
let watch = require('gulp-watch');
let minify = require('gulp-minify');
let rename = require('gulp-rename');
let uglify = require('gulp-uglify');
let cleanCSS = require('gulp-clean-css');
let concat = require('gulp-concat');


const {series, parallel, stream} = require('gulp');

function defaultTask(cb){
	cb();
}

function minifyScripts(cb){
	gulp.src('assets/js/global/dist/app.js')
	.pipe(concat('scripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('assets/js/global/dist'));
	
	cb();
}

function minifyStyles(cb){
	gulp.src('assets/styles/css/dist/app.css')
	.pipe(concat('styles.min.css'))
	.pipe(cleanCSS({compatibility: 'ie8'}))
	.pipe(gulp.dest('assets/styles/css/dist'));
	
	cb();
}

function watchFiles(cb){
	
	minifyStyles(cb);
	minifyScripts(cb);
	
	cb();
}

exports.watch_files = watchFiles;

exports.default = defaultTask;
exports.minify = parallel(minifyScripts, minifyStyles);