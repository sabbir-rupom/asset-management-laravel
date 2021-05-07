const mix = require('laravel-mix');
const lodash = require("lodash");

const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};

var third_party_assets = {
    css_js: [
        { "name": "jquery", "assets": ["./node_modules/jquery/dist/jquery.min.js"] },
        { "name": "bootstrap", "assets": ["./node_modules/bootstrap/dist/js/bootstrap.bundle.js"] },
        { "name": "select2", "assets": ["./node_modules/select2/dist/js/select2.min.js", "./node_modules/select2/dist/css/select2.min.css"] },
        { "name": "toastr", "assets": ["./node_modules/toastr/build/toastr.min.js", "./node_modules/toastr/build/toastr.min.css"] },
        { "name": "sweetalert2", "assets": ["./node_modules/sweetalert2/dist/sweetalert2.min.js", "./node_modules/sweetalert2/dist/sweetalert2.min.css"] }
    ]
};

//copying third party assets
lodash(third_party_assets).forEach(function (assets, type)
{
    if (type == "css_js") {
        lodash(assets).forEach(function (plugin)
        {
            var name = plugin['name'],
                assetlist = plugin['assets'],
                css = [],
                js = [];
            lodash(assetlist).forEach(function (asset)
            {
                var ass = asset.split(',');
                for (let i = 0; i < ass.length; ++i) {
                    if (ass[i].substr(ass[i].length - 3) == ".js") {
                        js.push(ass[i]);
                    } else {
                        css.push(ass[i]);
                    }
                };
            });
            if (js.length > 0) {
                mix.combine(js, folder.dist_assets + "/libs/" + name + "/" + name + ".min.js");
            }
            if (css.length > 0) {
                mix.combine(css, folder.dist_assets + "/libs/" + name + "/" + name + ".min.css");
            }
        });
    }
});

// copy all fonts
var out = folder.dist_assets + "fonts";
mix.copyDirectory(folder.src + "fonts", out);

// copy all images 
var out = folder.dist_assets + "images";
mix.copyDirectory(folder.src + "images", out);

//copying demo pages related assets
var app_pages_assets = {
    js: [
        folder.src + "js/pages/toastr.init.js",
        folder.src + "js/pages/sweet-alerts.init.js"
    ]
};

var out = folder.dist_assets + "js/";
lodash(app_pages_assets).forEach(function (assets, type)
{
    for (let i = 0; i < assets.length; ++i) {
        mix.js(assets[i], out + "pages");
    };
});

mix.copyDirectory("./node_modules/@fortawesome/fontawesome-free/webfonts", folder.dist_assets + "/webfonts");

mix
    .combine('resources/js/app.js', folder.dist_assets + "js/app.min.js")
    .sass('resources/scss/admin.scss', folder.dist_assets + "css").options({ processCssUrls: false }).minify(folder.dist_assets + "css/admin.css")
    .sass('resources/scss/main.scss', folder.dist_assets + "css").options({ processCssUrls: false }).minify(folder.dist_assets + "css/main.css")
    .js('resources/js/admin.js', folder.dist_assets + "js/admin.min.js")
    .js('resources/js/main.js', folder.dist_assets + "js/main.min.js")
    .js('resources/js/script.js', folder.dist_assets + "js/script.min.js");

mix.browserSync("localhost:8000");