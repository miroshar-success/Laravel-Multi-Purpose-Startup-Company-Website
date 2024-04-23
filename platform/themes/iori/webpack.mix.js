const mix = require('laravel-mix')
const path = require('path')

const directory = path.basename(path.resolve(__dirname))
const source = `platform/themes/${directory}`
const dist = `public/themes/${directory}`

mix
    .sass(`${source}/assets/sass/style.scss`, `${dist}/css`)
    .sass(`${source}/assets/sass/custom-rtl.scss`, `${dist}/css`)
    .js(`${source}/assets/js/custom.js`, `${dist}/js`)
    .js(`${source}/assets/js/main.js`, `${dist}/js`)
    .js(`${source}/assets/js/featured-post.js`, `${dist}/js`)
    .js(`${source}/assets/js/ecommerce.js`, `${dist}/js`)

if (mix.inProduction()) {
    mix
        .copy(`${dist}/css/style.css`, `${source}/public/css`)
        .copy(`${dist}/css/custom-rtl.css`, `${source}/public/css`)
        .copy(`${dist}/js/custom.js`, `${source}/public/js`)
        .copy(`${dist}/js/main.js`, `${source}/public/js`)
        .copy(`${dist}/js/ecommerce.js`, `${source}/public/js`)
        .copy(`${dist}/js/featured-post.js`, `${source}/public/js`)
}
