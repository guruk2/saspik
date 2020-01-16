import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import sassbeautify from 'gulp-sassbeautify';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import iconfont  from 'gulp-iconfont';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';


const PRODUCTION = yargs.argv.prod;
const server = browserSync.create();

const paths = {
    styles: {
        src: ['src/sass/app.scss', 'src/sass/admin.scss'],
        dest: 'assets/css'
    },
    images: {
        src: 'assets/images/**/*.{jpg,jpeg,png,svg,gif}',
        // dest: 'assets/images'
    },
    scripts: {
        src: ['src/js/*.js'],
        dest: 'assets/js'
    },
    other: {
        src: ['assets/fonts/*'],
        dest: 'assets/fonts/'
    },
    package: {
        src: ['**/*', '!.vscode', '!node_modules{,/**}','!package{,/**}', '!src{,/**}', '!.babelrc', '!.gitignore', '!gulpfile.babel.js', '!package.json', '!package-lock.json'],
        dest: 'package'
    }
    
}

export const serve = (done) => {
    server.init({
        proxy: "pixsaaswp"
    });
    done();
}


export const reload = (done) => {
    server.reload();
    done();
}

export const clean =  () => del(['assets/csss']);

export const styles = () => {    
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))       
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe( sassbeautify())
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(server.stream());
}

// export const images = ()  => {
//     return gulp.src(paths.images.src)
//         .pipe(gulpif(PRODUCTION, imagemin()))
//         .pipe(gulp.dest(paths.images.dest));
// }



export const watch = () => {
    gulp.watch('src/sass/**/*.scss', styles);
    gulp.watch('src/js/**/*.js', gulp.series(scripts, reload));
    gulp.watch('**/*.php', reload);
    // gulp.watch(paths.images.src, gulp.series(images, reload));
    // gulp.watch(paths.other.src, gulp.series(copy, reload));
}

// export const copy = () => {
//     return gulp.src(paths.other.src)
//         .pipe(gulp.dest(paths.other.dest));
// }


export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(named())
        .pipe(webpack({
            mode: 'development',

            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env']
                            }
                        }
                    }
                ]
            },
            output: {
                filename: '[name].js'
            },
            externals: {
                jquery: 'jQuery'
            },
            devtool: !PRODUCTION ? 'inline-source-map' : false
        }))
        .pipe(gulpif(PRODUCTION, uglify()))
        .pipe(gulp.dest(paths.scripts.dest));
}

export const compress = () => {
    return gulp.src(paths.package.src)
    .pipe(replace('_themename', info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(gulp.dest(paths.package.dest));
}

export const dev = gulp.series(clean, gulp.parallel(styles,scripts), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles,scripts));
export const bundle = gulp.series(build, compress);


export default dev;