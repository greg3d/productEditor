(function () {
	'use strict';

	const {
		src,
		dest,
		parallel,
		series
	} = require('gulp');

	const concat = require('gulp-concat');
	const scss = require('gulp-sass');
	const uglify = require('gulp-uglify');
	const plumber = require('gulp-plumber');
	const ngAnnotate = require('gulp-ng-annotate');

	const gulpif = require('gulp-if');
	const minify = require('gulp-clean-css');
	const htmlmin = require('gulp-htmlmin');
	const templateCache = require('gulp-angular-templatecache');
	const sftp = require('gulp-sftp-up4');


	var prodMode = false;

	const min = ".min";
	var destt = '../assets/components/producteditor/';
	var destviews = destt + '/views/';
	var destcss = destt + '/css/';
	var destjs = destt + '/js/';
	var add = '';

	

	function libsjs() {

		return src([
				'node_modules/angular/angular' + add + '.js',
				'node_modules/@uirouter/angularjs/release/angular-ui-router' + add + '.js',
				'node_modules/angular-ui-grid/ui-grid.core.min.js',
				'node_modules/angular-ui-grid/ui-grid.edit.min.js'
			])
			.pipe(concat('libs.js'))
			.pipe(dest(destjs));
	}

	function libscss() {
		return src([
				'src/fonts/**/*.*'
			])
			.pipe(dest(destcss + 'fonts'));
	}

	function js() {
		return src([
				'src/app/**/*.js',
			])
			.pipe(ngAnnotate())
			.pipe(plumber())
			.pipe(gulpif(prodMode, uglify()))
			.pipe(concat('app.js'))
			.pipe(dest(destjs));
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
			.pipe(dest(destcss));
	}

	function html() {
		return src([
				'src/index.html',
			])
			.pipe(htmlmin({
				collapseWhitespace: true
			}))
			.pipe(dest(destviews));
	}

	function templates() {
		return src([
				'src/app/**/*.html'
			])
			.pipe(templateCache({
				standalone: true
			}))
			.pipe(dest(destjs));
	}

	function production(cb) {
		//destt = 'builds/prod';
		add = min;
		prodMode = true;
		cb();
	}

	function upload(cb) {
		src([
			'../assets/**/*.*'
		]).pipe(sftp({
			host: '178.79.159.181',
			port: 22,
			user: 'biogumus',
			pass: 'DzJSh0mcZMPe',
			remotePath: 'www/assets'
		}));

		cb();
	}

	//exports.upload = upload;
	//exports.libsjs = libsjs;
	//exports.libscss = libscss;
	//exports.js = js;
	//exports.css = css;
	//exports.html = html;

	var maintask = series(libsjs, js, css, libscss, templates, html);
	
	exports.default = maintask;
	exports.prod = series(production, libsjs, libscss, js, css, templates, html);
	exports.upload = series(maintask, upload);

})();