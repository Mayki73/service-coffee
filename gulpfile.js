const gulp = require('gulp');
const concat = require('gulp-concat');
const terser = require('gulp-terser');

// Define the JavaScript source files to concatenate and minify
const jsFiles = [
  'assets/components/minifyx/cache/scripts_deb6ca97c8.min.js',
];

// Define the destination directory for the minified and concatenated JavaScript file
const jsDest = 'dist/js';

// Task to concatenate and minify JavaScript files
function scripts() {
  return gulp
    .src(jsFiles)
    .pipe(concat('app.min.js'))
    .pipe(terser())
    .pipe(gulp.dest(jsDest));
}

// Export the 'scripts' task
exports.default = scripts;