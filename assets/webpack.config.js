const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const OptimizeCssAssetsWebpackPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const UglyfyJsPlugin = require('uglifyjs-webpack-plugin');


// const JS_DIR = path.resolve(__dirname, 'src/js');
const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'dist');

const entry  = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js'
};

const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js'
};

const rules = [
    {
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: {
            loader: 'babel-loader'
        }
    },
    {
        test: /\.scss$/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
        ]
    },
    {
        test: /\.(png|jpg|gif|svg|ico|jpeg)$/,
        use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                    publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../',
                }
            }
        ]
    }

]

const  plugins = ()=> ([
    new CleanWebpackPlugin({
        CleanWebpackPlugin: ('production' === process.env.NODE_ENV) ? true : false,
        // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
    }),

    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    }),
])

const externals = {
    jquery: 'jQuery'
};

module.exports = (env, argv)=>({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules : rules
    },
    optimization:{
        minimizer: [
            new OptimizeCssAssetsWebpackPlugin({
                cssProcessor: cssnano,
            }),
            new UglyfyJsPlugin({
                cache: false,
                parallel: true,
                sourceMap: false
            })
        ]
    },
    plugins: plugins(argv),
    externals: externals
})