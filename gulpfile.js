const gulp = require('gulp');
const sass = require('gulp-sass');

sass.compilator = require('node-sass');

gulp.task('sass', function()
{
    return gulp.src('assets/scss/*.scss')
                .pipe(sass().on('error', sass.logError))
                .pipe(gulp.dest('assets/css'));
});

gulp.task('watch', function()
{
    return gulp.watch('assets/scss/*.scss', gulp.series('sass'));
})