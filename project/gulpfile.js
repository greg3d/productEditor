'use strict';
const {
	src,
	dest,
	parallel,
	series,
	gulp
} = require('gulp');

const concat = require('gulp-concat');
const scss = require('gulp-sass');
const uglify = require('gulp-uglify');
const plumber = require('gulp-plumber');
const ngAnnotate = require('gulp-ng-annotate');

const gulpif = require('gulp-if');
const minify = require('gulp-clean-css');
const htmlmin = require('gulp-htmlmin');


var prodMode = false;

const min = ".min";
var destt = '../assets/components/producteditor/';
var destcss = destt + '/css/';
var destjs = destt + '/js/';
var add = '';

function libsjs() {

	return src([
			'node_modules/angular/angular.min.js',
			'node_modules/angular-ui-router/release/angular-ui-router.min.js',
		])
		.pipe(concat('libs.js'))
		.pipe(dest(destjs))
}

function libscss() {
	return src([

		])
		.pipe(concat('libs.css'))
		.pipe(dest(destcss))
}

function js() {
	return src([
			'src/app/**/*.js',
		])
		.pipe(ngAnnotate())
		.pipe(plumber())
		.pipe(gulpif(prodMode, uglify()))
		.pipe(concat('app.js'))
		.pipe(dest(destjs))
}

function css() {
	return src([
			'src/app/**/*.scss',
		])
		.pipe(plumber())
		.pipe(scss())
		//.pipe(autoprefixer())
		.pipe(gulpif(prodMode, minify()))
		.pipe(concat('app.css'))
		.pipe(dest(destcss))
}

function html() {
	return src([
			'src/*.html',
			'src/**/*.html'
		])
		.pipe(htmlmin({
			collapseWhitespace: true
		}))
		.pipe(dest(destt + '/views/'))
}

function production(cb) {
	destt = 'builds/prod';
	add = min;
	prodMode = true;
	cb();
}

exports.libsjs = libsjs;
exports.libscss = libscss;
exports.js = js;
exports.css = css;
exports.html = html;

function watchFiles() {
	watch("./src/app/**/*.scss", css);
	watch("./src/app/**/*.js", js);
	watch(["./src/app/**/*.html", "./src/app/index.html"], html);
}

function prod(cb) {
	series(production, libsjs, libscss, js, css, html);
	cb();
}

exports.default = series(libsjs, js, css, html);
exports.prod = series(production, libsjs, libscss, js, css, html);