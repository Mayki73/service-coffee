const fs = require('fs');
const UglifyJS = require('uglify-js');

const inputFile = './assets/components/minifyx/cache/scripts_deb6ca97c8.min.js';
const outputFile = './app.min.js';

const inputCode = fs.readFileSync(inputFile, 'utf8');

const minifiedCode = UglifyJS.minify(inputCode).code;

fs.writeFileSync(outputFile, minifiedCode, 'utf8');