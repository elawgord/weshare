const { src, dest, watch, series } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
const terser = require("gulp-terser");

// Sass Task
function scssTask() {
  return src("scss/style.scss", { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest("css", { sourcemaps: "." }));
}

// Watch Task
function watchTask() {
  watch("*.html");
  watch(["scss/**/*.scss", "js/**/*.js"], series(scssTask));
}

// Default Gulp task
exports.default = series(scssTask, watchTask);
