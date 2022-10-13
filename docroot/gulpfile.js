const { src, dest, watch, series } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
const terser = require("gulp-terser");

// Sass Task
function scssTask() {
  return src("app/scss/style.scss", { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest("dist", { sourcemaps: "." }));
}

// Watch Task
function watchTask() {
  watch("*.html");
  watch(["app/scss/**/*.scss", "app/js/**/*.js"], series(scssTask));
}

// Default Gulp task
exports.default = series(scssTask, watchTask);
